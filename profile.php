<?php
session_start(); // Start or resume the session

$server = "localhost";
$user = "root";
$pass = "";
$port = "3307";
$db_name = "foodapi";
$conn = "";

// Function to establish database connection
function connectToDatabase() {
    global $server, $user, $pass, $db_name, $port;
    $conn = new mysqli($server, $user, $pass, $db_name, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Attempt to connect to the database
$conn = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $_SESSION["restaurantName"] = $_POST["restaurantName"];
    $location = $_POST["location"];
    $cuisineType = $_POST["cuisineType"];
    $openingHours = $_POST["openingHours"];
    $contactNumber = $_POST["contactNumber"];
    $email=$_POST["email"];
    $password=$_POST["password"];

    if (empty($_SESSION["restaurantName"]) || empty($location) || empty($cuisineType) || empty($openingHours) || empty($contactNumber)|| empty($email) || empty($password)) {
        echo "Please fill all required fields.";
    } else {
        // Handle file upload for multiple photos
        $uploadDir = 'uploads/';
        $uploadedFiles = [];

        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $fileName = basename($_FILES['photos']['name'][$key]);
            $targetFilePath = $uploadDir . $fileName;

            // Check if file is an image
            $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            if ($imageFileType !== "jpg" && $imageFileType !== "jpeg" && $imageFileType !== "png" && $imageFileType !== "gif") {
              echo ' <script>
              window.alert("Error: Only JPG, JPEG, PNG & GIF files are allowed.");
              </script>';
               
            } elseif (move_uploaded_file($tmp_name, $targetFilePath)) {
                $imgContent = base64_encode(file_get_contents($targetFilePath));
                $uploadedFiles[] = $targetFilePath; // Store the file path instead of the file name
            } else {
                // Handle file upload error
                echo '<script>
                window.alert("Error uploading file ' . $fileName . '");
                </script>';
                
            }
        }

        // Attempt to reconnect to the database if the connection is lost
        $retry = 3; // Number of retries
        while ($retry > 0) {
            if ($conn->ping() === false) {
                $conn = connectToDatabase();
                $retry--;
            } else {
                break;
            }
        }

        if ($retry == 0) {
          echo ' <script> die("Failed to reconnect to the database after multiple attempts.");</script>';
        }

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO restaurant (restaurantName, location, cuisineType, openingHours, contactNumber, images, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssssss", $_SESSION["restaurantName"], $location, $cuisineType, $openingHours, $contactNumber, $imgContent, $email, $password);
            if ($stmt->execute()) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <style>
        img{
            width:250px;
            height:250px;
        }
       video{
        width:100%;
        height:75%;
       }
        *{
            margin:0px;
            box-sizing:border-box;

        }
        .card{
            position:relative;
            top: 25px;
    left: 550px;
            width:400px;
            height:80vh;
            background-color:#C7CCCB;
        }
        .card .card-body button a{
            color:white;
            text-decoration:none;
        }
        .card .card-body button{
            position: relative;
            top: 126px;
    left: 90px;
        }
        @media screen and (max-width:700px){
            *{
            margin:0px;
            box-sizing:border-box;

        }
            .card{
            position:relative;
            top: 25px;
            left: 43px;
    width: 376px;
            height:80vh;
            background-color:#C7CCCB;
        }
        .card .card-body button {
    position: relative;
    top: 56px;
    left: 90px;
}
        }
        @media screen and (max-width:600px){
            *{
            margin:0px;
            box-sizing:border-box;

        }
            .card{
            position:relative;
            top: 25px;
            left: 43px;
    width: 376px;
            height:80vh;
            background-color:#C7CCCB;
        }
        .card .card-body button {
    position: relative;
    top: 56px;
    left: 91px;
}
        }
        @media screen and (max-width:400px){
            .card{
                position: relative;
    top: 25px;
    left: -4px;
    width: 282px;
    height: 83vh;
            background-color:#C7CCCB;
        }
        .card .card-body button {
    position: relative;
    top: 56px;
    left: 46px;
}
        }
        @media screen and (max-width:300px)
{
    .card{
        position: relative;
    top: 25px;
    left: -2px;
    width: 243px;
    height: 83vh;
    background-color:#C7CCCB;
    }
  img  {
        width: 200px;
    height: 200px;  
    }
    .card .card-body button {
    position: relative;
    top: 65px;
    left: 24px;
}
}      
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <video src="./Food mania + Co. (1).mp4" autoplay muted loop></video>
        </div>
    </div>
    <div class="container-fluid con">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if (!empty($_SESSION["restaurantName"])) {
                $sql = "SELECT * FROM restaurant where restaurantName='" . $_SESSION["restaurantName"] . "'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["restaurantName"]; ?></h5>
                                <p class="card-text">Location: <?php echo $row["location"]; ?></p>
                                <p class="card-text">Cuisine Type: <?php echo $row["cuisineType"]; ?></p>
                                <p class="card-text">Opening Hours: <?php echo $row["openingHours"]; ?></p>
                                <p class="card-text">Contact Number: <?php echo $row["contactNumber"]; ?></p>
                                <p class="card-text">Image:</p>
                                <?php
                                    $base = base64_encode($row["images"]);
                                ?>
                                <img src="data:image;base64,<?php echo base64_decode($base); ?>" class="card-img-top" alt="Restaurant Image" >
                                <button class="btn btn-danger"><a href="hotel.php">Back</a></button>
                                <button class="btn btn-primary"><a class="btn-link" href="menuList.php?restaurantName=<?php echo $row['restaurantName']; ?>">Add Menu</a></button>
                            
                            </div>
                        </div>
                    </div>
            <?php
                    }
                } else {
                   
                }
            }
            ?>
        </div>
    </div>
    <script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>
</html>

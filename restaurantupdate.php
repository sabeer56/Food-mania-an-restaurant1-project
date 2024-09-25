<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <style>
        .col {
            margin-bottom: 20px;
        }
        .card {
            width: 300px;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
        .underline {
            text-decoration: underline  1.5px;
            width: 50%;
        }
   
        .navbar {
            background: linear-gradient(to right,#feda75,#d24dff, #d24dff,#feda75);
            width:100%;
            height: 12vh;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }
    </style>
</head>
 
<body>
<div class="container">
    <div class="row">
        <form action="restaurantupdate.php" method="POST">
            <div class="form-group">
                <label for="restaurantName">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurantName" name="restaurantName" value="<?php echo $row["restaurantName"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $row["location"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="cuisineType">Cuisine Type</label>
                <input type="text" class="form-control" id="cuisineType" name="cuisineType" value="<?php echo $row["cuisineType"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="openingHours">Opening Hours</label>
                <input type="text" class="form-control" id="openingHours" name="openingHours" value="<?php echo $row["openingHours"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo $row["contactNumber"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control" id="images" name="images" value="<?php echo $row["images"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
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

if (!empty($_POST["restaurantName"])) {
    $restaurantName = $_POST["restaurantName"];
    $location = $_POST["location"];
    $cuisineType = $_POST["cuisineType"];
    $openingHours = $_POST["openingHours"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $images = $_POST["images"]; // Consider using $_FILES instead

    // Check if the connection is still open before running the query
    if (!$conn->ping()) {
        // Attempt to reconnect to the database
        $conn = connectToDatabase();
    }

    // Update data in the database
    $stmt = $conn->prepare("UPDATE restaurant SET location=?, cuisineType=?, openingHours=?, contactNumber=?, images=?, email=?, password=? WHERE restaurantName=?");
    if ($stmt) {
        $stmt->bind_param("ssssssss", $location, $cuisineType, $openingHours, $contactNumber, $images, $email, $password, $restaurantName);
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement";
    }

    // Close the connection after use
    $conn->close();
}
?>

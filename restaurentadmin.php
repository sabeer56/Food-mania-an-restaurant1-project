<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $sql = "SELECT * FROM restaurant where restaurantName='" . $_POST["restaurantName"] . "' AND password='".$_POST["password"]."' ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["restaurantName"]; ?></h5>
                        <?php
                        $base = base64_encode($row["images"]);
                        ?>
                        <img src="data:image;base64,<?php echo base64_decode($base); ?>" class="card-img-top" alt="Restaurant Image" >
                        <p class="card-text">Location: <?php echo $row["location"]; ?></p>
                        <p class="card-text">Cuisine Type: <?php echo $row["cuisineType"]; ?></p>
                        <p class="card-text">Opening Hours: <?php echo $row["openingHours"]; ?></p>
                        <p class="card-text">Contact Number: <?php echo $row["contactNumber"]; ?></p>

                    </div>
                </div>
            </div>
            <?php
        }

        $sqlMenu = "SELECT * FROM menu WHERE restaurantName1 = '" . $_POST["restaurantName"] . "'";
        $resultMenu = $conn->query($sqlMenu);
        echo '<h1  style="text-align:center;  color:#FF3E5D;">Menu Items</h1>';
        // Check if menu items are found
        if ($resultMenu && $resultMenu->num_rows > 0) {
            while ($rowMenu = $resultMenu->fetch_assoc()) {
                $base64MenuItemImage = base64_encode($rowMenu["images"]);

                // Display each menu item
                echo  '<br> <br>';

                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $rowMenu["menuName"] . '</h5>';
                echo '<p class="card-text">' . $rowMenu["description"] . '</p>';
                echo '<p class="card-text">' . $rowMenu["price"] . '</p>';
                echo '<p class="card-text">Image:</p>';

                echo '<img src="data:image/jpeg;base64,' . base64_decode($base64MenuItemImage) . '" />';
                echo '</div>';
                echo '</div>';

            }
        } else {
            echo "<p>No menu items found for this restaurant.</p>";
        }
    } else {
        echo "<p>Restaurant not found.</p>";
    }
}
?>
    </div>
</div>
</body>
</html>
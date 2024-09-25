<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="btn btn-primary"  href="navBar.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-danger" href="user.php">Sign In</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
    <?php
// Start or resume the session
session_start();

// Database configuration
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_port = "3307";
$db_database = "foodapi";

// Establish a database connection
$conn = new mysqli($db_server, $db_user, $db_pass, $db_database, $db_port);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and display restaurant details along with menu items
function displayRestaurantAndMenu($conn, $restaurantName)
{
    // Retrieve restaurant details including the image
    $sqlRestaurant = "SELECT * FROM restaurant WHERE restaurantName = ?";
    $stmtRestaurant = $conn->prepare($sqlRestaurant);
    $stmtRestaurant->bind_param("s", $restaurantName);
    $stmtRestaurant->execute();
    $resultRestaurant = $stmtRestaurant->get_result();

    // Check if restaurant details are found
    if ($resultRestaurant && $resultRestaurant->num_rows > 0) {
        $rowRestaurant = $resultRestaurant->fetch_assoc();
        $base64RestaurantImage = base64_encode($rowRestaurant["images"]);

        // Display the restaurant image
        echo '<div class="row">';
        echo '<br><br>';
        echo ' <br><h1 style="text-align:center; " class="card-title underline">' . $rowRestaurant["restaurantName"] . '</h1>';
        echo '<img src="data:image/jpeg;base64,' . base64_decode($base64RestaurantImage) . '" style="width=100%; height:75vh;" />';
        echo '</div>';

        // Retrieve menu items for the restaurant
        $sqlMenu = "SELECT * FROM menu WHERE restaurantName1 = ?";
        $stmtMenu = $conn->prepare($sqlMenu);
        $stmtMenu->bind_param("s", $restaurantName);
        $stmtMenu->execute();
        $resultMenu = $stmtMenu->get_result();
        echo  '<br/> <br/>';
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


        <div class="row">
            <?php
            // Check if restaurant name is set in the session
            if (!empty($_POST["menuitems"])) {
                $restaurantName = $_POST["menuitems"];
                displayRestaurantAndMenu($conn, $restaurantName);
            } else {
                echo "<p>Restaurant name not provided.</p>";
            }
            ?>
        </div>
        <br><br>
        <div class="row">
            <img src="./ezgif.com-effects (3).gif" alt="">
        </div>
    </div>
</body>
</html>

<?php
// Start or resume the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$port = "3307";
$dbname = "foodapi";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Menu</title>
            <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
            <style>
                .card {
                    width: 300px;
                    margin-bottom: 20px;
                }
                .card img {
                    max-width: 100%;
                    height: auto;
                }
                .btn-exit {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                }
                .btn-menu {
                    position: absolute;
                    top: 10px;
                    right: 80px;
                }
     .con1>h1{
        display:inline;
        position: absolute;
                    top: 5px;
                    font-weight:800;       
     }
                .con1{
                    width:100%;
                    height:8vh;
                    background-color:lightblue;
                    border-radius:10px;
                }
                @media screen and (max-width:350px){
                    .con1>h1{
        display: inline;
    position: absolute;
    top: 16px;
    font-size: 16px;
                    } 
                    .con1 a{
                        font-size: 11px;
                    }
                    
                }
                @media screen and (max-width:300px){
                    .con1>h1{
        display: inline;
    position: absolute;
    top: 16px;
    font-size: 16px;
                    } 
                    .con1 a{
                        font-size: 11px;
                    }
                    
                }
            </style>
        </head>
        <body>
          <div class="container-fluid con1">
            <h1>Food Mania</h1>
          <button class="btn btn-primary btn-exit"><a href="navBar.php" style="color: white; text-decoration: none;">Exit</a></button>
            <button class="btn btn-danger btn-menu"><a href="menuList.php" style="color: white; text-decoration: none;">Add Menu</a></button>
          </div>
             <div class="container mt-5">
                <h2 class="text-center">Menu</h2>
                <hr>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM menu WHERE restaurantName1=?";
                    $stmt = $conn->prepare($sql);
                    
                    if ($stmt) {
                        $stmt->bind_param("s", $_SESSION["restaurantName"]);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    // Iterate over each menu item and display it
                    if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["menuName"]; ?></h5>
                                    <p class="card-text"><?php echo $row["description"]; ?></p>
                                    <p class="card-text"><?php echo $row["price"]; ?></p>
                                    <p class="card-text">Image:</p>
                                    <?php
                                    $base = base64_encode($row["images"]);
                                    ?>
                                    <img src="data:image;base64,<?php echo base64_decode($base); ?>" class="card-img-top" alt="Restaurant Image" style="width:300px; height:300px;"> 
                                </div>
                            </div>
                        </div>
                        <?php
                    }}}
                    ?>
                </div>
            </div>
            <div class="container-fluid" style="width:100%;">
                <img src="./Food mania (6).gif" style="width:100%;" alt="">
            </div>
        </body>
        </html>
       

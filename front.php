<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_port = "3307";
$db_database = "foodapi";
$conn = null;

try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_database, $db_port);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($conn) {
    
        $sql = "SELECT * FROM restaurant ";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
              
                <div class="col-md-3">
                <div style="border:solid 04px; border-radius:10px; ">
                            <h5 class="card-title"  style=" position:relative; top:0px; left:50px;"><?php echo $row["restaurantName"]; ?></h5>
                           
                            <?php
                            $base = base64_encode($row["images"]);
                            ?>
                            <img src="data:image;base64,<?php echo base64_decode($base); ?>" class="card-img-top" alt="Restaurant Image" style=" position:relative; top:0px; left:20px; width:250px; height:250px;">
                    <form action="frontmenu.php" method="post">
                    <button class="btn btn-primary" name="menuitems" style=" position:relative; top:0px; left:75px;"  type="submit" value="<?php echo $row["restaurantName"]; ?>">View Menu Items</button>
              
                    </form>
                    
                </div></div>
            
                <?php
            }
        
    }
}
?>
</body>
</html>

<?php
session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_port = "3307";
$db_name = "foodapi";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION["restaurantName"] = $_POST["restaurantName"];
$menuName = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];


$uploadDir = 'uploads/';
$uploadedFiles = [];

foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
    $fileName = basename($_FILES['photos']['name'][$key]);
    $targetFilePath = $uploadDir . $fileName;

    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if ($imageFileType !== "jpg" && $imageFileType !== "jpeg" && $imageFileType !== "png" && $imageFileType !== "gif") {
        echo "Error: Only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    } elseif (move_uploaded_file($tmp_name, $targetFilePath)) {
        $imgContent = base64_encode(file_get_contents($targetFilePath));
        $uploadedFiles[] = $targetFilePath;
    } else {
  
        echo "Error uploading file " . $fileName;
        exit;
    }
}

$stmt = $conn->prepare("INSERT INTO menu (restaurantName1, menuName, description, price, images) VALUES (?, ?, ?, ?, ?)");
if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error;
    exit;
}

$stmt->bind_param("sssss", $_SESSION["restaurantName"], $menuName, $description, $price, $imgContent);
if ($stmt->execute()) {
    header("Location: menuvisual.php"); 
    exit;
} else {
    echo "Error executing statement: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

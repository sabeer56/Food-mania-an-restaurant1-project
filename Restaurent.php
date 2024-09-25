<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="rest.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fc7f03; border-radius:10px;">
    <div class="container-fluid">
        <h1 style="text-align:center;"><a class="navbar-brand" href="#">Food Mania</a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="navbar.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hotel.php">Advertise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="advertise.php" class="btn btn-primary" style="text-decoration: none; color: white;">Ready To Start</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid img1">
    <div class="row">
        <video src="Food mania + Co..mp4" muted autoplay loop></video>
    </div>
</div>
</div>
<br><br>
<div class="container part2">
    <div
        class="row row3">
        <h1>Why advertise on Food Mania?</h1>
        <div class="col-md-6 fonts"> <img src="./search.avif" alt="" class="img-fluid">
            <h3>Guaranteed Customer Growth</h3>
            <p>Increase visits to your page which will drive more footfall and revenue for your restaurant.</p>
            <img src="./target.webp" class="img-fluid" alt="">
            <h3>Target the right Audience</h3>
            <p>Get showcased to customers searching for what you have to offer, at the most relevant time and location.</p>
            <img src="tracking-icon-png-12.jpg" class="img-fluid" alt="">
            <h3>Track Performance</h3>
            <p>Get access to state-of-the-art analytics and follow your campaign performance.</p>
            <img src="./992885.png" class="img-fluid" alt="">
            <h3>Pay for Results</h3>
            <p>Take the guessing out of advertising and only pay for the customers brought to your page.</p>
        </div>
        <div class="col-md-6 img1"><img src="./9d0d2eaf6c1b0652ad8e1550ed990533.jpg" alt=""></div>

    </div>

</div>
<br> <br>
<div class="container-fluid part3">
    <div class="row justify-content-center" style="background: url('Food mania + Co123..gif'); background-repeat:no-repeat; background-size:cover; width:100%; height:inherit; ">

        <div class="col-md-6 contact-form">
            <h2 class="text-center mb-4">Want to know more?</h2>
            <form action="Restaurent.php" method="post">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city">
                </div>
                <div class="form-group">
                    <label for="restaurantName">Restaurant Name</label>
                    <input type="text" class="form-control" name="restaurantName" id="restaurantName" placeholder="Enter your restaurant name">
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email Id</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter your phone number">
                </div>
                <button type="submit" style="margin-left:40%;" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
<br><br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php


// Database connection parameters
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_port = "3307";
$db_name = "foodapi";

// Establish database connection
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name, $db_port);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $city = isset($_POST["city"]) ? trim($_POST["city"]) : "";
    $restaurantName = isset($_POST["restaurantName"]) ? trim($_POST["restaurantName"]) : "";
    $fullName = isset($_POST["fullName"]) ? trim($_POST["fullName"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $phone = isset($_POST["phoneNumber"]) ? trim($_POST["phoneNumber"]) : "";

    // Prepare SQL statement
    $sql = "INSERT INTO restaurentrequest (city, restaurantname, fullname, email, phonenumber) VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssss", $city, $restaurantName, $fullName, $email, $phone);

        if ($stmt->execute()) {
            echo "<script> window.alert('The form was submitted');</script>";
        } else {
            echo "<script> window.alert('Error executing SQL query: ' . '{$stmt->error}');</script>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<script> window.alert('Error preparing SQL statement: ' . '{$conn->error}');</script>";
    }
}

// Close database connection
$conn->close();
?>


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
    <title>Zomato Feedback</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <style>
    

.feedback-form {
    background-image:url('./Food mania + Co..gif');
    padding: 20px;
    color:#FFFFFF;
    border-radius: 10px;
    margin-top: 50px;
}

.part1 .con{
    display: flex;
    justify-content: space-evenly;
}
.part1 .con a{
    font-family: Georgia, 'Times New Roman', Times, serif;
    margin-right: -40px;
    position: relative;
    top: -180px;
    left: 540px;
    text-decoration: none;
    transition:2s;
    transition-timing-function: ease-in-out;
}
.part1 .con a:hover{
    transition-timing-function: ease-in;
    background-color:green !important;
}
.part1 .con a h2{
    font-weight: 500;
    color:#FFFFFF;
}
@media screen and (max-width:700px){
    .part1 .con a {
        font-family: Georgia, 'Times New Roman', Times, serif;
        margin-right: -40px;
        position: relative;
        top: -72px;
        left: 186px;
        text-decoration: none;
        transition: 2s;
        transition-timing-function: ease-in-out;
    }
    .part1 .con a:hover{
        transition-timing-function: ease-in;
        background-color:green !important;
    }
    .part1 .con a h2{
        font-weight: 500;
        color:#FFFFFF;
    }
}
@media screen and (max-width:500px){
    .part1 .con a {
        font-family: Georgia, 'Times New Roman', Times, serif;
        margin-right: -40px;
        position: relative;
        top: -56px;
    left: 145px;
        text-decoration: none;
        transition: 2s;
        transition-timing-function: ease-in-out;
    }
    .part1 .con a:hover{
        transition-timing-function: ease-in;
        background-color:green !important;
    }
    .part1 .con a h2{
        font-size: 15px;
        color:#FFFFFF;
    }
}
@media screen and (max-width:400px){
    .part1 .con a {
        font-family: Georgia, 'Times New Roman', Times, serif;
        margin-right: -40px;
        position: relative;
        top: -48px;
    left: 125px;
        text-decoration: none;
        transition: 2s;
        transition-timing-function: ease-in-out;
    }
    .part1 .con a:hover{
        transition-timing-function: ease-in;
        background-color:green !important;
    }
    .part1 .con a h2{
        font-size: 10px;
        color:#FFFFFF;
    }
}
@media screen and (max-width:300px){
    .part1 .con a {
        font-family: Georgia, 'Times New Roman', Times, serif;
        margin-right: -40px;
        position: relative;
        top: -39px;
    left: 69px;
        text-decoration: none;
        transition: 2s;
        transition-timing-function: ease-in-out;
    }
    .part1 .con a:hover{
        transition-timing-function: ease-in;
        background-color:green !important;
    }
    .part1 .con a h2{
        font-size: 5px;
        color:#FFFFFF;
    }
}

</style>
</head>
<body>
<div class="container-fluid part4">
        <div class="row">
            <video src="Food mania + Co.1.mp4" muted autoplay loop></video>
        </div>
    </div>
     <div class="container-fluid part1">
     <div class="col-md-12 con">
     <a class="btn btn-success" href="navbar.php"><h2>Home</h2></a>
     </div>
     </div>
<div class="container part2" >
    <div class="row justify-content-center">
        <div class="col-md-6 feedback-form">
            <h2 class="text-center mb-4">Food Mania - We would love to hear from you!</h2>
            <form action="contact.php" method="post" >
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" name="fullName" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="mobileNumber">Mobile Number(optional)</label>
                    <input type="text" class="form-control" name="mobileNumber" placeholder="Enter your mobile number">
                </div>
                <div class="form-group">
                    <label for="feedbackText">Type text</label>
                    <textarea class="form-control" name="feedbackText" rows="3" placeholder="Enter your feedback"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit Feedback</button>
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


$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_port = "3307";
$db_name = "foodapi";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = isset($_POST["fullName"]) ? $_POST["fullName"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mobileNumber = isset($_POST["mobileNumber"]) ? $_POST["mobileNumber"] : "";
$feedback = isset($_POST["feedbackText"]) ? $_POST["feedbackText"] : "";

$sql = "INSERT INTO contact (fullname, email, mobileNumber, feedback) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $fullname, $email, $mobileNumber, $feedback);
    
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


$conn->close();
exit;
?>

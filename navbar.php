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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/css/bootstrap.min.css">
    <style>
      video{
            width:100%;
            height:100%;
            z-index: -2;
            border-radius:1rem;
        }
     
.bg-navbar {
    background:linear-gradient(to right,#CE8CA2, #CE8CA2,#B9A6A8,#CE8CA2,#B9A6A8,#CE8CA2,#CE8CA2, #CE8CA2)!important;
}

.part2 {
    padding: 20px;
    text-align: center;
}
h1 {
    display: inline;
        font-size: 2.4rem;
    }
.nav-link img {
        width: 55%;
        height: 55%;
    }
    @media screen and (max-width: 700px) {
    *{
        margin: 1px;
        box-sizing: border-box;
        position: relative;
    }
    
  .nav-link img {
        top: -51px;
        left: 327px;
    width:6%;
    }
    
    .navbar-nav {
        width: 100%;
        height: 0vh;
    }
    
    .part2 .row h1 {
        top: -2px;
        left: -5px;
    }
    
    .rdx > h1 {
        top: 4px;
        left: 1px;
        display: inline;
        height: 35%;
        font-size: 1.2rem;
    }
    
    .nav-item > h1 {
        top: -126px;
        left: 385px;
        display: inline;
        height: 35%;
        font-size: 1.0rem;
    }
    
    .part3 {
        position: relative;
        top: 0px;
        right: 10px;
        width: 49%;
    }
}
@media screen and (max-width: 500px) {
    *,
   {
        margin: 1px;
        box-sizing: border-box;
        position: relative;
    }
    
    .nav-link img {
        top: -43px;
        left: 183px;
    }
    
    .navbar-nav {
        width: 100%;
        height: 0vh;
    }
    
    .part2 .row h1 {
        top: 4px;
        left: -10px;
    }
    
    .rdx > h1 {
        top: 5px;
    left: -4px;
        display: inline;
        height: 35%;
        font-size: 1.5rem;
    }
    
    .nav-item > h1 {
        top: -109px;
    left: 212px;
    display: inline;
    height: 21%;
    font-size: 0.8rem;
    }
    
    .part3 {
        width: 84%;
        height: 20vh;
    }
}

@media screen and (max-width: 300px) {
    * {
        margin: 1px;
        box-sizing: border-box;
        position: relative;
    }
    
    .nav-link img {
        top: -43px;
    left: 100px;
    }
    
    .navbar-nav {
        width: 100%;
        height: 0vh;
    }
    
    .part2 .row h1 {
        top: -5px;
        left: -3px;
    }
    
    .rdx > h1 {
        top: 7px;
    left: -8px;
        display: inline;
        height: 35%;
        font-size: 1rem;
    }
    
    .nav-item > h1 {
        top: -104px;
    left: 133px;
        display: inline;
        height: 35%;
        font-size: 0.7rem;
    }
    
    .part3 {
        position: relative;
        top: 0px;
        right: 10px;
        width: 114%;
        height: 20vh;
    }
}

    </style>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-navbar part">
        <div class="container-fluid rdx">
           
            <h1>FOOD MANIA</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user.php"><img src="./icons8-user-100.png" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <h1><a class="nav-link" href="./Restaurent.php">Add Restaurant</a></h1>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid part1">
        <div class="row sab">
        <video src="./Food mania (3).mp4" muted autoplay loop></video>
        </div>
    </div>
    <br><br>
    <div class="container-lg part2">
        <div class="row">
            <h1>Popular locations in <img src="./in.webp" alt=""> India</h1>
            <h6>From swanky upscale restaurants to the cosiest hidden gems serving the most incredible food, Food Mania covers it all. Explore menus, and millions of restaurant photos and reviews from users just like you, to find your next great meal.</h6>
        </div>
    </div>
    
    <div class="container part3">
        <br><br>
        <div class="row">
            <?php include("front.php");  ?>
            <br><br>
        </div>
    </div>
    <br><br><br>
   
   
    <script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
 
</body>
</html>

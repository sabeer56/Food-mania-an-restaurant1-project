<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">

    <style>
           body {
            background-color: #f8f9fa;
            width: 100%;
            height: 60vh;
            margin: 0;
        }

        .con {
            background: linear-gradient(to bottom, rgba(12, 10, 10, 0), rgba(13, 14, 13, 0.74)), url('./ezgif.com-video-to-gif-converter (1).gif');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white; /* Add text color for better visibility */
            text-align: center; /* Center text */
        }

        .con h1 {
            margin-bottom: 20px;
        }

        
        .form-container {
            margin: 50px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease-in-out;
            transform: translateY(-170vh);
        }

        .fall-in {
            transform: translateY(0);
        }
        @media screen and (max-width: 767px) {
    .con {
        height: 50vh;
    }

    .form-container {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease-in-out;
        margin: 0px; 
        transform: translateY(-150vh); 
    }

    .fall-in {
        transform: translateY(0);
    }
}

@media screen and (max-width: 500px) {
    .con {
        height: 40vh; 
    }

    .form-container {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease-in-out;
        margin: 0px; 
        transform: translateY(-200vh); 
    }
    .fall-in {
        transform: translateY(0);
    }
}

/* Add more media queries for other screen sizes as needed */

        
    </style>
</head>
<body>

<div class="container-fluid con">
  
    <div class="row first">
        <div class="col-md-6 right">
            <h1>FOOD MANIA FOR BUSINESS</h1>
        </div>
        <div class="col-md-6 left">
            <a href="Restaurent.php" class="text-decoration-none text-danger"><h2>Advertise</h2></a>
            <button class="btn btn-primary btn2" onclick="showForm()" >Create Account</button>
            <a href="restaurentvalidation.php" class="btn btn-success">Already Exists</a>
        </div>
    </div>
</div>
<br> <br>
<div class="container form-container" id="formContainer"  style="background-image: url('./Untitled design (2).jpg');" >
    <h2 class="text-center mb-4">Restaurant Details</h2>
    <form action="profile.php" enctype="multipart/form-data" method="post" >
        <div class="mb-3 row">
            <label for="restaurantName" class="col-sm-4 col-form-label">Restaurant Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="restaurantName" placeholder="Enter restaurant name" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-4 col-form-label">Email </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="email" placeholder="Enter your email id" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="location" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="location" placeholder="Enter restaurant location" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="cuisineType" class="col-sm-4 col-form-label">Cuisine Type</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="cuisineType" placeholder="Enter cuisine type" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="openingHours" class="col-sm-4 col-form-label">Opening Hours</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="openingHours" placeholder="Enter opening hours" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="contactNumber" class="col-sm-4 col-form-label">Contact Number</label>
            <div class="col-sm-8">
                <input type="tel" class="form-control" name="contactNumber" placeholder="Enter contact number" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="password" placeholder="set password" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="photos"  class="col-sm-4 col-form-label">Upload Photos</label>
            <div class="col-sm-8">
            <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple>
    </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<br> <br>
<div class="container-fluid vid">
        <div class="row">
        <video src="./Food mania + Co31..mp4" style="border-radius:15px" autoplay muted loop></video>
        </div>
    </div>

<script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
<script>

    function showForm() {
        var formContainer = document.getElementById("formContainer");
        formContainer.classList.add("fall-in");

        var loginBox = document.getElementById("loginBox");
        loginBox.classList.remove("fall-in");
    }
</script>
</body>
</html>



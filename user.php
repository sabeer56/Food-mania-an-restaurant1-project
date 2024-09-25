<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Mania</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
  
</head>

<body>

<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <img src="./ezgif.com-effects.gif" style="width:100%;" alt="World Food Day" class="img-fluid mb-4">
            <div class="card p-4 shadow">
                <h1 class="mb-4">Food Mania</h1>
                <p class="lead">We believe in transforming ordinary moments into extraordinary memories. Join us for a gastronomic journey that transcends the ordinary.</p>
                <div class="mt-4">
                    <form action="user.php" method="post" class="d-inline">
                        <button type="submit" name="signin" class="btn btn-primary me-2">Sign In</button>
                    </form>
                    <form action="user.php" method="post" class="d-inline">
                        <button type="submit" name="signup" class="btn btn-secondary">Sign Up</button>
                    </form>
                    <?php 
                  
                    if (isset($_POST["signin"])) {
                        try {
                            include("signin.php");
                        } catch (\Throwable $th) {
                           
                        }
                    }

                    if (isset($_POST["signup"])) {
                        try {
                            include("signup.php");
                        } catch (\Throwable $th) {
                           
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
     
<div class="container-fluid imgs">
        <br><br>
   <div class="row">
   <img src="Food mania (2).gif" alt="">
   </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

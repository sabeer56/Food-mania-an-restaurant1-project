<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <style>
       .con {
    text-align: center;
    color: blue; /* Change the color to blue */
    margin-top: 5vh;
    padding: 10px;
    width: 80%;
    font-weight: 600;
    font-style: italic;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
        .inp {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div style="background: url('Food mania (4).gif'); width:100%; background-repeat:no-repeat; background-size:cover; border-radius:15px;" class="container con">
        <div class="row justify-content-center align-items-center g-2">
            <form id="form" class="col-md-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-danger" id="submit" name="submit" value="Sign In">
            </form>
        </div>
    </div>
    <script src="./signin.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    
</body>
</html>

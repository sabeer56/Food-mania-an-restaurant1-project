<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/css/bootstrap.min.css">
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
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required name="email">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-success" id="submit" name="submit" value="Sign Up">
            </form>
        </div>
    </div>
    <script src="./signup.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

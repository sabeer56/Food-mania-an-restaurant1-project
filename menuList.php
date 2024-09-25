<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu Item</title>
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .mt-5{
        background-color:lightgreen;
    }
    img{
        width:100%;
    }
  </style>
</head>
<body>
<div class="container">
<img src="./Food mania (3).gif" alt="">
</div>
<div class="container mt-5">
        <h2 class="text-center">Add New Menu Item</h2>
       
        <form action="menudata.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="restaurantName" class="form-label">Restaurant Name:</label>
                <input type="text" class="form-control" id="restaurantName" name="restaurantName" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple>
                
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Menu Item</button>
            </div>
        </form>
    </div>

    <script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>
</html>

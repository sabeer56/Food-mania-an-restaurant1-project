<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <title>Restaurant Menu</title>
    <style>
        .menu-card {
            margin-bottom: 20px;
        }

        .menu-img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Restaurant Menu</h2>

    <div class="row">
        <!-- Menu Item 1 -->
        <div class="col-md-12">
            <form action="menuList.php" method="post" enctype="multipart/form-data">
                <div class="card menu-card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name of the food</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="foodname" name="foodname" placeholder="Enter the food name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photos" class="col-sm-4 col-form-label">Upload Photos</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="./bootstrap-5.2.3-dist/js/bootstrap.min.js" ></script>
</body>
</html>

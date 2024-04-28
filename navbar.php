<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
        <title>C_Priscy</title>
    </head>
    <body>
        <div class="d-flex justify-content-center my-5 bg-dark p-3">

           <?php
           if ($_SESSION['id'] == null) {
            ?>

            <a href = "index.php"class = "btn btn-light me-2">Register</a>
            <a href = "login.php" class = "btn btn-light me-2">Login</a>

            <?php
           } else {
            ?> 
        
            <a href = "dashboard.php"class = "btn btn-light me-2">Dashboard</a>
            <?php
           }
            ?>
        </div>
    </body>
</html> 
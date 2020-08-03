<?php session_start();
$var_user = $_POST["your_email"];
if (!isset($_SESSION['current_user_id'])) {
    echo '<script>window.location = "index.php" </script>';
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
 <!-- Font Icon -->
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    

<div class="main">

<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Acciones</h2>
                <div class="form-group form-button">
                <a href="categories.php" class="form-submit" id="signup" role="button">Categorías</a>
                </div>

                <div class="form-group form-button">
                <a href="units.php" class="form-submit" id="signup" role="button">Unidades</a>
                </div>

                <div class="form-group form-button">
                <a href="products.php" class="form-submit" id="signup" role="button">Productos</a>
                </div>
            </div>
        </div>
    </div>
</section>


</div>

<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Categoría</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/sign-in image.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Crear Categoría</h2>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" href="categories.php" type="button" class="btn btn-secondary">Volver a Categorías</a>
                        </div>
                        <br><br>
                        <form method="POST" class="register-form" id="login-form" action="consultas/insert_category.php">
                            <div class="form-group">
                                <label for="categoria"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="categoria" id="categoria" placeholder="Nombre"/>
                            </div>
                
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Crear"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
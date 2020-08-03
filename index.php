<?php 
session_start(); 

if (isset($_SESSION['current_user_id'])) {
    echo '<script>window.location = "home.php" </script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Regístrate</h2>
                        <form method="POST" class="register-form" id="register-form" action="consultas/consulta_register.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="new_name" id="name" placeholder="Nombre"/>
                            </div>
                            <div class="form-group">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-face"></i></label>
                                <input type="text" name="new_last_name" id="last_name" placeholder="Apellido"/>
                            </div>
                            <div class="form-group">
                                <label for="new_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="new_email" id="email" placeholder="Tu correo"/>
                            </div>
                            <div class="form-group">
                                <label for="new_phone"><i class="zmdi zmdi-account fa-phone"></i></label>
                                <input type="text" name="new_phone" id="new_phone" placeholder="Tu Celular"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="new_pass" id="new_pass" placeholder="Contraseña"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repite tu contraseña"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account fa-home"></i></label>
                                <input type="text" name="new_address" id="new_address" placeholder="Dirección"/>
                            </div>
                            <div class="form-group">
                                <label for="new_comuna"><i class="zmdi zmdi-account fa-home"></i></label>
                                <input type="text" name="new_comuna" id="new_comuna" placeholder="Comuna/Sector"/>
                            </div>
                            <div class="form-group">
                                <label for="new_condominio"><i class="zmdi zmdi-account fa-home"></i></label>
                                <input type="text" name="new_condomino" id="new_condominio" placeholder="Condominio"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Registrarse"/>
                            </div>
                        </form>
                    </div>


                    <div class="signup-image">
                        <figure><img src="img/sign-in image.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Ya tengo cuenta</a>
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

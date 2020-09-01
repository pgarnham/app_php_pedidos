<?php 
session_start();
?>

<?php

require("connection.php");


  $id_unit = $_POST["unit_id"];

  $query_3 = "SELECT * FROM unidades WHERE unidades.unit_id = $id_unit";
  $result_3 = $my_db -> prepare($query_3);
  $result_3 -> execute();
  $unidad = $result_3 -> fetchAll();
  $unidad = $unidad[0];


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Unidad</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <?php
                            echo "<h2 class='form-title'>Editar $unidad[1]</h2>";
                        ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" href="units.php" type="button" class="btn btn-secondary">Volver a Unidades</a>
                        </div>
                        <br><br>
                        <form method="POST" class="register-form" id="login-form" action="consultas/edit_unit_consulta.php">
                            <div class="form-group">
                                <label for="nombre"><i class="zmdi zmdi-cake material-icons-name"></i></label>
                                <?php
                                echo "<input type='text' value='$unidad[1]' name='nombre' id='nombre'/>";
                                ?>
                            </div>
                            
                            <input type="hidden" name="unit_id" value="<?php echo $unidad[0]; ?>">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Editar"/>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
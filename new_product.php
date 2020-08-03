<?php 
session_start();
?>

<?php

require("connection.php");

  $query = "SELECT nombre, cat_id FROM categorias";
  $result = $my_db -> prepare($query);
  $result -> execute();
  $categorias = $result -> fetchAll();

  $query_2 = "SELECT nombre, unit_id FROM unidades";
  $result_2 = $my_db -> prepare($query_2);
  $result_2 -> execute();
  $unidades = $result_2 -> fetchAll();

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Producto</title>

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
                        <h2 class="form-title">Agregar Producto</h2>
                        <form method="POST" class="register-form" id="login-form" action="consultas/insert_product.php">
                            <div class="form-group">
                                <label for="nombre"><i class="zmdi zmdi-cake material-icons-carrot"></i></label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre"/>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="precio"><i class="zmdi zmdi-money-box material-icons-name"></i></label>
                                <input type="text" name="precio" id="precio" placeholder="Precio"/>
                            </div>

                            <div class="form-group">
                            <label for="sel1"><i class="zmdi zmdi-collection-item-1 material-icons-name"></i> Categoría</label>
                            <br><br><br>
                            <select class="form-control" id="sel1" name="categoria">
                                <?php
                                foreach($categorias as $cat){
                                    echo "<option value='$cat[1]'>$cat[0]</option>";
                                };
                                ?>
                            </select>
                            </div>

                            <div class="form-group">
                            <label for="sel1"><i class="zmdi zmdi-shopping-basket material-icons-name"></i> Unidad</label>
                            <br><br><br>
                            <select class="form-control" id="sel1" name="unidad">
                                <?php
                                foreach($unidades as $unit){
                                    echo "<option value='$unit[1]'>$unit[0]</option>";
                                };
                                ?>
                            </select>
                            </div>
                
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Agregar"/>
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
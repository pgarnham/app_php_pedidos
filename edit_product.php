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

  $query_4 = "SELECT descripcion, esc_id FROM escalas";
  $result_4 = $my_db -> prepare($query_4);
  $result_4 -> execute();
  $escalas = $result_4 -> fetchAll();

  $id_producto = $_POST["product_id"];

  $query_3 = "SELECT * FROM productos WHERE productos.pid = $id_producto";
  $result_3 = $my_db -> prepare($query_3);
  $result_3 -> execute();
  $producto = $result_3 -> fetchAll();
  $producto = $producto[0];


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Producto</title>

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
                        <?php echo "<figure><img src='$producto[5]' alt='sign up image'></figure>"; ?>
                    </div>

                    <div class="signin-form">
                        <?php
                            echo "<h2 class='form-title'>Editar $producto[1]</h2>";
                        ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" href="products.php" type="button" class="btn btn-secondary">Volver a Productos</a>
                        </div>
                        <br><br>
                        <form method="POST" class="register-form" id="login-form" action="consultas/edit_product_consulta.php">
                            <div class="form-group">
                                <label for="nombre"><i class="zmdi zmdi-cake material-icons-name"></i></label>
                                <?php
                                echo "<input type='text' value='$producto[1]' name='nombre' id='nombre'/>";
                                ?>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="sel1"><i class="zmdi zmdi-collection-item-1 material-icons-name"></i> Categoría</label>
                            <br><br><br>
                            <select class="form-control" id="sel1" name="categoria">
                                <?php
                                foreach($categorias as $cat){
                                    if ($producto[2] == $cat[1]){
                                        echo "<option selected='selected' value='$cat[1]'>$cat[0]</option>";
                                    } else{
                                        echo "<option value='$cat[1]'>$cat[0]</option>";
                                    }
                                    
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
                                    if ($producto[3] == $unit[1]){
                                        echo "<option selected='selected' value='$unit[1]'>$unit[0]</option>";
                                    }
                                    else {
                                        echo "<option value='$unit[1]'>$unit[0]</option>";
                                    }
                                    
                                };
                                ?>
                            </select>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="sel1"><i class="zmdi zmdi-arrow-forward material-icons-name"></i> Escala</label>
                            <br><br><br>
                            <select class="form-control" id="sel1" name="escala">
                                <?php
                                foreach($escalas as $scale){
                                    if ($producto[4] == $scale[1]){
                                        echo "<option selected='selected' value='$scale[1]'>$scale[0]</option>";
                                    }
                                    else {
                                        echo "<option value='$scale[1]'>$scale[0]</option>";
                                    }
                                    
                                };
                                ?>
                            </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="foto"><i class="zmdi zmdi-image material-icons-name"></i></label>
                                <?php
                                echo "<input type='text' value='$producto[5]' name='foto' id='foto'/>";
                                ?>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $producto[0]; ?>">
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
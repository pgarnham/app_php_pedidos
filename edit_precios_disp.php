<?php
session_start();?>
<?php
if (!isset($_SESSION['current_user_id'])) {
    echo '<script>window.location = "home.php" </script>';
    exit;
}
?>

<?php
    require("connection.php");
    require("consultas/consulta_semana.php");
    $consulta = "SELECT productos.nombre, productos_semanas.precio, categorias.nombre, unidades.nombre, productos_semanas.disp, productos.pid, productos.imagen
                         FROM productos INNER JOIN categorias ON productos.cat_id = categorias.cat_id
                                        INNER JOIN unidades ON productos.unit_id = unidades.unit_id
                                        INNER JOIN productos_semanas ON productos.pid = productos_semanas.pid AND productos_semanas.sem_id = '$semana'";
    $result = $my_db -> prepare($consulta);
    $result -> execute();
    $productos = $result -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Precios y Disponibilidad</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="">
                        <h2 class="form-title">Precios y Disponibilidad</h2>
                        <!-- <div class="form-group form-button">
                            <a href="new_product.php" class="form-submit" id="signup" role="button">Agregar Producto</a>
                        </div>
                        <div class="form-group form-button">
                            <a href="precio_disponibilidad.php" class="form-submit" id="signup" role="button">Modificar Precios o Disponibilidad</a>
                        </div> -->
                        <form action='consultas/edit_precio_disp_consulta.php' method='post'>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio Actual</th>
                                <th scope="col">Disp. Actual</th>
                                <th scope="col">Nuevo Precio</th>
                                <th scope="col">Nueva Disp.</th>
                                <th scope="col">Guardar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                 foreach($productos as $prod){
                                     $disp = "No";
                                     $check = "";
                                     
                                     if ($prod[4] == 1){
                                        $disp = "Si";
                                        $check = "checked='checked'";
                                        
                                     };
                                     $name_ob = "disp" . $prod[5];
                                    echo "
                                    <tr class='thumbnail-item'>
                                    <th scope='row'>$contador</th>
                                    <td>$prod[0]</td>
                                    <td>$prod[1]</td>
                                    <td>$disp</td>
                                    <td>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='basic-addon1'>\$ </span>
                                            <input name='precio' id='precio' type='text' class='form-control' placeholder='nuevo precio' aria-describedby='basic-addon1'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='custom-control custom-checkbox'>
                                            <input name='$name_ob' type='checkbox' class='custom-control-input' id='$prod[5]' value='si' $check>
                                            <label class='custom-control-label' for='$prod[5]'>Disp.</label>
                                        </div>
                                    </td>
                                    <td align='center'>
                                        
                                            <button name='product_id' type='submit' value='$prod[5]' class='btn btn-success btn-sm'><i class='zmdi zmdi-save material-icons-name'></i></button>
                                        
                                    </td>
                                    </tr>";
                                    $contador += 1;
                                };
                                ?>
                            </tbody>
                        </table>
                        </form>
                    </div>


                    
                </div>
            </div>
        </section>
       

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>$(document).ready(function () {

$('.thumbnail-item').mouseenter(function(e) {

 x = e.pageX;
 y = e.pageY;

 $(this).css('z-index','0')
 $(this).css('background', '#758B8F')
 $(this).css('color', '#ffffff')
 $(this).css('cursor', 'default')
 $(this).find(".tiptip").css({'top': 160,'left': 900,'display':'block'});


}).mousemove(function(e) {

 x = e.pageX;
 y = e.pageY;

/*  $(this).find(".tiptip").css({'top': y,'left': x});
 */
}).mouseleave(function() {

 $(this).css('z-index','1')
 $(this).css('background', 'none')
 $(this).css('color', '#000000')
 $(this).find(".tiptip").css('display', 'none')
 $(this).find(".tiptip").animate({"opacity": "hide"},100);
 
});

});</script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

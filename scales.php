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
    $consulta = "SELECT * FROM escalas";
    $result = $my_db -> prepare($consulta);
    $result -> execute();
    $escalas = $result -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escalas</title>

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
                        <h2 class="form-title">Escalas</h2>
                        <!-- <div class="form-group form-button">
                            <a href="new_product.php" class="form-submit" id="signup" role="button">Agregar Producto</a>
                        </div>
                        <div class="form-group form-button">
                            <a href="precio_disponibilidad.php" class="form-submit" id="signup" role="button">Modificar Precios o Disponibilidad</a>
                        </div> -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" href="new_scale.php"  type="button" class="btn btn-secondary">Agregar Escala</a>
                        </div>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Fin</th>
                                <th scope="col">Step</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                 foreach($escalas as $esc){
                                    echo "<tr class='thumbnail-item'>
                                    <th scope='row'>$contador</th>
                                    <td>$esc[1]</td>
                                    <td>$esc[2]</td>
                                    <td>$esc[3]</td>
                                    <td>$esc[4]</td>
                                    <td align='center'>
                                        <form action='edit_scale.php' method='post'>
                                            <button name='scale_id' type='submit' value='$esc[0]' class='btn btn-primary btn-sm'><i class='zmdi zmdi-edit material-icons-name'></i></button>
                                        </form>
                                    </td>
                                    <td align='center'>
                                        <form action='consultas/delete_scale.php' method='post'>
                                            <button name='scale_id' type='submit' value='$esc[0]' class='btn btn-danger btn-sm'><i class='zmdi zmdi-delete material-icons-name'></i></button>
                                        </form>
                                    </td>
                                    </tr>";
                                    $contador += 1;
                                };
                                ?>
                            </tbody>
                        </table>
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

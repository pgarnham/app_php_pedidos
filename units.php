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
    $consulta = "SELECT nombre FROM unidades";
    $result = $my_db -> prepare($consulta);
    $result -> execute();
    $unidades = $result -> fetchAll();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unidades</title>

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
                        <h2 class="form-title">Unidades</h2>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                 foreach($unidades as $unit){
                                    echo "<tr>
                                    <th scope='row'>$contador</th>
                                    <td>$unit[0]</td>
                                    <td> <button href='#' type='button' class='btn btn-success'><i class='fas fa-edit'></i></button>
                                    <button href='#' type='button' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
                                    </td>
                                    </tr>";
                                    $contador += 1;
                                };
                                ?>
                            </tbody>
                        </table>

                        <div class="form-group form-button">
                            <a href="new_unit.php" class="form-submit" id="signup" role="button">Crear Unidad</a>
                        </div>
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

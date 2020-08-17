<?php
require("connection.php");
require("consultas/consulta_semana.php");

$query_prod = "SELECT productos.pid, productos_semanas.precio
                    FROM productos INNER JOIN productos_semanas
                                     ON productos.pid = productos_semanas.pid AND productos_semanas.sem_id = $semana";
$pre_query_prod = $my_db -> prepare($query_prod);
$pre_query_prod -> execute();
$productos_precios = $pre_query_prod -> fetchAll();

$query_com = "SELECT * FROM comunas";
$pre_query_com = $my_db -> prepare($query_com);
$pre_query_com -> execute();
$comunas = $pre_query_com -> fetchAll();

$query_users = "SELECT correo, type FROM usuarios";
$pre_query_users = $my_db -> prepare($query_users);
$pre_query_users -> execute();
$users = $pre_query_users -> fetchAll();
$js_users = [];
    foreach ($users as $user){
        if ($user[1] == 3){
            array_push($js_users, $user[0]);
        }
    }
$cantidades = [];
foreach ($productos_precios as $prod_pre){
    $name_var = "cantidad_" . strval($prod_pre[0]);
    if( isset($_POST[$name_var]) )
    {
        if ( $_POST[$name_var] > 0){
            array_push($cantidades, [$prod_pre[0], $_POST[$name_var]]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type='text/javascript'>
        var js_correos = [<?php echo '"'.implode('","', $js_users).'"' ?>];
        var set_correos = new Set(js_correos);
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <title>Enviar Pedido</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<br>
<div class="main" style='padding: 5px 5px 5px 5px;'>
<section class="sign-in">
    <div class="container">
        <div class="signin-content" style="padding-top: 20px; padding-bottom: 30px;">
            <div class="signin-form">
                <h2 class="form-title">Si ya pediste antes</h2>
                <form method="POST" class="register-form" id="login-form" action="consultas/pedido_cliente.php" onsubmit="return checkUser(this);">
                <?php 
                        foreach($cantidades as $cant){
                            echo "<input type='hidden' value='$cant[1]' id='cant_u$cant[0]' name='cant$prod_pre[0]' class='cantidad' style='width: 0; height: 0;'/>";
                        }
                        ?>
                    <div class="form-group">
                        <label for="your_email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                        <input type="email" name="your_email" id="your_email" placeholder="Tu correo" required>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit btn-success" value="Enviar Pedido"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</div>
<br>
    <div class="main" style='padding: 5px 5px 5px 5px;'>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content" style="padding-top: 20px; padding-bottom: 30px;">
                    <div class="signup-form">
                        <h2 class="form-title">¿Primera Compra?</h2>
                        <form method="POST" class="register-form" id="register-form" action="consultas/pedido_nuevo_cliente.php" onsubmit="return checkEmail(this);">
                        <?php 
                        foreach($cantidades as $cant){
                            $input_id = "cant" . strval($cant[0]);
                            #$input_name = "cant" . strval($prod_pre[0]);
                            echo "<input type='hidden' value='$cant[1]' id='$input_id' name='$input_id' class='cantidad'  style='width: 0; height: 0;'>";
                        }
                        ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="new_name" id="name" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-face"></i></label>
                                <input type="text" name="new_last_name" id="last_name" placeholder="Apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="new_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="new_email" id="email" placeholder="Tu correo" required>
                            </div>
                            <div class="form-group">
                                <label for="conf_new_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="conf_new_email" id="conf_new_email" placeholder="Confirma tu correo" required>
                            </div>
                            <div class="form-group">
                                <label for="new_phone"><i class="zmdi zmdi-phone fa-phone"></i></label>
                                <input type="text" name="new_phone" id="new_phone" placeholder="Tu Celular" required>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-home fa-home"></i></label>
                                <input type="text" name="new_address" id="new_address" placeholder="Dirección" required>
                            </div>
                            <div class="form-group">
                            <!-- <label for="sel1"> Comuna</label> -->
                            <label style='display : inline; padding-right : 4px;' class='control-label' for='comuna'><i class='zmdi zmdi-city material-icons-name'></i></label>
                            <div>
                            <select class="form-control" name="comuna" id="comuna" style="margin-top : 4px; position:relative; left:20px; width: 291px;" required>
                                <?php
                                echo "<option disabled selected>Comuna</option>";
                                foreach($comunas as $com){
                                    echo "<option value='$com[0]'>$com[1]</option>";
                                };
                                ?>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="new_condominio"><i class="zmdi zmdi-city-alt fa-home"></i></label>
                                <input type="text" name="new_condomino" id="new_condominio" placeholder="Condominio"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" value="si" checked>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Quiero guardar mis datos para otra compra</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit btn-success" value="Enviar Pedido"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
       

    </div>
    <?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/form_script.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

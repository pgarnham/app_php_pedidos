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
<head>
    <link rel="stylesheet" href="css/cart_style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <script type="text/javascript" src="js/cart_script.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
</head>
<header id="site-header">
    <div class="container">
        <h1 class="total">Total: &#36 <span>0</span></h1>
    </div>
</header>
 <br><br><br><br><br><br>
<div class="container">
    <section id="cart">
        <?php foreach($productos as $prod){
        echo "<article class='product' style='height: 420px;'>
            <header style='width: 300px; height: 300px;'>
                    <img src='$prod[6]' alt=''>
            </header>

            <div class='content' style='height: 300px; width: 335px; position: relative; left: calc(50% - 330px); top: calc(50% - 210px);'>
                <h1 style='font-size: 30px;'>$prod[0]</h1>
            </div>
            <footer class='content' style='height: 50px; position: relative; left: calc(50% - 350px); top: calc(50% - 210px);'>
                <h2 class='full-price-1'>
                    Total producto
                </h2>
                <h2 class='price-1'>
                    Precio
                </h2>
            </footer>
            <footer class='content' style='position: relative; left: calc(50% - 350px); top: calc(50% - 210px);'>
                <span class='qt-minus' style='vertical-align:auto;'>-</span>
                <span class='qt'>0</span>
                <span class='qt-plus'>+</span>

                <h2 class='full-price'>
                    0 &#36
                </h2>

                <h2 class='price'>
                    $prod[1] &#36
                </h2>
            </footer>
        </article>
        <br><br><br><br>";}?>
    </section>

</div>
<br>
<footer id="site-footer">
    <div class="container clearfix">

        <div class="left">
            <h2 class="subtotal">Subtotal: <span>163.96</span>&#36</h2>
            <h3 class="tax">Taxes (5%): <span>8.2</span>&#36</h3>
            <h3 class="shipping">Shipping: <span>5.00</span>&#36</h3>
        </div>
        <div class="left">
            <a class="btn">Checkout</a>
        </div>

    </div>
</footer>

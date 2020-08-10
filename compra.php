<?php
session_start();?>
<?php
    require("connection.php");
    require("consultas/consulta_semana.php");

    $consulta_cat = "SELECT * FROM categorias";
    $res_cat = $my_db -> prepare($consulta_cat);
    $res_cat -> execute();
    $categorias = $res_cat -> fetchAll();
    $len_cat = count($categorias);
    $js_cat = [];
    foreach ($categorias as $c){
        array_push($js_cat, $c[0]);
    }
?>
<head>
    <script type='text/javascript'>
        var js_categorias = [<?php echo '"'.implode('","', $js_cat).'"' ?>];
    </script>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart_style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1.0, user-scalable=0">
</head>
<header id="site-header">
    <div class="container" style="height: 170px;">
        <div class="dropdown">
<!--             <button onclick="myFunction()" class="dropbtn">Categorías <i class="zmdi zmdi-caret-down material-icons-carrot"></i></button>
 -->            <select class="dropbtn" style="-webkit-appearance: none; padding: 15px 40px;" id="select-anchor">
                <?php
                foreach($categorias as $cat){
                    $name_value = "#cat" . strval($cat[0]);
                    echo "<option value='$name_value' class='dropbtn' style='padding: 15px 40px;'>$cat[1]</option>";
                }    
                 ?>
            </select>
        </div>
        <h1 class="total" style="position: relative; top: -35px; border: 5px solid black; width: 260px; height: 90px; padding: 20px 13px; vertical-align: middle; left:410">Total: &#36 <span>0</span></h1>
    </div>
</header>
 <br><br><br><br><br><br><br><br><br>
<div class="container">
    <section id="cart">
    <?php foreach($categorias as $cat){
        $cat_id = "cat" . strval($cat[0]);
        echo "<div id='$cat_id'>";
        echo "<nav aria-label='breadcrumb' style='height: 80px; width: 660px; font-size: 32px; font-weight: bold;'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item active' aria-current='page'>$cat[1]</li>
        </ol>
    </nav>";
    $consulta = "SELECT productos.nombre, productos_semanas.precio, categorias.nombre, unidades.nombre, productos_semanas.disp, productos.pid, productos.imagen
                         FROM productos INNER JOIN categorias ON productos.cat_id = categorias.cat_id
                                        INNER JOIN unidades ON productos.unit_id = unidades.unit_id
                                        INNER JOIN productos_semanas ON productos.pid = productos_semanas.pid AND productos_semanas.sem_id = '$semana' WHERE productos.cat_id = $cat[0]";
    $result = $my_db -> prepare($consulta);
    $result -> execute();
    $productos = $result -> fetchAll();
    ?>
        <?php foreach($productos as $prod){
        echo "<article class='product' style='height: 420px !important;'>
            <header style='width: 300px; height: 300px;'>
                    <img src='$prod[6]' alt=''>
            </header>

            <div class='content' style='height: 300px; width: 355px; position: relative; left: calc(50% - 350px); top: calc(50% - 210px);'>
                <h1 style='font-size: 30px;'>$prod[0]</h1>
                <h2 class='price'>
                    &#36 $prod[1]
                </h2>
            </div>
            <footer class='content' style='height: 50px; position: relative; left: calc(50% - 350px); top: calc(50% - 240px);'>
                <h2 class='full-price-1'>
                    Total producto
                </h2>
            </footer>
            <footer class='content' style='position: relative !important; left: calc(50% - 350px); top: calc(50% - 250px);'>
                <span class='qt-minus' style='vertical-align:auto; padding: 0 51px;'>-</span>
                <span class='qt'>0</span>
                <span class='qt-plus' style='padding: 0 51px;'>+</span>
                <h2 class='full-price'>
                0
                </h2>
                <h2 class='price' style='visibility: hidden;'>
                    $prod[1] &#36
                </h2>
            </footer>
        </article>
        <br><br><br><br>";}
        echo "</div>";
        }?>
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
        <div class="left" id="checkoutt">
            <a class="btn">Checkout</a>
        </div>

    </div>
</footer>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/cart_script.js"></script>
<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("consulta_semana.php");
  setlocale(LC_MONETARY, 'es_CL');
  $var_name = $_POST["new_name"];
  $var_last_name = $_POST["new_last_name"];
  $var_email = $_POST["new_email"];
  $var_address = $_POST["new_address"];
  $var_comuna = $_POST["comuna"];
  $var_condo = "";
  if (isset($_POST["new_condominio"])){
    $var_condo = $_POST["new_condominio"];
  }


  function moneda_chilena($numero){
    $numero = (string)$numero;
    $puntos = floor((strlen($numero)-1)/3);
    $tmp = "";
    $pos = 1;
    for($i=strlen($numero)-1; $i>=0; $i--){
    $tmp = $tmp.substr($numero, $i, 1);
    if($pos%3==0 && $pos!=strlen($numero))
    $tmp = $tmp.".";
    $pos = $pos + 1;
    }
    $formateado = "$ ".strrev($tmp);
    return $formateado;
    }
  
 
  $var_phone = $_POST["new_phone"];
  $guardar = $_POST["agree-term"];
  #echo $guardar;
  $tipo = 3;

  if ($guardar != "si"){
      $tipo = 4;
  }
    $nombre_final = $var_name . " ";
    $nombre_final = $nombre_final . $var_last_name;
    #echo $nombre_final;
    $crear = "INSERT INTO usuarios (nombre, direccion, correo, telefono, com_id, condominio, type) 
            VALUES ('$nombre_final', '$var_address', '$var_email', '$var_phone', $var_comuna, '$var_condo', $tipo)";
  #echo $crear;
  $result = $my_db -> prepare($crear);
  $result -> execute();

  $usuario = "SELECT usuarios.uid FROM usuarios WHERE correo = '$var_email'";
  $result = $my_db -> prepare($usuario);
  $result -> execute();
  $uid = $result -> fetchAll();
  $usid = $uid[0][0];
  #echo $usid;

  $insert_pedido = "INSERT INTO pedidos (uid, sem_id) VALUES ($usid, $semana)";
  $resultado = $my_db -> prepare($insert_pedido);
  $resultado -> execute();

  $usuario = "SELECT pe_id FROM pedidos WHERE uid = $usid AND sem_id = $semana";
  $res = $my_db -> prepare($usuario);
  $res -> execute();
  $pe_id = $res -> fetchAll();
  $pe_id = $pe_id[0][0];
  #echo $pe_id;

  $query_prod = "SELECT productos.pid, productos_semanas.precio, productos.nombre, unidades.nombre
                    FROM productos INNER JOIN productos_semanas
                                                       ON productos.pid = productos_semanas.pid
                                   INNER JOIN unidades ON unidades.unit_id = productos.unit_id
                                   WHERE productos_semanas.sem_id = $semana";
  #echo $query_prod;
  $pre_query_prod = $my_db -> prepare($query_prod);
  $pre_query_prod -> execute();
  $productos_precios = $pre_query_prod -> fetchAll();
  #echo $productos_precios[0][1];

  $query_pedido = "INSERT INTO item_pedido(pe_id, pid, cantidad, precio)
                    VALUES ";
  $contador = 0;
  $total = 0;
  ?>
  <!DOCTYPE html>
  <html lang='en'>
  <head>
      
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <meta http-equiv='X-UA-Compatible' content='ie=edge'>
      <meta name="x-apple-disable-message-reformatting">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/resumen_style.css">
      <script src="../js/html2pdf/html2pdf.bundle.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
      <title>Resumen de tu Pedido</title>
  
      <!-- Font Icon -->

  
      <!-- Main css -->
  </head>
  <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
  <center style="width: 100%; background-color: #f1f1f1;">
  <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
  <div style="margin: auto;" class="email-container">

  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td class="logo" style="text-align: center;">
			            <h1><a href="#">El Sureño Delivery</a></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
            		<td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
            			<div class="text">
            				<h2>Este es el resumen de tu pedido!</h2>
            			</div>
            		</td>
            	</tr>
            </table>
  <div class="container">
  <table class='table' id='element-to-print'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Producto</th>
      <th scope='col'>Unidad</th>
      <th scope='col'>Precio</th>
      <th scope='col'>Cantidad</th>
      <th scope='col'>Subtotal</th>
    </tr>
  </thead>
  <tbody>

  <?php
  foreach ($productos_precios as $prod_pre){
    $name_var = "cant" . strval($prod_pre[0]);
    #echo $name_var;
    if( isset($_POST[$name_var]) )
    {
      #echo "hola";
        if ( floatval($_POST[$name_var]) > 0){
          $precio_formato = moneda_chilena($prod_pre[1]);
          #echo $precio_formato;
          $show_unidad_precio = strval($prod_pre[3]) . " (" . $precio_formato . ")";
          $subtotal = floatval($_POST[$name_var]) * floatval($prod_pre[1]);
          $total += $subtotal;
          $subtotal_formato = moneda_chilena($subtotal);
          
          echo "<tr>
                    <th scope='row'>$contador</th>
                      <td>$prod_pre[2]</td>
                      <td>$prod_pre[3]</td>
                      <td>$precio_formato</td>
                      <td>$_POST[$name_var]</td>
                      <td>$subtotal_formato</td>
                  </tr>";
            if ($contador == 0){
              $query_pedido = $query_pedido . "('$pe_id', $prod_pre[0], $prod_pre[1], $_POST[$name_var])";
              $contador += 1;
            }
            else{
              $query_pedido = $query_pedido . ", ('$pe_id', $prod_pre[0], $prod_pre[1], $_POST[$name_var])";
              $contador += 1;
            }
        }
    }
}
#echo $query_pedido;
  $insertando_compra = $my_db -> prepare($query_pedido);
  $insertando_compra -> execute();
  echo "<tbody>
        </table>
        </div>
        <div class='container' style='position: relative;'>
        <button style='position: absolute; right: 10px; top: 5px;' onclick='imprimir()' type='button' class='btn btn-success'>Descargar Resumen en PDF</button>
        </div>
        </body>
        </html>";

  echo '<script src="../js/download_pdf.js"></script>';
  /* echo '<script language="javascript">';
  echo 'alert("Usuario registrado con éxito!")';
  echo '</script>'; */
  # require("enviar_correo_nuevo_cliente.php");

  // echo '<script>window.location = "../compra_exitosa.php" </script>';
  ?>



<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("consulta_semana.php");

  $var_email = $_POST["your_email"];

  

  $usuario = "SELECT uid FROM usuarios WHERE correo = $var_email";
  $result = $my_db -> prepare($usuario);
  $result -> execute();
  $uid = $result -> fetchAll();
  $usid = $uid[0][0];

  $insert_pedido = "INSERT INTO pedidos (uid, sem_id) VALUES ($usid, $semana)";
  $resultado = $my_db -> prepare($insert_pedido);
  $resultadp -> execute();

  $usuario = "SELECT pe_id FROM pedidos WHERE uid = $usid AND sem_id = $semana";
  $res = $my_db -> prepare($usuario);
  $res -> execute();
  $pe_id = $res -> fetchAll();
  $pe_id = $pe_id[0][0];

  $query_prod = "SELECT productos.pid, productos_semanas.precio
                    FROM productos INNER JOIN productos_semanas
                                     ON productos.pid = productos_semanas.pid AND productos_semanas.sem_id = '$semana'";
  $pre_query_prod = $my_db -> prepare($query_prod);
  $pre_query_prod -> execute();
  $productos_precios = $pre_query_prod -> fetchAll();

  $query_pedido = "INSERT INTO item_pedido (pe_id, pid, cantidad, precio)
                    VALUES ";
  $contador = 0;
  foreach ($productos_precios as $prod_pre){
    $name_var = "cant" + strval($prod_pre[0]);
    if( isset($_POST[$name_var]) )
    {
        if ( $_POST[$name_var] > 0){
            if ($contador == 0){
              $query_pedido = $query_pedido . "('$pe_id', $prod_pre[0], $prod_pre[1], $_POST[$name_var]),";
              $contador += 1;
            }
            else{
              $query_pedido = $query_pedido . ", ('$pe_id', $prod_pre[0], $prod_pre[1], $_POST[$name_var]),";
            }
        }
    }
}
  $insertando_compra = $my_db -> prepare($query_pedido);
  $insertando_compra -> execute();

  require("enviar_correo.php");

  echo '<script>window.location = "../compra_exitosa.php" </script>';

  ?>
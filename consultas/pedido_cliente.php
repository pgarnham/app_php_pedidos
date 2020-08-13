<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("consulta_semana.php");

  $var_name = $_POST["new_name"];
  $var_last_name = $_POST["new_last_name"];
  $var_email = $_POST["new_email"];
  $var_address = $_POST["new_address"];
  $var_comuna = $_POST["comuna"];
  $var_condo = $_POST["new_condominio"];
  $var_phone = $_POST["new_phone"];
  $guardar = $_POST["agree-term"];
  $tipo = 3;

  if ($guardar != "si"){
      $tipo = 4;
  }

    $crear = "INSERT INTO usuarios (nombre, direccion, correo, telefono, com_id, condominio, type) 
            VALUES ('$var_name . $var_last_name', '$var_address', '$var_email', '$var_phone', $var_comuna, '$var_condo', $tipo)";
  
  $result = $my_db -> prepare($crear);
  $result -> execute();

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

  /* echo '<script language="javascript">';
  echo 'alert("Usuario registrado con éxito!")';
  echo '</script>'; */

  echo '<script>window.location = "../products.php" </script>';

  ?>
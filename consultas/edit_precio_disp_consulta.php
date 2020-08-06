<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("consulta_semana.php");

 
  $var_precio = $_POST["precio"];
  
  
  $pid = $_POST["product_id"];
  $key = "disp" . strval($pid);
  $var_disp = $_POST[$key];
  if ($var_disp == "si"){
    $var_disp = 1;
} else{
    $var_disp = 0;
}

  $editar = "UPDATE productos_semanas SET precio = '$var_precio', disp = $var_disp 
  WHERE productos_semanas.pid = $pid AND productos_semanas.sem_id = '$semana'";
  
  $result = $my_db -> prepare($editar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Precio y/o Disponibilidad actualizado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../edit_precios_disp.php" </script>';

  ?>
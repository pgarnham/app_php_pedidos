<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_name = $_POST["nombre"];
  $var_cat = $_POST["categoria"];
  $var_unit = $_POST["unidad"];
  $var_imagen = $_POST["foto"];
  $pid = $_POST["product_id"];

  $editar = "UPDATE productos SET nombre = '$var_name', cat_id = $var_cat, unit_id = $var_unit, imagen = $var_imagen 
  WHERE productos.pid = $pid";
  
  echo "'$editar'";

  $result = $my_db -> prepare($editar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Producto editado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../products.php" </script>';

  ?>
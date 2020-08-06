<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_name = $_POST["nombre"];
  $var_imagen = $_POST["imagen"];
  $var_cat = $_POST["categoria"];
  $var_unit = $_POST["unidad"];

  $crear = "INSERT INTO productos (nombre, cat_id, unit_id, imagen) 
                    VALUES ('$var_name', $var_cat, $var_prize, $var_unit, $var_imagen)";
  
  $result = $my_db -> prepare($crear);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Producto agregado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../products.php" </script>';

  ?>
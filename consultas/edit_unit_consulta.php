<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_name = $_POST["nombre"];
  $unit_id = $_POST["unit_id"];

  $editar = "UPDATE unidades SET nombre = '$var_name' 
  WHERE unidades.unit_id = $unit_id";
  
  echo "'$editar'";

  $result = $my_db -> prepare($editar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Unidad editada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../units.php" </script>';

  ?>
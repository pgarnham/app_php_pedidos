<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $id_unit = $_POST["unit_id"];


  $eliminar = "DELETE FROM unidades WHERE unit_id = $id_unit";
  

  $result = $my_db -> prepare($eliminar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Unidad eliminado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../units.php" </script>';

  ?>
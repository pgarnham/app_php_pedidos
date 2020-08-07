<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $id_escala = $_POST["scale_id"];


  $eliminar = "DELETE FROM escalas WHERE esc_id = $id_escala";
  
  $result = $my_db -> prepare($eliminar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Escala eliminada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../scales.php" </script>';

  ?>
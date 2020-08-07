<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_desc = $_POST["desc"];
  $var_start = $_POST["start"];
  $var_stop = $_POST["stop"];
  $var_step = $_POST["step"];
  $esc_id = $_POST["esc_id"];

  $editar = "UPDATE escalas SET descripcion = '$var_desc', start = $var_start, stop = $var_stop, step = $var_step 
  WHERE escalas.esc_id = $esc_id";
  
  echo "'$editar'";

  $result = $my_db -> prepare($editar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Escala editada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../scales.php" </script>';

  ?>
<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_desc = $_POST["descripcion"];
  $var_start = $_POST["start"];
  $var_stop = $_POST["stop"];
  $var_step = $_POST["step"];

  $crear = "INSERT INTO escalas (descripcion, start, stop, step) 
                    VALUES ('$var_desc', $var_start, $var_stop, $var_step)";
  
  $result = $my_db -> prepare($crear);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Escala agregada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../scales.php" </script>';

  ?>
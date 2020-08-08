<?php 
session_start();
?>
<?php
  # require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $nro_semana = (int)date("W");

  $query = "SELECT * FROM semanas WHERE numero_semana = '$nro_semana'";
  $result = $my_db -> prepare($query);
  $result -> execute();
  $semana = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  $semana = (int) $semana[0][0];
  ?>
<?php 
session_start();
?>

<head>
<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <?php
  # require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $nro_semana = (int)date("W");

  $query = "SELECT * FROM semanas WHERE numero_semana = '$nro_semana'";
  $result = $my_db -> prepare($query);
  $result -> execute();
  $semana = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  $semana = (int) $semana[0][0];
  ?>
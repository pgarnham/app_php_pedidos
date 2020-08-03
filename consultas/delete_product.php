<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $id_producto = $_POST["product_id"];


  $eliminar = "DELETE FROM productos WHERE pid = $id_producto";
  
  echo "'$eliminar'";

  $result = $my_db -> prepare($eliminar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Producto eliminado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../products.php" </script>';

  ?>
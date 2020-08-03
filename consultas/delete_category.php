<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $id_category = $_POST["category_id"];


  $eliminar = "DELETE FROM categorias WHERE cat_id = $id_category";
  

  $result = $my_db -> prepare($eliminar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Categoría eliminada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../categories.php" </script>';

  ?>
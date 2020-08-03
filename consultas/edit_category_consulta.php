<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


 
  $var_name = $_POST["nombre"];
  $category_id = $_POST["category_id"];

  $editar = "UPDATE categorias SET nombre = '$var_name' 
  WHERE categorias.cat_id = $category_id";
  
  echo "'$editar'";

  $result = $my_db -> prepare($editar);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Categoría editada con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../categories.php" </script>';

  ?>
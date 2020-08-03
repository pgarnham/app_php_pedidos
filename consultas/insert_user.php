<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var_name = $_POST["new_name"];
  $var_last_name = $_POST["new_last_name"];
  $var_email = $_POST["new_email"];
  $var_pass = $_POST["new_pass"];
  $var_address = $_POST["new_address"];
  $var_comuna = $_POST["new_comuna"];
  $var_condo = $_POST["new_condominio"];
  $var_phone = $_POST["new_phone"];

    
    $crear = "INSERT INTO productos (nombre, direccion, correo, telefono, pass, condominio, comuna, type) 
    VALUES ('$var_name . $var_last_name', '$var_address', '$var_email', '$var_phone','$var_pass', '$var_condo', '$var_comuna', 3)";
  
  echo "'$crear'";

  $result = $my_db -> prepare($crear);
  $result -> execute();

  echo '<script language="javascript">';
  echo 'alert("Usuario registrado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../products.php" </script>';

  ?>
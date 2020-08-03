<?php
session_start(); 
$var_user = $_POST["your_email"];
if (!isset($_SESSION['current_user_id'])) {
    echo '<script>window.location = "index.php" </script>';
    
}
?>

<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var_name = $_POST["unit"];
 

  $crear = "INSERT INTO unidades (nombre) 
            VALUES ('$var_name')";

  $result = $my_db -> prepare($crear);
  $result -> execute();

  echo '<script>window.location = "../units.php" </script>';
  ?>
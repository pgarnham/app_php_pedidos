<?php 
session_start();
?>

<head>
<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $var_user = $_POST["your_email"];
  echo $var_user;
  $var_pass = $_POST["your_pass"];
  echo $var_pass;


  $existe = "SELECT correo, pass, uid FROM usuarios WHERE usuarios.correo = '$var_user'";
  $result = $my_db -> prepare($existe);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo


  
  # $dataCollected = $result -> fetch(); #Obtiene todos los resultados de la consulta en forma de un arreglo

  $var_user_id = $dataCollected[0][2];
  $_SESSION['current_user_id'] = $var_user_id;

  if($var_user != $dataCollected[0][0] or !(password_verify($var_pass, $dataCollected[0][1])))
    {
      echo '<script>window.location = "../login.php" </script>'; 
      exit;
    }
  ?>

<form method="post" action="../home.php" id="login_form">

    <input type="hidden" name="your_email" 
    value="<?php echo $_POST['your_email']; ?>">

    <script type="text/javascript">
      document.getElementById('login_form').submit(); // SUBMIT FORM
    </script>

</form>
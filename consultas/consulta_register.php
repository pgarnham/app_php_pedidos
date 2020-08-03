<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var_name = $_POST["new_name"];
  $var_apellido = $_POST["new_last_name"];
  $var_email = $_POST["new_email"];
  $var_pass = $_POST["new_pass"];
  $var_pass_2 = $_POST["re_pass"];
  $var_address = $_POST["new_address"];
  $var_comuna = $_POST["new_comuna"];
  $var_condominio = $_POST["new_condominio"];
  $var_phone = $_POST["new_phone"];

  if ($var_pass != $var_pass_2) {
    // Contraseñas distintas, tiene que tratar denuevo
 
    header("Location:../wrong_register.php");
    exit;
  }
  $existe = "SELECT correo FROM usuarios WHERE usuarios.correo = '$var_email'";
  $result = $my_db -> prepare($existe);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  
  if ($var_email == $dataCollected[0][0]) {
    // Usuario ya existe, tiene que tratar denuevo
    echo '<script>window.location = "../wrong_register.php" </script>';
    exit;
  }


  ?>

<form method="post" action="insert_user.php" id="insert_form">



<input type="hidden" name="new_name" 
 value="<?php echo $_POST['new_name']; ?>">

 <input type="hidden" name="new_last_name" 
 value="<?php echo $_POST['new_last_name']; ?>">

<input type="hidden" name="new_email" 
value="<?php echo $_POST['new_email']; ?>">
 
<input type="hidden" name="new_address" 
 value="<?php echo $_POST['new_address']; ?>">

 <input type="hidden" name="new_condominio" 
 value="<?php echo $_POST['new_condominio']; ?>">

 <input type="hidden" name="new_comuna" 
 value="<?php echo $_POST['new_comuna']; ?>">

 <input type="hidden" name="new_phone" 
 value="<?php echo $_POST['new_phone']; ?>">

<input type="hidden" name="new_pass" 
  value="<?php echo password_hash($_POST['new_pass'], PASSWORD_DEFAULT); ?>">
  
  <script type="text/javascript">
    document.getElementById('insert_form').submit(); // SUBMIT FORM
  </script>
</form>




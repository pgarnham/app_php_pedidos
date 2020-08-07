<?php
  require("../connection.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("consulta_semana.php");

 
  $var_name = $_POST["nombre"];
  $var_imagen = $_POST["imagen"];
  $var_cat = $_POST["categoria"];
  $var_unit = $_POST["unidad"];
  $var_esc = $_POST["escala"];
  $var_precio = $_POST["precio"];
  $var_disp = $_POST["disp"];

  $crear = "INSERT INTO productos (nombre, cat_id, unit_id, esc_id, imagen) 
                    VALUES ('$var_name', $var_cat, $var_unit, $var_esc, '$var_imagen')";
  
  $result = $my_db -> prepare($crear);
  $result -> execute();

  $pid_query = "SELECT pid FROM productos ORDER BY pid DESC LIMIT 1";
  echo $pid_query;
  $pid_r = $my_db -> prepare($pid_query);
  $pid_r -> execute();
  $pid = $pid_r -> fetchAll();
  $pid = $pid[0][0];
  echo $pid;
  $disp_num = 0;
  if ($var_disp == "si"){
      $disp_num = 1;
  }

  $crear_2 = "INSERT INTO productos_semanas (sem_id, pid, precio, disp) 
                    VALUES ($semana, $pid, $var_precio, $disp_num)";
  
  $result_2 = $my_db -> prepare($crear_2);
  $result_2 -> execute();

  echo '<script language="javascript">';
  echo 'alert("Producto agregado con éxito!")';
  echo '</script>';

  echo '<script>window.location = "../products.php" </script>';

  ?>
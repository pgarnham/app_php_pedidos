<?php
$servername = "localhost";
$username = "igssacl_pgg";
$password = "Pgg160296";

try {
  $my_db = new PDO("mysql:host=$servername;dbname=igssacl_sureno", $username, $password);
  // set the PDO error mode to exception
  $my_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
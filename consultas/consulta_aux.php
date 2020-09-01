<?php
require("../connection.php");

$query = "SELECT * FROM productos_semanas WHERE productos_semanas.sem_id = 4";
$result_2 = $my_db -> prepare($query);
$result_2 -> execute();
$antiguos = $result_2 -> fetchAll();

foreach($antiguos as $ant){
	$actualizar = "INSERT INTO productos_semanas (sem_id, pid, precio, disp) 
            VALUES (8, $ant[2], $ant[3], $ant[4])";
            $result = $my_db -> prepare($actualizar);
            $result -> execute();
}
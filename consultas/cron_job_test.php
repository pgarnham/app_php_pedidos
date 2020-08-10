<?php require("../connection.php");
        $nro_semana = (int)date("W");
        $nueva_semana = "INSERT INTO semanas(numero_semana) VALUES(100)";
        $result = $my_db -> prepare($nueva_semana);
        $result -> execute();
        ?>
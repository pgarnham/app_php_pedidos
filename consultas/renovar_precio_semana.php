<?php require("../connection.php");
        $nro_semana = (int)date("W");
        $nueva_semana = "INSERT INTO semanas(numero_semana) VALUES($nro_semana)";
        $result = $my_db -> prepare($nueva_semana);
        $result -> execute();
        require("consulta_semana.php");
        echo $semana;
        $semana_pasada = "SELECT * FROM productos_semanas WHERE productos_semanas.sem_id = ($semana - 1)";
        $result_2 = $my_db -> prepare($semana_pasada);
        $result_2 -> execute();
        $antiguos = $result_2 -> fetchAll();

        foreach($antiguos as $ant){
            echo $ant;
            $actualizar = "INSERT INTO productos_semanas (sem_id, pid, precio, disp) 
            VALUES ($semana, $ant[2], $ant[3], $ant[4])";
            $result = $my_db -> prepare($actualizar);
            $result -> execute();
        };
?>
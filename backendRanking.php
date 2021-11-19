<?php
    $conection = mysqli_connect('127.0.0.1', 'root', '');
    mysqli_select_db($conection, "dungeonrio");

    $sql = "SELECT ROW_NUMBER() OVER(ORDER BY puntuacion DESC) AS puesto,nombre,clase,puntuacion
            FROM personaje";
    $result = mysqli_query($conection,$sql);

    if (!$result) {
        die("Error");
    }else {
        while ($personaje = mysqli_fetch_assoc($result)) {
            $personajes["data"][] = $personaje;
        }
        echo json_encode($personajes);
    }
    mysqli_free_result($result);
    mysqli_close($conection);
?>
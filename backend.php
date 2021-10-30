<?php
    function GetTopPersonajes($espec){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT nombre, clase, puntuacion 
                FROM personaje 
                WHERE especializacion = '$espec' 
                ORDER BY puntuacion DESC LIMIT 3";
        $result = mysqli_query($conection,$sql);
        echo "<br/><table>";
        echo "<tr><th>Personaje</th><th>Clase</th><th>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row["nombre"]."</td>";
            echo "<td>".$row["clase"]."</td>";
            echo "<td>".$row["puntuacion"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function GetTopGrupos(){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT nombre,puntuacion,ID
                FROM grupo
                ORDER BY puntuacion DESC LIMIT 3";
        $result = mysqli_query($conection,$sql);
        echo "<br/><table>";
        echo "<tr><th>Grupo</th><th>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row["nombre"]."</td>";
            echo "<td>".$row["puntuacion"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function GetTopHermandades(){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT nombre, clase, puntuacion FROM personaje WHERE especializacion = '$espec' ORDER BY puntuacion DESC LIMIT 3";
        $result = mysqli_query($conection,$sql);
        echo "<br/><table>";
        echo "<tr><th>Personaje</th><th>Clase</th><th>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row["nombre"]."</td>";
            echo "<td>".$row["clase"]."</td>";
            echo "<td>".$row["puntuacion"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
?>
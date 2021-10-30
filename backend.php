<?php
    function GetTopPersonajes($espec){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT nombre, clase, puntuacion 
                FROM personaje 
                WHERE especializacion = '$espec' 
                ORDER BY puntuacion DESC LIMIT 3";
        $result = mysqli_query($conection,$sql);
        echo "<br/><table class='table table-dark table-striped table-sm'>";
        echo "<tr class='text-center'><th scope='col'>Personaje</th><th scope='col'>Clase</th><th scope='col'>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
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
        echo "<br/><table class='table table-dark table-striped'>";
        echo "<tr><th scope='col'>Grupo</th><th scope='col'>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
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
        $sql = "SELECT nombre,avance 
                FROM hermandad ORDER BY avance DESC LIMIT 5";
        $result = mysqli_query($conection,$sql);
        echo "<br/><table class='table table-dark table-striped'>";
        echo "<tr><th scope='col'>Nombre</th><th scope='col'>Avance</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
            echo "<td>".$row["avance"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
?>
<?php
    function GetTopPersonajes($espec){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT nombre, clase, puntuacion 
                FROM personaje 
                WHERE especializacion = '$espec' 
                ORDER BY puntuacion DESC LIMIT 3";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped table-sm'>";
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
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Grupo</th><th scope='col'>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
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
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Nombre</th><th scope='col'>Avance</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
            echo "<td>".$row["avance"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function GetHermandadesProgreso(){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT h.nombre, p.jefeMatado , fecha
                FROM progreso AS p INNER JOIN hermandad AS h ON p.ID_hermandad = h.ID ORDER BY fecha DESC LIMIT 5";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Nombre</th><th scope='col'>Jefe Matado</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
            echo "<td>".$row["jefeMatado"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function getPersonaje($pj){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT h.nombre, p.jefeMatado , fecha
                FROM progreso AS p INNER JOIN hermandad AS h ON p.ID_hermandad = h.ID ORDER BY fecha DESC LIMIT 5";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Nombre</th><th scope='col'>Jefe Matado</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
            echo "<td>".$row["jefeMatado"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function getPersonajeMazmorras($pj){
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $mazmorras = ["Reposo de los Reyes","Asalto a Boralus","Fuerte Libre","Altar de la Tormenta","Veta Madre","Catacumbas putrefactas"];

        $sqlIdJugador = "SELECT ID FROM personaje WHERE nombre = '$pj';";
        $resultIdJugador = mysqli_query($conection,$sqlIdJugador);
        $IdJugador = mysqli_fetch_array($resultIdJugador)[0];
        mysqli_free_result($resultIdJugador);

        $sql = "SELECT m.nombre,r.tiempo_empleado,r.puntuacion 
                FROM realiza AS r INNER JOIN mazmorra AS m ON r.ID_mazmorra = m.ID 
                WHERE r.ID_personaje = $IdJugador ORDER BY m.ID;";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Mazmorra</th><th scope='col'>Tiempo Empleado</th><th scope='col'>Puntuacion</th></tr>";
        switch (mysqli_num_rows($result)) {
            case 0:
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Reposo de los Reyes</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Asalto a Boralus</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Fuerte Libre</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Altar de la Tormenta</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Veta Madre</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
                echo "<tr class='text-center'>";
                echo "<td scope='row'>Catacumbas putrefactas</td>";
                echo "<td>----</td>";
                echo "<td>----</td>";
                echo "</tr>";
            break;
            case 1:
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='text-center'>";
                    if (($key = array_search($row["nombre"], $mazmorras)) !== false) {
                        unset($mazmorras[$key]);
                    }
                    echo "<td scope='row'>".$row["nombre"]."</td>";
                    echo "<td>".$row["tiempo_empleado"]."</td>";
                    echo "<td>".$row["puntuacion"]."</td>";
                    echo "</tr>";
                }
                foreach ($mazmorras as $mazmorra) {
                    echo "</tr>";
                    echo "<tr class='text-center'>";
                    echo "<td scope='row'>$mazmorra</td>";
                    echo "<td>----</td>";
                    echo "<td>----</td>";
                    echo "</tr>";
                }
            break;
            case 2:
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='text-center'>";
                    if (($key = array_search($row["nombre"], $mazmorras)) !== false) {
                        unset($mazmorras[$key]);
                    }
                    echo "<td scope='row'>".$row["nombre"]."</td>";
                    echo "<td>".$row["tiempo_empleado"]."</td>";
                    echo "<td>".$row["puntuacion"]."</td>";
                    echo "</tr>";
                }
                foreach ($mazmorras as $mazmorra) {
                    echo "</tr>";
                    echo "<tr class='text-center'>";
                    echo "<td scope='row'>$mazmorra</td>";
                    echo "<td>----</td>";
                    echo "<td>----</td>";
                    echo "</tr>";
                }
            break;
            case 3:
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='text-center'>";
                    if (($key = array_search($row["nombre"], $mazmorras)) !== false) {
                        unset($mazmorras[$key]);
                    }
                    echo "<td scope='row'>".$row["nombre"]."</td>";
                    echo "<td>".$row["tiempo_empleado"]."</td>";
                    echo "<td>".$row["puntuacion"]."</td>";
                    echo "</tr>";
                }
                foreach ($mazmorras as $mazmorra) {
                    echo "</tr>";
                    echo "<tr class='text-center'>";
                    echo "<td scope='row'>$mazmorra</td>";
                    echo "<td>----</td>";
                    echo "<td>----</td>";
                    echo "</tr>";
                }
            break;
            case 4:
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='text-center'>";
                    if (($key = array_search($row["nombre"], $mazmorras)) !== false) {
                        unset($mazmorras[$key]);
                    }
                    echo "<td scope='row'>".$row["nombre"]."</td>";
                    echo "<td>".$row["tiempo_empleado"]."</td>";
                    echo "<td>".$row["puntuacion"]."</td>";
                    echo "</tr>";
                }
                foreach ($mazmorras as $mazmorra) {
                    echo "</tr>";
                    echo "<tr class='text-center'>";
                    echo "<td scope='row'>$mazmorra</td>";
                    echo "<td>----</td>";
                    echo "<td>----</td>";
                    echo "</tr>";
                }
            break;
            case 5:
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='text-center'>";
                    if (($key = array_search($row["nombre"], $mazmorras)) !== false) {
                        unset($mazmorras[$key]);
                    }
                    echo "<td scope='row'>".$row["nombre"]."</td>";
                    echo "<td>".$row["tiempo_empleado"]."</td>";
                    echo "<td>".$row["puntuacion"]."</td>";
                    echo "</tr>";
                }
                foreach ($mazmorras as $mazmorra) {
                    echo "</tr>";
                    echo "<tr class='text-center'>";
                    echo "<td scope='row'>$mazmorra</td>";
                    echo "<td>----</td>";
                    echo "<td>----</td>";
                    echo "</tr>";
                }
            break;
            default:
                while ($row = mysqli_fetch_array($result)) {
                echo "<tr class='text-center'>";
                echo "<td scope='row'>".$row["nombre"]."</td>";
                echo "<td>".$row["tiempo_empleado"]."</td>";
                echo "<td>".$row["puntuacion"]."</td>";
                echo "</tr>";
                }
            break;
        }
        
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }

    if (isset($_POST["buscar"])) {
        $nombre = $_POST["buscar"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT 'personaje' AS tipo, id,nombre FROM personaje WHERE nombre LIKE '%$nombre%'
                UNION
                SELECT 'hermandad', id,nombre FROM hermandad WHERE nombre LIKE '%$nombre%'";
        $result = mysqli_query($conection,$sql);
        $respuesta = array();
        while ($row = mysqli_fetch_array($result)) {
            // echo json_encode($row);
            if ($row[0] == "personaje") {
                $temporal = array("tipo"=>"personaje","id"=>$row["id"],"nombre"=>$row["nombre"]);
                $respuesta[] = $temporal;
            }else {
                $temporal = array("tipo"=>"hermandad","id"=>$row["id"],"nombre"=>$row["nombre"]);
                $respuesta[] = $temporal;
            }
        }
        mysqli_free_result($result);
        mysqli_close($conection);
        echo json_encode($respuesta);
    }

    if (isset($_GET["nombrePj"])) {
        $nombrePj = $_GET["nombrePj"];
        $clase = $_GET["clasePj"];
        $especializacion = $_GET["especializacionPj"];
        $jugador = $_GET["jugadorPj"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $sqlIdJugador = "SELECT ID FROM jugador WHERE usuario = '$jugador';";
        $resultIdJugador = mysqli_query($conection,$sqlIdJugador);
        $IdJugador = mysqli_fetch_array($resultIdJugador)[0];
        mysqli_free_result($resultIdJugador);

        $sql = "INSERT INTO personaje(nombre, clase, especializacion,ID_jugador)
                VALUES('$nombrePj','$clase','$especializacion',$IdJugador);";
        mysqli_query($conection,$sql);

        mysqli_close($conection);
    }
    
    if (isset($_GET["nombreHermandad"])) {
        $nombreHermandad = $_GET["nombreHermandad"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $sql = "INSERT INTO hermandad(nombre)
                VALUES('$nombreHermandad');";
        mysqli_query($conection,$sql);

        mysqli_close($conection);
    }

    if (isset($_GET["nombreGrupo"])) {
        $nombreGrupo = $_GET["nombreGrupo"];
        $nombreTank = $_GET["nombreTank"];
        $nombrePrimerDPS = $_GET["nombrePrimerDPS"];
        $nombreSegundoDPS = $_GET["nombreSegundoDPS"];
        $nombreTercerDPS = $_GET["nombreTercerDPS"];
        $nombreHealer = $_GET["nombreHealer"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $sqlAñadirGrupo = "INSERT INTO grupo(nombre)
                VALUES('$nombreGrupo');";
        mysqli_query($conection,$sqlAñadirGrupo);

        $sqlIdGrupo = "SELECT ID FROM grupo WHERE nombre = '$nombreGrupo';";
        $resultIdGrupo = mysqli_query($conection,$sqlIdGrupo);
        $IdGrupo = mysqli_fetch_array($resultIdGrupo)[0];
        mysqli_free_result($resultIdGrupo);

        $sqlIdTank = "SELECT ID FROM personaje WHERE nombre = '$nombreTank';";
        $resultIdTank = mysqli_query($conection,$sqlIdTank);
        $IdTank = mysqli_fetch_array($resultIdTank)[0];
        mysqli_free_result($resultIdTank);

        $sqlIdPrimerDPS = "SELECT ID FROM personaje WHERE nombre = '$nombrePrimerDPS';";
        $resultIdPrimerDPS = mysqli_query($conection,$sqlIdPrimerDPS);
        $IdPrimerDPS = mysqli_fetch_array($resultIdPrimerDPS)[0];
        mysqli_free_result($resultIdPrimerDPS);

        $sqlIdSegundoDPS = "SELECT ID FROM personaje WHERE nombre = '$nombreSegundoDPS';";
        $resultIdSegundoDPS = mysqli_query($conection,$sqlIdSegundoDPS);
        $IdSegundoDPS = mysqli_fetch_array($resultIdSegundoDPS)[0];
        mysqli_free_result($resultIdSegundoDPS);

        $sqlIdTercerDPS = "SELECT ID FROM personaje WHERE nombre = '$nombreTercerDPS';";
        $resultIdTercerDPS = mysqli_query($conection,$sqlIdTercerDPS);
        $IdTercerDPS = mysqli_fetch_array($resultIdTercerDPS)[0];
        mysqli_free_result($resultIdTercerDPS);

        $sqlIdHealer = "SELECT ID FROM personaje WHERE nombre = '$nombreHealer';";
        $resultIdHealer = mysqli_query($conection,$sqlIdHealer);
        $IdHealer = mysqli_fetch_array($resultIdHealer)[0];
        mysqli_free_result($resultIdHealer);

        $sqlAñadirPerteneceTank = "INSERT INTO pertenece(ID_grupo,ID_personaje)
                                VALUES($IdGrupo,$IdTank);";
        mysqli_query($conection,$sqlAñadirPerteneceTank);

        $sqlAñadirPertenecePrimerDPS = "INSERT INTO pertenece(ID_grupo,ID_personaje)
                                VALUES($IdGrupo,$IdPrimerDPS);";
        mysqli_query($conection,$sqlAñadirPertenecePrimerDPS);

        $sqlAñadirPerteneceSegundoDPS = "INSERT INTO pertenece(ID_grupo,ID_personaje)
                                VALUES($IdGrupo,$IdSegundoDPS);";
        mysqli_query($conection,$sqlAñadirPerteneceSegundoDPS);

        $sqlAñadirPerteneceTercerDPS = "INSERT INTO pertenece(ID_grupo,ID_personaje)
                                VALUES($IdGrupo,$IdTercerDPS);";
        mysqli_query($conection,$sqlAñadirPerteneceTercerDPS);

        $sqlAñadirPerteneceHealer = "INSERT INTO pertenece(ID_grupo,ID_personaje)
                                VALUES($IdGrupo,$IdHealer);";
        mysqli_query($conection,$sqlAñadirPerteneceHealer);

        mysqli_close($conection);
    }
    // TODO Terminar que mire si ya se a relizado y sumar la puntuacion
    if (isset($_GET["nombreMazmorra"])) {
        $nombreMazmorra = $_GET["nombreMazmorra"];
        $nombrePjRealizada = $_GET["nombrePjRealizada"];
        $tiempo = $_GET["tiempo"];
        $tiempoA = explode(":",$_GET["tiempo"]);
        $puntuacion = 100;
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $sqlIdMazmorra = "SELECT ID,tiempoMaximo FROM mazmorra WHERE nombre = '$nombreMazmorra';";
        $resultIdMazmorra = mysqli_query($conection,$sqlIdMazmorra);
        $rowMazmorra = mysqli_fetch_array($resultIdMazmorra);
        $IdMazmorra = $rowMazmorra["ID"];
        $TiempoMaximoMazmorra = $rowMazmorra["tiempoMaximo"];
        $TiempoMaximoMazmorraA = explode(":",$rowMazmorra["tiempoMaximo"]);
        mysqli_free_result($resultIdMazmorra);

        $sqlIdPersonaje = "SELECT ID FROM personaje WHERE nombre = '$nombrePjRealizada';";
        $resultIdPersonaje = mysqli_query($conection,$sqlIdPersonaje);
        $IdPersonaje = mysqli_fetch_array($resultIdPersonaje)[0];
        mysqli_free_result($resultIdPersonaje);

        $sqlPuntuacion = "SELECT puntuacion FROM realiza WHERE ID_mazmorra = '$IdMazmorra' AND ID_personaje = '$IdPersonaje';";
        $resultPuntuacion = mysqli_query($conection,$sqlPuntuacion);
        $row = mysqli_fetch_array($resultPuntuacion);

        $horas = $TiempoMaximoMazmorraA["0"] - $tiempoA["0"];
        $minutos = $TiempoMaximoMazmorraA["1"] - $tiempoA["1"];
        $segundos = $TiempoMaximoMazmorraA["2"] - $tiempoA["2"];
        if ($horas < 0) {
            $puntuacion = 0;
        }else {
            $puntuacion += $minutos + $segundos;
        }
        if ($row==null) {
            $sqlAñadirRealiza = "INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
                                VALUES($IdPersonaje,$IdMazmorra,'$tiempo',$puntuacion);";
            mysqli_query($conection,$sqlAñadirRealiza);
            $sqlUpdatePuntuacion = "UPDATE personaje AS p SET p.puntuacion = p.puntuacion + $puntuacion WHERE ID = $IdPersonaje";
            mysqli_query($conection,$sqlUpdatePuntuacion);
            echo "Mazmorra añadida puntuacion:".$puntuacion;
        }else {
            $puntuacionActual = $row["puntuacion"];
            $diferencia = $puntuacion - $puntuacionActual;
            if ($diferencia >= 0) {
                $diferencia - $diferencia;
                echo "Mazmorra añadida puntuacion:".$puntuacion;
                $sqlUpdatePuntuacionR = "UPDATE realiza AS r SET r.puntuacion = $puntuacion WHERE ID_personaje = $IdPersonaje AND ID_mazmorra = $IdMazmorra";
                mysqli_query($conection,$sqlUpdatePuntuacionR);
                $sqlUpdatePuntuacionP = "UPDATE personaje AS p SET p.puntuacion = p.puntuacion + $diferencia WHERE ID = $IdPersonaje";
                mysqli_query($conection,$sqlUpdatePuntuacionP);
            }else {
                echo "Mazmorra no añadida por tener menor o igual puntuacion:".$puntuacion." actual:".$puntuacionActual;
            }
        }

        mysqli_free_result($resultPuntuacion);
        mysqli_close($conection);
    }
    if (isset($_GET["hermandadProgreso"])) {
        $hermandadProgreso = $_GET["hermandadProgreso"];
        $jefe = $_GET["jefe"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $hermandad = "SELECT ID FROM hermandad WHERE nombre = '$hermandadProgreso';";
        $resultIDHermandad = mysqli_query($conection,$hermandad);
        $IDHermandad = mysqli_fetch_array($resultIDHermandad)[0];
        mysqli_free_result($resultIDHermandad);

        $progreso = "SELECT * FROM progreso WHERE ID_hermandad = $IDHermandad AND jefeMatado = $jefe;";
        $resultProgreso = mysqli_query($conection,$progreso);
        if (mysqli_fetch_array($resultProgreso)==null) {
            // echo "$progreso";
            $sqlProgreso = "INSERT INTO progreso(ID_hermandad,jefeMatado)
                    VALUES('$IDHermandad','$jefe');";
            mysqli_query($conection,$sqlProgreso);
            $sqlUpdateHermandad = "UPDATE hermandad AS h SET h.avance = h.avance + 1 WHERE ID = $IDHermandad";
            mysqli_query($conection,$sqlUpdateHermandad);
            echo "Progreso añadido";
        }else {
            // echo "$progreso";
            echo $hermandadProgreso." ya ha matado al jefe: ".$jefe;
        }
        mysqli_free_result($resultProgreso);
        mysqli_close($conection);
    }
    if (isset($_GET["usuario"])) {
        $usuario = $_GET["usuario"];
        $contra = $_GET["contra"];
        $conection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($conection, "dungeonrio");

        $jugador = "SELECT ID FROM jugador WHERE usuario = '$usuario';";
        $resultJugador = mysqli_query($conection,$jugador);
        if (mysqli_fetch_array($resultJugador)==null) {
            $sql = "INSERT INTO jugador(usuario,contraseña)
                    VALUES('$usuario','$contra');";
            mysqli_query($conection,$sql);
            echo "Jugador añadido";
        }else {
            echo "El jugador ya existe";
        }
        mysqli_free_result($resultJugador);
        mysqli_close($conection);
    }
?>
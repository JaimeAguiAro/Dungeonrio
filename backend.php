<?php
    // ini_set('display_errors', 1);
    function GetTopPersonajes($espec){
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $mazmorras = ["Reposo de los Reyes","Asalto a Boralus","Fuerte Libre","Altar de la Tormenta","Veta Madre","Catacumbas putrefactas"];

        $sql = "SELECT m.nombre,r.tiempo_empleado,r.puntuacion 
                FROM realiza AS r INNER JOIN mazmorra AS m ON r.ID_mazmorra = m.ID 
                WHERE r.ID_personaje = $pj ORDER BY m.ID;";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Mazmorra</th><th scope='col'>Tiempo Empleado</th><th scope='col'>Puntuacion</th></tr>";
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
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function getHermandadMiembros($hermandad){
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        $sql = "SELECT p.nombre,p.clase,p.especializacion,m.rango,p.puntuacion
                FROM miembro AS m 
                INNER JOIN personaje AS p ON m.ID_personaje = p.ID 
                INNER JOIN hermandad AS h ON m.ID_hermandad = h.ID 
                WHERE h.ID = $hermandad";
        $result = mysqli_query($conection,$sql);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr class='text-center'><th scope='col'>Nombre</th><th scope='col'>Clase</th><th scope='col'>Especialidad</th><th scope='col'>Rango</th><th scope='col'>Puntuacion</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='text-center'>";
            echo "<td scope='row'>".$row["nombre"]."</td>";
            echo "<td>".$row["clase"]."</td>";
            echo "<td>".$row["especializacion"]."</td>";
            echo "<td>".$row["rango"]."</td>";
            echo "<td>".$row["puntuacion"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($conection);
    }
    function isGM($idPj,$hermandadGM){
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        $sql = "SELECT p.nombre,j.VIP
                FROM miembro AS m 
                INNER JOIN personaje AS p ON m.ID_personaje = p.ID
                INNER JOIN jugador AS j ON p.ID_jugador = j.ID
                INNER JOIN hermandad AS h ON m.ID_hermandad = h.ID
                WHERE h.ID = $hermandadGM AND j.ID = $idPj AND m.rango = 'GM'";
        $result = mysqli_query($conection,$sql);
        $rowGM = mysqli_fetch_array($result);
        if ($rowGM != null && $rowGM[1] == 1) {
            mysqli_free_result($result);
            mysqli_close($conection);
            return true;
        }else {
            mysqli_free_result($result);
            mysqli_close($conection);
            return false;
        }
    }

    if (isset($_POST["descripcionhermandad"])) {
        $descripcionhermandad = $_POST["descripcionhermandad"];
        $descripcionIDhermandad = $_POST["IDDescripcion"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $sqlidescripcionhermandad = "UPDATE hermandad SET descripcion = '$descripcionhermandad' WHERE ID = '$descripcionIDhermandad';";
        mysqli_query($conection,$sqlidescripcionhermandad);
        mysqli_close($conection);
        echo "Descripcion actualizada";
    }

    if (isset($_GET["addHPjNombre"])) {
        $addHPjNombre = $_GET["addHPjNombre"];
        $addHPjIDHermandad = $_GET["addHPjIDHermandad"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        $sqlHAddPj = "SELECT ID FROM personaje WHERE nombre = '$addHPjNombre';";
        $resultHAddPj = mysqli_query($conection,$sqlHAddPj);
        $rowHAddPj = mysqli_fetch_array($resultHAddPj);
        if ($rowHAddPj != null) {
            $idPjAdd = $rowHAddPj[0];
            $sqlMiembro = "SELECT * FROM miembro WHERE ID_personaje = $idPjAdd;";
            $resultMiembro = mysqli_query($conection,$sqlMiembro);
            $rowMiembro = mysqli_fetch_array($resultMiembro);
            if ($rowMiembro == null) {
                $sql = "INSERT INTO miembro(ID_personaje,ID_hermandad,rango)
                    VALUES($idPjAdd,$addHPjIDHermandad,'miembro');";
                mysqli_query($conection,$sql);
                echo "Personaje añadido a la hermandad";
            }else {
                echo "El personaje ya pertenece a una hermandad";
            }
            mysqli_free_result($resultMiembro);
        }else {
            echo "El personaje no existe";
        }

        mysqli_free_result($resultHAddPj);
        mysqli_close($conection);
    }

    if (isset($_GET["buscar"])) {
        $nombre = $_GET["buscar"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $sql = "SELECT concat('1-', id) AS value ,nombre AS label FROM personaje WHERE nombre LIKE '$nombre%'
                UNION
                SELECT concat('2-', id) AS value ,nombre AS label FROM hermandad WHERE nombre LIKE '$nombre%'";
        $result = mysqli_query($conection,$sql);
        $respuesta = array();
        while ($row = mysqli_fetch_array($result)) {
            $respuesta[] = $row;
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
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        if ($nombrePj != "" && $clase != "" && $especializacion != "" && $jugador != "") {
            $sqlIdJugador = "SELECT ID FROM jugador WHERE usuario = '$jugador';";
            $resultIdJugador = mysqli_query($conection,$sqlIdJugador);
            $row = mysqli_fetch_array($resultIdJugador);
            if ($row != null) {
                $IdJugador = $row[0];
                mysqli_free_result($resultIdJugador);
                $sql = "INSERT INTO personaje(nombre, clase, especializacion,ID_jugador,favorito,puntuacion)
                        VALUES('$nombrePj','$clase','$especializacion',$IdJugador,FALSE,0);";
                if (mysqli_query($conection,$sql)) {
                    echo "Personaje añadido";
                } else {
                    echo "El personaje ya existe";
                }
            }else {
                echo "El jugador no existe";
            }
        }else {
            echo "Rellene todos los datos";
        }
        
        mysqli_close($conection);
    }
    
    if (isset($_GET["nombreHermandad"])) {
        $nombreHermandad = $_GET["nombreHermandad"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        $sqlHermandad = "SELECT ID FROM hermandad WHERE nombre = '$nombreHermandad';";
        $resultHermandad = mysqli_query($conection,$sqlHermandad);
        $rowhermandad = mysqli_fetch_array($resultHermandad);

        if ($rowhermandad == null) {
            if ($nombreHermandad != "") {
                $sql = "INSERT INTO hermandad(nombre,avance)
                    VALUES('$nombreHermandad',0);";
                mysqli_query($conection,$sql);
                mysqli_close($conection);
                echo "Hermandad añadida";
            }else {
                echo "Rellene todos los datos";
            }
        }else {
            echo "La hermandad ya existe";
        }
        
        
    }

    if (isset($_GET["nombreGrupo"])) {
        $nombreGrupo = $_GET["nombreGrupo"];
        $nombreTank = $_GET["nombreTank"];
        $nombrePrimerDPS = $_GET["nombrePrimerDPS"];
        $nombreSegundoDPS = $_GET["nombreSegundoDPS"];
        $nombreTercerDPS = $_GET["nombreTercerDPS"];
        $nombreHealer = $_GET["nombreHealer"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        if ($nombreGrupo != "" && $nombreTank != "" && $nombrePrimerDPS != "" && $nombreSegundoDPS != "" && $nombreTercerDPS != "" && $nombreHealer != "") {
            $sqlIdGrupo = "SELECT ID FROM grupo WHERE nombre = '$nombreGrupo';";
            $resultIdGrupo = mysqli_query($conection,$sqlIdGrupo);
            $rowgrupo = mysqli_fetch_array($resultIdGrupo);

            $sqlIdTank = "SELECT ID,puntuacion FROM personaje WHERE nombre = '$nombreTank';";
            $resultIdTank = mysqli_query($conection,$sqlIdTank);
            $rowTank = mysqli_fetch_array($resultIdTank);

            $sqlIdPrimerDPS = "SELECT ID,puntuacion FROM personaje WHERE nombre = '$nombrePrimerDPS';";
            $resultIdPrimerDPS = mysqli_query($conection,$sqlIdPrimerDPS);
            $rowPrimerDPS = mysqli_fetch_array($resultIdPrimerDPS);

            $sqlIdSegundoDPS = "SELECT ID,puntuacion FROM personaje WHERE nombre = '$nombreSegundoDPS';";
            $resultIdSegundoDPS = mysqli_query($conection,$sqlIdSegundoDPS);
            $rowSegundoDPS = mysqli_fetch_array($resultIdSegundoDPS);

            $sqlIdTercerDPS = "SELECT ID,puntuacion FROM personaje WHERE nombre = '$nombreTercerDPS';";
            $resultIdTercerDPS = mysqli_query($conection,$sqlIdTercerDPS);
            $rowTercerDPS = mysqli_fetch_array($resultIdTercerDPS);

            $sqlIdHealer = "SELECT ID,puntuacion FROM personaje WHERE nombre = '$nombreHealer';";
            $resultIdHealer = mysqli_query($conection,$sqlIdHealer);
            $rowHealer = mysqli_fetch_array($resultIdHealer);

            if ($rowgrupo == null) {
                $IdGrupo = $rowgrupo[0];
                if ($rowTank != null) {
                    $IdTank = $rowTank[0];
                    $puntuacionTank = $rowTank[1];
                    if ($rowPrimerDPS != null) {
                        $IdPrimerDPS = $rowPrimerDPS[0];
                        $puntuacionPrimerDPS = $rowPrimerDPS[1];
                        if ($rowSegundoDPS != null) {
                            $IdSegundoDPS = $rowSegundoDPS[0];
                            $puntuacionSegundoDPS = $rowSegundoDPS[1];
                            if ($rowTercerDPS != null) {
                                $IdTercerDPS = $rowTercerDPS[0];
                                $puntuacionTercerDPS = $rowTercerDPS[1];
                                if ($rowHealer != null) {
                                    $IdHealer = $rowHealer[0];
                                    $puntuacionHealer = $rowHealer[1];
                                    $sqlAñadirGrupo = "INSERT INTO grupo(nombre,puntuacion)
                                                        VALUES('$nombreGrupo',$puntuacionHealer+$puntuacionPrimerDPS+$puntuacionSegundoDPS+$puntuacionTercerDPS+$puntuacionHealer);";
                                    mysqli_query($conection,$sqlAñadirGrupo);

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
                                    echo "Grupo añadido";
                                }else {
                                    echo "El Healer no existe";
                                }
                            }else {
                                echo "El tercer DPS no existe";
                            }
                        }else {
                            echo "El segundo DPS no existe";
                        }
                    }else {
                        echo "El primer DPS no existe";
                    }
                }else {
                    echo "El tank no existe";
                }
            }else {
                echo "El grupo ya existe";
            }
            mysqli_free_result($resultIdPrimerDPS);
            mysqli_free_result($resultIdTank);
            mysqli_free_result($resultIdSegundoDPS);
            mysqli_free_result($resultIdTercerDPS);
            mysqli_free_result($resultIdHealer);
            mysqli_free_result($resultIdGrupo);
        }else {
            echo "Rellene todos los datos";
        }

        mysqli_close($conection);
    }

    if (isset($_GET["nombreMazmorra"])) {
        $nombreMazmorra = $_GET["nombreMazmorra"];
        $nombrePjRealizada = $_GET["nombrePjRealizada"];
        $tiempo = $_GET["tiempo"];
        $tiempoA = explode(":",$_GET["tiempo"]);
        $puntuacion = 100;
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $patternTiempo = "/^(?:1[012]|0[0-9]):[0-5][0-9]:[0-5][0-9]$/";
        
        if ($nombreMazmorra != "" && $nombrePjRealizada != "" && $tiempo != "") {
            if (preg_match($patternTiempo, $tiempo)) {
                $sqlIdPersonaje = "SELECT ID FROM personaje WHERE nombre = '$nombrePjRealizada';";
                $resultIdPersonaje = mysqli_query($conection,$sqlIdPersonaje);
                $rowIdPersonaje = mysqli_fetch_array($resultIdPersonaje);
                if ($rowIdPersonaje != null && ($tiempoA["0"] <= 60 && $tiempoA["0"] >= 0) && ($tiempoA["1"] <= 60 && $tiempoA["1"] >= 0) && ($tiempoA["2"] <= 60 && $tiempoA["2"] >= 0)) {
                    $IdPersonaje = $rowIdPersonaje[0];

                    $sqlIdMazmorra = "SELECT ID,tiempoMaximo FROM mazmorra WHERE nombre = '$nombreMazmorra';";
                    $resultIdMazmorra = mysqli_query($conection,$sqlIdMazmorra);
                    $rowMazmorra = mysqli_fetch_array($resultIdMazmorra);
                    $IdMazmorra = $rowMazmorra["ID"];
                    $TiempoMaximoMazmorra = $rowMazmorra["tiempoMaximo"];
                    $TiempoMaximoMazmorraA = explode(":",$rowMazmorra["tiempoMaximo"]);
                    mysqli_free_result($resultIdMazmorra);

                    $sqlPuntuacion = "SELECT puntuacion FROM realiza WHERE ID_mazmorra = '$IdMazmorra' AND ID_personaje = '$IdPersonaje';";
                    $resultPuntuacion = mysqli_query($conection,$sqlPuntuacion);
                    $rowRealiza = mysqli_fetch_array($resultPuntuacion);

                    $horas = $TiempoMaximoMazmorraA["0"] - $tiempoA["0"];
                    $minutos = $TiempoMaximoMazmorraA["1"] - $tiempoA["1"];
                    $segundos = $TiempoMaximoMazmorraA["2"] - $tiempoA["2"];
                    if ($horas < 0) {
                        $puntuacion = 0;
                    }else {
                        $puntuacion += $minutos + $segundos;
                    }
                    if ($rowRealiza==null) {
                        $sqlAñadirRealiza = "INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
                                            VALUES($IdPersonaje,$IdMazmorra,'$tiempo',$puntuacion);";
                        mysqli_query($conection,$sqlAñadirRealiza);
                        $sqlUpdatePuntuacion = "UPDATE personaje AS p SET p.puntuacion = p.puntuacion + $puntuacion WHERE ID = $IdPersonaje";
                        mysqli_query($conection,$sqlUpdatePuntuacion);
                        echo "Mazmorra añadida puntuacion:".$puntuacion;
                    }else {
                        $puntuacionActual = $rowRealiza["puntuacion"];
                        $diferencia = $puntuacion - $puntuacionActual;
                        if ($diferencia > 0) {
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
                }else {
                    echo "El personaje no existe";
                }
                mysqli_free_result($resultIdPersonaje);
                
            }else {
                echo "introduzca una hora adecuada";
            }
        }else {
            echo "Rellene todos los campos";
        }
        mysqli_close($conection);
    }

    if (isset($_GET["hermandadProgreso"])) {
        $hermandadProgreso = $_GET["hermandadProgreso"];
        $jefe = $_GET["jefe"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");

        $hermandad = "SELECT ID FROM hermandad WHERE nombre = '$hermandadProgreso';";
        $resultIDHermandad = mysqli_query($conection,$hermandad);
        $rowHermandad = mysqli_fetch_array($resultIDHermandad)[0];
        if ($rowHermandad != null) {
            $IDHermandad = $rowHermandad[0];
            $progreso = "SELECT * FROM progreso WHERE ID_hermandad = $IDHermandad AND jefeMatado = $jefe;";
            $resultProgreso = mysqli_query($conection,$progreso);
            if (mysqli_fetch_array($resultProgreso)==null) {
                $sqlProgreso = "INSERT INTO progreso(ID_hermandad,jefeMatado)
                        VALUES('$IDHermandad','$jefe');";
                mysqli_query($conection,$sqlProgreso);
                $sqlUpdateHermandad = "UPDATE hermandad AS h SET h.avance = h.avance + 1 WHERE ID = $IDHermandad";
                mysqli_query($conection,$sqlUpdateHermandad);
                echo "Progreso añadido";
            }else {
                echo $hermandadProgreso." ya ha matado al jefe: ".$jefe;
            }
            mysqli_free_result($resultProgreso);
        }else {
            echo "La hermandad no existe";
        }
        mysqli_free_result($resultIDHermandad);
        mysqli_close($conection);
    }

    if (isset($_GET["usuario"])) {
        $usuario = $_GET["usuario"];
        $contra = $_GET["contra"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
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
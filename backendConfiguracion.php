<?php

function getDescripconPj($id){
    $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
    mysqli_select_db($conection, "dungeonrio");

    $sqlDescripcionPj = "SELECT descripcion FROM jugador WHERE ID = $id;";
    $resultDescripcionPj = mysqli_query($conection,$sqlDescripcionPj);
    $rowDescripcionPj = mysqli_fetch_array($resultDescripcionPj);
    mysqli_free_result($resultDescripcionPj);
    echo $rowDescripcionPj[0];
}
function getPJJugador($id){
    $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
    mysqli_select_db($conection, "dungeonrio");

    $sqlPjsJugador = "SELECT p.ID, p.nombre, p.favorito FROM personaje AS p INNER JOIN jugador AS j ON p.ID_jugador = j.ID WHERE j.ID = $id;";
    $resultPjsJugador = mysqli_query($conection,$sqlPjsJugador);
    if (mysqli_num_rows($resultPjsJugador) != 0) {
        while ($rowPjsJugador = mysqli_fetch_array($resultPjsJugador)) {
            echo "<div class='form-check'>
                    <input class='form-check-input' type='radio' name='personajeFavorito' value='$rowPjsJugador[0]' id='$rowPjsJugador[1]' ".($rowPjsJugador[2] ? "checked" : "").">
                    <label class='form-check-label' for='$rowPjsJugador[1]'>
                        $rowPjsJugador[1]
                    </label>
                </div>";
        }
        echo "<br><button onclick='actualizarFavorito()' class='btn btn-dark'>Actualizar personaje favorito</button>";
    }else {
            echo "No tienes ningun personaje";
    }
    mysqli_free_result($resultPjsJugador);
}

if (isset($_POST["personajeFavorito"])) {
    $pjFavorito = $_POST["personajeFavorito"];
    $idJugadorFavorito = $_POST["idJugadorFavorito"];
    $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
    mysqli_select_db($conection, "dungeonrio");

    $sqlPjFavoritoJugador = "SELECT p.ID FROM personaje AS p INNER JOIN jugador AS j ON p.ID_jugador = j.ID WHERE j.ID = $idJugadorFavorito AND p.favorito = true;";
    $resultPjFavoritoJugador = mysqli_query($conection,$sqlPjFavoritoJugador);
    $favoritoActual = mysqli_fetch_array($resultPjFavoritoJugador)[0];
    
    $sqlUpdateFavoritoActual = "UPDATE personaje SET favorito = false WHERE ID = $favoritoActual;";
    mysqli_query($conection,$sqlUpdateFavoritoActual);
    $sqlUpdateFavoritoNuevo = "UPDATE personaje SET favorito = TRUE WHERE ID = $pjFavorito;";
    mysqli_query($conection,$sqlUpdateFavoritoNuevo);
    mysqli_close($conection);
    echo "Personaje Favorito Actualizado";
}
if (isset($_POST["idJugadorVIP"])) {
    $idJugadorVIP = $_POST["idJugadorVIP"];
    $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
    mysqli_select_db($conection, "dungeonrio");
    $sqlUpdateJugador = "UPDATE jugador SET VIP = TRUE WHERE ID = $idJugadorVIP;";
    mysqli_query($conection,$sqlUpdateJugador);
    mysqli_close($conection);
    echo "Felicidades, ya eres VIP!!";
}

if (isset($_POST["datos"])) {
    if ($_POST["nombre"] != "") {
        $nombre = $_POST["nombre"];
        $jugador = $_POST["datos"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $sqlUpdateJugador = "UPDATE jugador SET usuario = '$nombre' WHERE ID = $jugador;";
        mysqli_query($conection,$sqlUpdateJugador);
        mysqli_close($conection);
        session_start();
        $_SESSION["user"] = $nombre;
    }
    if ($_POST["descripcion"] != "") {
        $descripcion = $_POST["descripcion"];
        $jugador = $_POST["datos"];
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $sqlUpdateJugador = "UPDATE jugador SET descripcion = '$descripcion' WHERE ID = $jugador;";
        mysqli_query($conection,$sqlUpdateJugador);
        mysqli_close($conection);
    }
    echo "<meta http-equiv='refresh' content='0; url=https://dungeonrio.azurewebsites.net/configuracion.php'";
}else if(isset($_POST["contra"])){
    $pass = $_POST["pass"];
    $passConfirmar = $_POST["passConfirmar"];
    $jugador = $_POST["contra"];
    if ($pass == $passConfirmar) {
        echo "entro";
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $sqlUpdateJugadorPass = "UPDATE jugador SET contraseña = '$pass' WHERE ID = $jugador;";
        mysqli_query($conection,$sqlUpdateJugadorPass);
        mysqli_close($conection);
    }else {
        session_start();
        $_SESSION["error"] = "Las contraseñas no coinciden";
    }
    echo "<meta http-equiv='refresh' content='0; url=https://dungeonrio.azurewebsites.net/configuracion.php'";
}

?>
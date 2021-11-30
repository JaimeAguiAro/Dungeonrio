<?php

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
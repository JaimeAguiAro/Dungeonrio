<?php

if (isset($_POST["contra"])) {
    echo $_POST["pass"];
    echo $_POST["passConfirmar"];
}else if(isset($_POST["datos"])){
    echo $_POST["nombre"];
    echo $_POST["descripcion"];
}

?>
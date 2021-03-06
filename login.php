<?php 
    // ini_set('display_errors', 1);
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="estilos/login.css">
    <?php
        $error = false;
        if (isset($_POST["login"])) {
            $loged = false;
            $user = $_POST["user"];
            $contra = $_POST["contra"];
            $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
            mysqli_select_db($conection, "dungeonrio");
            $sql = "SELECT * FROM jugador 
                    WHERE usuario = '$user' AND contraseña = '$contra'";
            $result = mysqli_query($conection,$sql);
            if (mysqli_num_rows($result)==1) {
                $loged = true;
                $row = mysqli_fetch_array($result);
                $id = $row["ID"];
                if ($row["usuario"] == "Admin") {
                    $_SESSION["admin"] = true;
                }else {
                    unset($_SESSION["admin"]);
                }
            }else {
                $error = true;
            }
            if ($loged) {  
                mysqli_free_result($result);
                mysqli_close($conection);
                $_SESSION['user'] = $row["usuario"];
                $_SESSION['id'] = $id;
                echo "<meta http-equiv='refresh' content='0; url=https://dungeonrio.azurewebsites.net/index.php'";
            }else {
                mysqli_free_result($result);
                mysqli_close($conection);
            }
        }
    ?>
</head>
<body>
    <form class="box" action="login.php" method="post">
        <h1><a href="index.php">
                    <img src="img/logo.png" alt="logo" width="30" height="30">
                    Dungeonrio
                </a></h1>
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="contra" placeholder="Contraseña">
        <input type="submit" value="Login" name="login">
        <?php
        if ($error) {
            echo '<p id="error" style="color: red;">El Usuario o la Contraseña son incorrectos</p>';
        }
        ?>
    </form>
</body>
</html>
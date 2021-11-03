<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="estilos/login.css">
</head>
<body>
    <form class="box" action="index.php" method="post">
        <h1><a href="index.php">
                    <img src="img/logo.png" alt="logo" width="30" height="30">
                    Dungeonrio
                </a></h1>
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="contra" placeholder="Contraseña">
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>
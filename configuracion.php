<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="estilos/comun.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="bg-secondary">
    <?php
        include "backendConfiguracion.php";
        session_start();
        include "header.php";
    ?>
    <main class="container mt-5 mb-3">
        <div class="bg-light p-5 shadow">
            <div class="container" style="min-width: 50%;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Jugador</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Personaje Favorito</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="border p-3 bg-body">
                            <?php 
                                if (isset($_SESSION["error"])) {
                                    echo '<p class="text-danger border border-danger p-2">'.$_SESSION["error"].'</p>';
                                    unset($_SESSION["error"]);
                                }
                            ?>
                            <form method="POST" action="backendConfiguracion.php">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php  echo $_SESSION["user"] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="descripcion">Descripcion</label><br>
                                    <textarea class="form-cotrol" id="descripcion" name="descripcion" placeholder="Leave a comment here" style="resize: none; height: 150px;min-width: 50%;"></textarea>
                                </div>
                                <button type="submit" name="datos" value="<?php echo $_SESSION["id"] ?>" class="btn btn-primary">Actualizar</button>
                            </form>
                            <p class="m-4">
                                <a class="btn btn-dark" data-bs-toggle="collapse" href="#contraseñaCollapse" role="button" aria-expanded="false" aria-controls="contraseñaCollapse">Cambiar Contraseña</a>
                            </p>
                            <div class="collapse" id="contraseñaCollapse">
                                <div class="card card-body" style="min-width: 50%;">
                                    <form action="backendConfiguracion.php" method="POST">
                                        <div class="mb-3">
                                            <label for="pass" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" name="pass" id="pass">
                                        </div>
                                        <div class="mb-3">
                                            <label for="passConfirmar" class="form-label">Confirmar Contraseña</label>
                                            <input type="password" class="form-control" id="passConfirmar" name="passConfirmar">
                                        </div>
                                        <button type="submit" name="contra" value="<?php echo $_SESSION["id"] ?>" class="btn btn-dark">Cambiar Contraseña</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="border p-3 bg-body">
                            <div class="alert alert-warning" role="alert">
                                Adquiera una version mejor para poder modificar su personaje favorito
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>
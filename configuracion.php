<?php 
    ini_set('display_errors', 1);
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
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php  echo $_SESSION["user"] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="descripcion">Descripcion</label><br>
                                <textarea class="form-cotrol" id="descripcion" name="descripcion" placeholder="<?php getDescripconPj($_SESSION["id"]); ?>" style="resize: none; height: 150px;min-width: 50%;"></textarea>
                            </div>
                            <button onclick="actualizarDatos()" class="btn btn-primary">Actualizar</button>
                            <p class="m-4">
                                <a class="btn btn-dark" data-bs-toggle="collapse" href="#contraseñaCollapse" role="button" aria-expanded="false" aria-controls="contraseñaCollapse">Cambiar Contraseña</a>
                            </p>
                            <div class="collapse" id="contraseñaCollapse">
                                <div class="card card-body" style="width: 80%;">
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="pass" id="pass">
                                    </div>
                                    <div class="mb-3">
                                        <label for="passConfirmar" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="passConfirmar" name="passConfirmar">
                                    </div>
                                    <button onclick="actualizarPass()" class="btn btn-dark">Cambiar Contraseña</button>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function actualizarDatos(){
                                var idJugador = <?php echo $_SESSION["id"] ?>;
                                var nombre = document.getElementById("nombre").value;
                                var descripcion = document.getElementById("descripcion").value;
                                $.ajax({
                                    type: "POST",
                                    url: 'backendConfiguracion.php',
                                    data: {idJugador:idJugador,nombre:nombre,descripcion:descripcion},
                                    success: function(res)
                                    {
                                        location.reload();
                                        alert(res);
                                    }
                                });
                            }
                            function actualizarPass(){
                                var idJugadorPass = <?php echo $_SESSION["id"] ?>;
                                var pass = document.getElementById("pass").value;
                                var passConfirmar = document.getElementById("passConfirmar").value;
                                $.ajax({
                                    type: "POST",
                                    url: 'backendConfiguracion.php',
                                    data: {idJugadorPass:idJugadorPass,pass:pass,passConfirmar:passConfirmar},
                                    success: function(res)
                                    {
                                        location.reload();
                                        alert(res);
                                    }
                                });
                            }
                        </script> 
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="border p-3 bg-body">
                            <?php

                            $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
                            mysqli_select_db($conection, "dungeonrio");
                    
                            $sqlVIP = "SELECT VIP FROM jugador WHERE ID = ".$_SESSION['id'].";";
                            $resultVIP = mysqli_query($conection,$sqlVIP);
                            $rowVIP = mysqli_fetch_array($resultVIP);

                            if ($rowVIP[0] == 1) {
                                getPJJugador($_SESSION['id']);
                            }else {
                                ?>
                                <div class='alert alert-warning' role='alert'>Adquiera una version mejor para poder modificar su personaje favorito</div>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#hacerteVIP">Hacerse VIP</button>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
    <div class="modal fade" tabindex="-1" aria-labelledby="hacerteVIPLabel" aria-hidden="true" id="hacerteVIP">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hacerteVIPLabel">Hacerse VIP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p class="alert alert-warning">Al hacerte VIP por 5€ disfrutaras de varias ventajas, como poder elejir tu personaje favorito para que el resto lo vea o poder administrar tu hermandad</p>
                        <button class="btn btn-primary" onclick="hacerseVIP()">Hacerme VIP</button>
                        <script type="text/javascript">
                            function hacerseVIP(){
                                var idJugadorVIP = <?php echo $_SESSION["id"] ?>;
                                $.ajax({
                                    type: "POST",
                                    url: 'backendConfiguracion.php',
                                    data: {idJugadorVIP:idJugadorVIP},
                                    success: function(res)
                                    {
                                        location.reload();
                                        alert(res);
                                    }
                                });
                            }
                        </script>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function actualizarFavorito(){
            var personajeFavorito = $("input[type='radio'][name='personajeFavorito']:checked").val();
            var idJugadorFavorito = <?php echo $_SESSION["id"] ?>;
            $.ajax({
                type: "POST",
                url: 'backendConfiguracion.php',
                data: {personajeFavorito:personajeFavorito,idJugadorFavorito:idJugadorFavorito},
                success: function(res)
                {
                    location.reload();
                    alert(res);
                }
            });
        }
    </script>
</body>
</html>
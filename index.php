<?php 
    // ini_set('display_errors', 1);
    if (isset($_POST["cerrarSesion"])) {
        session_destroy();
        unset($_POST["cerrarSesion"]);
    }
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
    <title>Pagina Inicial</title>
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class=" bg-secondary">
    <?php
        include "backend.php";
        include "header.php";
    ?>
    <main class="container mt-5 mb-3">
        <div class="container bg-light p-5 shadow">
            <div class="row border-bottom pb-5">
                <div class="col-md">
                    <div class="card shadow">
                        <h1 class="card-header">DPS</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetTopPersonajes("DPS");
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card shadow">
                        <h1 class="card-header">Tanks</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetTopPersonajes("Tank");
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card shadow">
                        <h1 class="card-header">Healers</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetTopPersonajes("Healer");
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 border-bottom pb-5">
                <div class="col">
                    <div class="card shadow">
                        <h1 class="card-header">Hermandades</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetTopHermandades();
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow">
                        <h1 class="card-header">Grupos</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetTopGrupos();
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    <div class="card shadow">
                        <h1 class="card-header">Progreso de Hermandades</h1>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <?php
                            GetHermandadesProgreso()
                            ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <p>Pagina Realizada por Jaime Aguilar Aroca</p>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </footer>
</body>
</html>
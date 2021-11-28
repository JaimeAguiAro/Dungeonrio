<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas Datos</title>
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
        session_start();
        if (!isset($_SESSION["admin"])) {
            header("Location: index.php");
            die();
        }
        include "header.php";
    ?>
    <main class="container mt-5 mb-3">
        <div class="container bg-light p-5 shadow">
            <div class="row align-items-center" id="add">
                <div class="col">
                    <div class="card text-center shadow">
                        <div class="card-header">
                            <h5 class="card-title">Añadir Registros</h5>
                        </div>
                        <div class="row p-5">
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Personaje</h5>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPersonaje">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Hermandad</h5>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHermandad">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Grupo</h5>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGrupo">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-5">
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Mazmorra Realizada</h5>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRealizada">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Progreso</h5>
                                        </div>
                                        <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProgreso">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h5 class="card-title">Añadir Jugador</h5>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJugador">
                                                AÑADIR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
        include "modales.html";
    ?>
</body>
</html>
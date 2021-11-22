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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#ranking').DataTable();
        } );
    </script>
</head>
<body class="bg-secondary">
    <?php
        include "backend.php";
        session_start();
        include "header.php";
    ?>
    <main class="container mt-5 mb-3">
        <div class="bg-light p-5 shadow">
            <div class="row">
                <div class="row bg-dark p-2 col-8 h-50">
                    <div class="col-2">
                        <img class="img-thumbnail" src="img/logoHermandad.jpg" alt="fotoHermandad">
                    </div>
                    <div class="col row m-2">
                        <p class="d-flex align-items-center col row text-center">
                            <span class="border bg-light p-2 fw-bold col m-2">La Cruzada Escarlata</span>
                            <span class="border bg-light p-2 fw-bold col m-2">10</span>
                        </p>
                        
                    </div>
                </div>
                <div class="col border bg-light p-2" style="min-height: 400px;">
                    <p class="col border bg-secondary fw-bold p-2 text-light">Descripcion</p>
                    <span>
                        Esta hermandad esta reunidad en la posada despues de raid, mañana escribiran una
                    </span>
                </div>
            </div>
            <div class="card shadow mt-4">
                <h1 class="card-header">Miembros</h1>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <?php
                    getHermandadMiembros("La Cruzada Escarlata");
                    ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>
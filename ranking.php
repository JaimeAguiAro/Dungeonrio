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
    <title>Ranking</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="estilos/comun.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#ranking").DataTable({
                "ajax": "backendRanking.php",
                "method": "POST",
                "columns": [
                    { "data": "puesto" },
                    { "data": "nombre" },
                    { "data": "clase" },
                    { "data": "puntuacion" }
                ],
                "ordering": false,
                "bAutoWidth": false,
                "oLanguage": { 
                    "sUrl": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" 
                }
            });
        });
    </script>
</head>
<body class="bg-secondary">
    <?php
        include "header.php";
    ?>
    <main class="container mt-5 mb-3">
        <div class="container bg-light p-5 shadow">
                <table id="ranking" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Puesto</th>
                            <th>Nombre</th>
                            <th>Clase</th>
                            <th>Puntuacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>
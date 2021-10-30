<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php
    include "backend.php";
?>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <header class="container">
        <h1>Dungeonrio</h1>
    </header>
    <body class="container">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="card">
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
            </div>
        </div>
    <?php
        GetTopPersonajes("DPS");
        GetTopPersonajes("Healer");
        GetTopGrupos();
        GetTopHermandades();
    ?>
    </body>
    <footer>

    </footer>
</body>
</html>
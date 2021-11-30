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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="bg-secondary">
    <?php
        include "backend.php";
        include "header.php";
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $id = $_POST['id'];
        $sql = "SELECT * FROM personaje WHERE ID = $id;";
        $result = mysqli_query($conection,$sql);
        $row = mysqli_fetch_array($result);
        mysqli_free_result($result);
        $id = $row['ID_jugador'];
        $sqljugador = "SELECT descripcion FROM jugador WHERE ID = $id;";
        $resultjugador = mysqli_query($conection,$sqljugador);
        $rowjugador = mysqli_fetch_array($resultjugador);
        $descripcion = $rowjugador[0];
        mysqli_free_result($resultjugador);
        mysqli_close($conection);
    ?>
    <main class="container mt-5 mb-3">
        <div class="bg-light p-5 shadow">
            <div class="row">
                <div class="row bg-dark p-2 col-8 h-50">
                    <div class="col-2">
                        <img class="img-thumbnail" src="img/fotoPersonaje.png" alt="fotoPersonaje">
                    </div>
                    <div class="col row m-2">
                        <p class="d-flex align-items-center col row text-center">
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["nombre"]; ?></span>
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["clase"]; ?></span>
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["especializacion"]; ?></span>
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["puntuacion"]; ?></span>
                        </p>
                        
                    </div>
                </div>
                <div class="col border bg-light p-2" style="min-height: 400px;">
                    <p class="col border bg-secondary fw-bold p-2 text-light">Descripcion</p>
                    <span>
                    <?php 
                        
                        if ($rowjugador["descripcion"] != null) {
                            echo $descripcion; 
                        }else {
                            echo "Este Jugador lo ha hecho tan bien en la anterior mazmorra que lo han invitado a la siguiente, luego volvera para poner una descripcion";
                        }
                        
                    ?>
                    </span>
                </div>
            </div>
            <div class="card shadow mt-4">
                <h1 class="card-header">Mazmorras Realizadas</h1>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <?php
                    getPersonajeMazmorras($row["ID"]);
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
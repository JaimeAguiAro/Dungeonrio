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
</head>
<body class="bg-secondary">
    <?php
        include "backend.php";
        include "header.php";
        $conection = mysqli_connect('37.35.210.48', 'dungeonrio', '1qaz2WSX');
        mysqli_select_db($conection, "dungeonrio");
        $id = $_POST['id'];
        $sql = "SELECT * FROM hermandad WHERE ID = $id;";
        $result = mysqli_query($conection,$sql);
        $row = mysqli_fetch_array($result);
        mysqli_free_result($result);
        mysqli_close($conection);
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
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["nombre"]; ?></span>
                            <span class="border bg-light p-2 fw-bold col m-2"><?php echo $row["avance"]; ?></span>
                        </p>
                        
                    </div>
                </div>
                <div class="col border bg-light p-2" style="min-height: 400px;">
                    <p class="col border bg-secondary fw-bold p-2 text-light">Descripcion</p>
                    <span>
                        <?php 
                        
                        if ($row["descripcion"] != null) {
                            echo $row["descripcion"]; 
                        }else {
                            echo "Esta hermandad esta reunidad en la posada despues de raid, mañana escribiran una Descripcion";
                        }
                        
                        ?>
                    </span>
                </div>
            </div>
            <div class="card shadow mt-4">
                <h1 class="card-header">Miembros</h1>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <?php
                    getHermandadMiembros($row["ID"]);
                    ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
    <div class="modal fade" tabindex="-1" aria-labelledby="hermandadGMModalLabel" aria-hidden="true" id="HermandadGM">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hermandadGMModalLabel">Administrar Hermandad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripcion</label><br>
                    <textarea class="form-cotrol" id="descripcion" name="descripcion" value=<?php echo '"'.$row["descripcion"].'"'; ?> style="resize: none; height: 150px;min-width: 50%;"></textarea>
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
                    <script type="text/javascript">
                        function HermandadDescripcion(){
                            var descripcionhermandad = document.getElementById("descripcionhermandad").value;
                            $.ajax({
                                type: "GET",
                                url: 'backend.php',
                                data: {descripcionhermandad:descripcionhermandad},
                                success: function(res)
                                {
                                    alert(res);
                                }
                            });
                        }
                        function HermandadAddPj(){
                            var descripcionhermandad = document.getElementById("descripcionhermandad").value;
                            var descripcionhermandad = document.getElementById("descripcionhermandad").value;
                            $.ajax({
                                type: "GET",
                                url: 'backend.php',
                                data: {descripcionhermandad:descripcionhermandad},
                                success: function(res)
                                {
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
</body>
</html>
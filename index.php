<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php
    include "backend.php";
    session_start();
?>
<body class=" bg-secondary">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function busqueda(){
            var busquedatxt = document.getElementById("busqueda").value;
            alert(busquedatxt);
            // $.ajax({
            //     type: "POST",
            //     url: 'backend.php',
            //     data: $(this).serialize(),
            //     success: function(response)
            //     {
            //         var jsonData = JSON.parse(response);

            //         // user is logged in successfully in the back-end
            //         // let's redirect
            //         if (jsonData.success == "1")
            //         {
            //             location.href = 'my_profile.php';
            //         }
            //         else
            //         {
            //             alert('Invalid Credentials!');
            //         }
            //     }
            // });
        }
        // var busqueda = document.getElementById("busqueda");
        // busqueda.addEventListener("keypress", alert("Hello! I am an alert box!!"));
        // $("#busqueda").addEventListener("keypress", function(){
        //     alert("Hello! I am an alert box!!");
            // $.ajax({
            //     type: "POST",
            //     url: 'backend.php',
            //     data: $(this).serialize(),
            //     success: function(response)
            //     {
            //         var jsonData = JSON.parse(response);

            //         // user is logged in successfully in the back-end
            //         // let's redirect
            //         if (jsonData.success == "1")
            //         {
            //             location.href = 'my_profile.php';
            //         }
            //         else
            //         {
            //             alert('Invalid Credentials!');
            //         }
            //     }
            // });
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <!--<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">-->
            <div class="container-fluid">
                <a class="navbar-brand p-2" href="#">
                    <img src="img/logo.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">
                    Dungeonrio
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="#">Link</a>
                    </li>
                </ul>
                <input style="width: 270px;" type="text" list="datalistOptions" onkeypress="busqueda()" id="busqueda" placeholder="Buscar Personaje o hermandad">
                <datalist id="datalistOptions">
                   <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                        
                </datalist>
                <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        echo "<div class='dropstart ps-2'>";
                        echo "<button type='button' class='btn btn-secondary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>$user</button>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='#'>Action</a></li>
                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                            <li><hr class='dropdown-divider'></li>
                            <li><a class='dropdown-item' href='#'>Something else here</a></li>
                        </ul>";
                        echo "</div>";
                    }
                ?>
                <?php
                    if (!isset($_SESSION['user'])) {
                        echo "<a class='m-1 btn btn-dark' href='login.php'>Login</a>";
                    }
                ?>
                </div>
            </div>
        <!--</nav>-->
    </header>
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
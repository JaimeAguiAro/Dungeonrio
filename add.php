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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body class=" bg-secondary">
    <?php
        session_start();
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
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
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
    ?>
    <div class="modal fade" tabindex="-1" aria-labelledby="personajeModalLabel" aria-hidden="true" id="addPersonaje">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="personajeModalLabel">Añadir Personaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombrePj" class="col-form-label">Nombre:</label>
                        <input type="text" id="nombrePj" name="nombrePj" class="form-control">
                        <label for="clasePj" class="col-form-label">Clase:</label>
                        <select class="form-select" id="clasePj" name="clasePj">
                            <option selected hidden></option>
                            <option value="Paladin">Paladin</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Cazador">Cazador</option>
                            <option value="Picaro">Picaro</option>
                            <option value="Sacerdote">Sacerdote</option>
                            <option value="Chaman">Chaman</option>
                            <option value="Mago">Mago</option>
                            <option value="Brujo">Brujo</option>
                            <option value="Monje">Monje</option>
                            <option value="Druida">Druida</option>
                            <option value="Caballero de la Muerte">Caballero de la Muerte</option>
                        </select>
                        <label for="especializacionPj" class="col-form-label">Especializacion:</label>
                        <select class="form-select" id="especializacionPj" name="especializacionPj">
                            <option selected hidden></option>
                            <option value="Tank">Tank</option>
                            <option value="DPS">DPS</option>
                            <option value="Healer">Healer</option>
                        </select>
                        <label for="jugadorPj" class="col-form-label">Jugador:</label>
                        <input type="text" name="jugadorPj" id="jugadorPj" class="form-control" placeholder="Nombre del Jugador">
                        <button class="btn btn-primary mt-2" onclick="añadirPj()">Añadir</button>
                        <script type="text/javascript">
                            function añadirPj(){
                                var nombrePj = document.getElementById("nombrePj").value;
                                var clasePj = document.getElementById("clasePj").value;
                                var especializacionPj = document.getElementById("especializacionPj").value;
                                var jugadorPj = document.getElementById("jugadorPj").value;
                                $.ajax({
                                    type: "GET",
                                    url: 'backend.php',
                                    data: {nombrePj:nombrePj,
                                            clasePj:clasePj,
                                            especializacionPj:especializacionPj,
                                            jugadorPj:jugadorPj},
                                    success: function()
                                    {
                                        alert("Personaje añadido");
                                        // var jsonData = JSON.parse(response);
                                        // var options;
                                        // jsonData.forEach(res => {
                                        //     options += "<option value=" + res.nombre + ">" + res.nombre + "</option>";
                                        // });
                                        // document.getElementById("opciones").innerHTML = options;
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                                        alert("Status: " + textStatus);
                                        alert("Error: " + errorThrown); 
                                    }
                                });
                            }
                        </script>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" aria-labelledby="hermandadModalLabel" aria-hidden="true" id="addHermandad">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hermandadModalLabel">Añadir Hermandad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreHermandad" class="col-form-label">Nombre:</label>
                        <input type="text" id="nombreHermandad" name="nombreHermandad" class="form-control">
                        <button class="btn btn-primary mt-2" onclick="añadirHermandad()">Añadir</button>
                        <script type="text/javascript">
                            function añadirHermandad(){
                                var nombreHermandad = document.getElementById("nombreHermandad").value;
                                $.ajax({
                                    type: "GET",
                                    url: 'backend.php',
                                    data: {nombreHermandad:nombreHermandad},
                                    success: function()
                                    {
                                        alert("Hermandad añadido");
                                        // var jsonData = JSON.parse(response);
                                        // var options;
                                        // jsonData.forEach(res => {
                                        //     options += "<option value=" + res.nombre + ">" + res.nombre + "</option>";
                                        // });
                                        // document.getElementById("opciones").innerHTML = options;
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                                        alert("Status: " + textStatus);
                                        alert("Error: " + errorThrown); 
                                    }
                                });
                            }
                        </script>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" aria-labelledby="grupoModalLabel" aria-hidden="true" id="addGrupo">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="grupoModalLabel">Añadir Grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreGrupo" class="col-form-label">Nombre:</label>
                        <input type="text" id="nombreGrupo" name="nombreGrupo" class="form-control">
                        <label for="nombreTank" class="col-form-label">Nombre Tank:</label>
                        <input type="text" id="nombreTank" name="nombreTank" class="form-control">
                        <label for="nombrePrimerDPS" class="col-form-label">Nombre Primer DPS:</label>
                        <input type="text" id="nombrePrimerDPS" name="nombrePrimerDPS" class="form-control">
                        <label for="nombreSegundoDPS" class="col-form-label">Nombre Segundo DPS:</label>
                        <input type="text" id="nombreSegundoDPS" name="nombreSegundoDPS" class="form-control">
                        <label for="nombreTercerDPS" class="col-form-label">Nombre Tercer DPS:</label>
                        <input type="text" id="nombreTercerDPS" name="nombreTercerDPS" class="form-control">
                        <label for="nombreHealer" class="col-form-label">Nombre Healer:</label>
                        <input type="text" id="nombreHealer" name="nombreHealer" class="form-control">
                        <button class="btn btn-primary mt-2" onclick="añadirGrupo()">Añadir</button>
                        <script type="text/javascript">
                            function añadirGrupo(){
                                var nombreGrupo = document.getElementById("nombreGrupo").value;
                                var nombreTank = document.getElementById("nombreTank").value;
                                var nombrePrimerDPS = document.getElementById("nombrePrimerDPS").value;
                                var nombreSegundoDPS = document.getElementById("nombreSegundoDPS").value;
                                var nombreTercerDPS = document.getElementById("nombreTercerDPS").value;
                                var nombreHealer = document.getElementById("nombreHealer").value;
                                $.ajax({
                                    type: "GET",
                                    url: 'backend.php',
                                    data: {nombreGrupo:nombreGrupo,
                                            nombreTank:nombreTank,
                                            nombrePrimerDPS:nombrePrimerDPS,
                                            nombreSegundoDPS:nombreSegundoDPS,
                                            nombreTercerDPS:nombreTercerDPS,
                                            nombreHealer:nombreHealer},
                                    success: function()
                                    {
                                        alert("Grupo añadido");
                                        // var jsonData = JSON.parse(response);
                                        // var options;
                                        // jsonData.forEach(res => {
                                        //     options += "<option value=" + res.nombre + ">" + res.nombre + "</option>";
                                        // });
                                        // document.getElementById("opciones").innerHTML = options;
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                                        alert("Status: " + textStatus);
                                        alert("Error: " + errorThrown); 
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
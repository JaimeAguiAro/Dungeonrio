<script type="text/javascript">
    $(document).ready(function(){
        $("#cerrarSesion").on("click", function(){
            var form = $('<form action="index.php" method="post">' +
                        '<input type="text" name="cerrarSesion" value="cerrar" />' +
                        '</form>');
            $('body').append(form);
            form.submit();
        });
        $("#busqueda").autocomplete({
            source:function(request,response){
                $.ajax({
                    url: "backend.php",
                    type:"GET",
                    dataType:"json",
                    data:{
                        buscar: request.term
                    },                    
                    success:function(data){
                        response(data)
                    }
                });
            }
        });
        $("#busqueda").on('autocompleteselect', function (e, ui) {
            e.preventDefault();
            switch (ui.item.value.split("-")[0]) {
                case "1":
                    var form = $('<form action="personaje.php" method="post">' +
                        '<input type="text" name="id" value="' + ui.item.value.split("-")[1] + '" />' +
                        '</form>');
                    $('body').append(form);
                    form.submit();
                break;
                case "2":
                    var form = $('<form action="hermandad.php" method="post">' +
                        '<input type="text" name="idHermandad" value="' + ui.item.value.split("-")[1] + '" />' +
                        '</form>');
                    $('body').append(form);
                    form.submit();
                break;
            }
        }).change();
    });
    $(document).ready(function(){
        dropdown();
    });
    $( window ).resize(function() {
        dropdown();
    });
    function dropdown(){
        if ($( window ).width() <= 992) {
            $("#userLog").removeClass("dropstart");
            $("#userLog").addClass("dropdown");
        }else{
            $("#userLog").removeClass("dropdown");
            $("#userLog").addClass("dropstart");
        }
    }
</script>  
<header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand p-2" href="index.php">
            <img src="img/logo.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">
            Dungeonrio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="ranking.php">Ranking</a>
                </li>
            <?php
            if (isset($_SESSION["admin"])) {
            ?>
                <li class="nav-item">
                <a class="nav-link active" href="add.php">Añadir</a>
                </li>
            <?php 

            } 
            if (isset($_POST['idHermandad']) && isset($_SESSION['id'])) {
                if (isGM($_SESSION['id'],$_POST['idHermandad'])) {
                    ?>
                        <li class="nav-item">
                        <a class="nav-link active" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#HermandadGM">Administrar Hermandad</a>
                        </li>
                    <?php 
                }
            } 
            ?>
        </ul>
        <input style="width: 270px;" class="form-control" type="text" id="busqueda" placeholder="Buscar Personaje o hermandad">
        <?php
            if (isset($_SESSION['user'])) {
                echo "<div id='userLog' class='dropstart ps-2'>";
                echo "<button type='button' class='btn btn-secondary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>".$_SESSION['user']."</button>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='configuracion.php'>Configuracion</a></li>
                            <li><hr class='dropdown-divider'></li>
                            <li><a class='dropdown-item' id='cerrarSesion' style='cursor: pointer;'>Cerrar Sesion</a></li>
                        </ul>";
                echo "</div>";
            }else {
                echo "<a class='m-1 btn btn-dark' href='login.php'>Login</a>";
            }
        ?>
        </div>
    </div>
</header>
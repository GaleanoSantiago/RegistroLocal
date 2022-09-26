
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="icon" href="./imagenes/iconos/inicio2.png">
   <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    

</head>
<body class="fondo_gradiante">
    <div id="sidemenu" class="menu-collapsed">
<!--Header-->
    <div id="header">
        <div id="title">
        <span>Menu</span>  </div>
        <div id="menu-btn">
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
            <div class="btn-hamburguer"></div>
        </div>
        
    </div>
<!--Perfil-->
    <div id="profile">
        <!--<div id="name">Usuario <span><?php // echo $_SESSION['usuario'] ?> <a href="Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>-->
    </div>
<!--Items-->
    <div id="menu-items">
    <div class="item">
            <a href="#">
                <div class="icon"> <img src="imagenes/iconos/inicio2.png" width="40px"> </div>
                <div class="title">Inicio</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="_Clientes/lista_clientes.php">
                <div class="icon"> <img src="imagenes/iconos/client.png" width="40px"> </div>
                <div class="title">Clientes</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="_Clientes/lista_registros.php">
                <div class="icon"> <img src="imagenes/iconos/ventas.png" width="40px"> </div>
                <div class="title">Registros</div>
            </a>
        </div>
       
        <div class="item separator">
        </div>
    </div>

    </div>
    <div class="">
        <div class="" >
    <div class="container" >

        <div class="row centrado_vertical mb-3 justify-content-evenly"> 
        <div class="col-lg-3 col-md-3">
        <div class="text-center bloques">
            <a href="_Clientes/lista_clientes.php">
                <img src="imagenes/iconos/client.png" width="225px"> 
                <br> 
                <span class="text-light fs-5">Lista de Clientes</span>
            </a>
        </div>
        </div>
        <div class="col-lg-3 col-md-3">
        <div class="text-center bloques"><a href="_Clientes/lista_registros.php"> <img src="imagenes/iconos/ventas.png" width="225px"> <br> <span class="text-light fs-5"> Lista de Registros</span></a></div>
        </div>
        </div>
        
        </div>
        
    </div>
    </div>
    </div>
    
<!--Jquery bootstrap y popper-->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="popper/popper.min.js"></script>

<script src="js/menu_lateral.js"> </script>
</body>
</html>
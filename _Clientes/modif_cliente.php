<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos</title>
    <link rel="stylesheet" href="../estilo.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css" type="text/css">

<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 5 CSS-->  
<link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">   

<!-- Estilos Propios--->
<link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>


<header>
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
    		<h1 class="text-center">Modificar <span class="text-danger">Datos</span></h1>        <!-- Titulo -->
			</div>
		</div>	
	</div>
</header>
<!-- Sidemenu -->

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
        <!--<div id="name">Usuario <span><?php// echo $_SESSION['usuario'] ?> <a href="../Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>-->
    </div>
<!--Items-->
    <div id="menu-items">
        <div class="item">
            <a href="../index.php">
                <div class="icon"> <img src="../imagenes/iconos/inicio.png" width="40px"> </div>
                <div class="title">Inicio</div>
            </a>
        </div>
        <div class="item separator">
        </div>
		<div class="item">
            <a href="lista_clientes.php">
                <div class="icon"> <img src="../imagenes/iconos/customer-review.png" width="40px"> </div>
                <div class="title">Clientes</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        <div class="item">
            <a href="lista_registros.php">
                <div class="icon"> <img src="../imagenes/iconos/ventas.png" width="40px"> </div>
                <div class="title">Registros</div>
            </a>
        </div>
        <div class="item separator">
        </div>
        
        
    </div>
</div>    

<!-- Fin del sidemenu -->

<?php
  require '../conexion.php';			//Codigo para conectar con la Base de Datos
  if(isset($_REQUEST['editar'])){               //Condicional para verificar si recibe los datos desde el archivo de lista_clientes.php
    $accion= $_REQUEST['editar'];
    $idEditar=$_REQUEST['ids'];

  $id = $_GET['ids'];					//Variable en donde se guarda el valor de cliente_id. Enviado desde la pagina de lista_clientes.php por medio del metodo GET
	

  $consulta="SELECT * FROM clientes WHERE cliente_id = $id";			//Codigo SQL para seleccionar un registro que posea el cliente_id mencionado anteriormente

  $resultado= $conexion->query($consulta);								//Codigo para enlazar el sql con la BD
  $fin = $resultado-> fetch_assoc();

  
    /*echo "Valor: ", $accion;
    echo "<br>";
    echo "ID: ", $idEditar;
    echo "<br>";*/


  ?>
  <div class="container">
	  <div class="row">
		  <div class="col-lg-6 col-md-12 col-sm-12">
  <form action="updatecliente.php" method="POST">				<!-- Formulario para actualizar -->
    <input type="hidden" name="cliente" value="confirmacion">       <!-- input hidden para activar el guardado de los datos -->
    <div class="form-group">
		<label for="cliente_id" class="form-label">Id Cliente</label>
		<input type="number" name="id_cliente" class="form-control" id="id_cliente" value="<?php echo $fin['cliente_id'] ?>" readonly>
	</div> 
	<div class="form-group">		
		<label for="apellido" class="form-label">Apellido</label>
		<input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $fin['capellido_cliente'] ?>">		  
	</div>	
	<div class="form-group">	  
		<label for="nombre" class="form-label">Nombre</label>  
		<input type="text" name="nombre" class="form-control" id= "nombre" value="<?php echo $fin['cnombre_cliente'] ?>" required>
	</div>
	<div class="form-group">
		<label for="doc" class="form-label">Documento</label>
		<input type="text" class="form-control" name="doc" id="doc"  value="<?php echo $fin['ndocumento_cliente'] ?>">

	</div>
	<div class="form-group">
		<label for="tel" class="form-label">Numero de Telefono</label>
		<input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $fin['ntelefono_cliente'] ?>">
	</div>
	<div class="form-group">
		<label for="direccion" class="form-label">Direccion</label>
		<input type="text" name="direccion" class="form-control" id='direccion' value="<?php echo $fin['cdireccion_cliente'] ?>" >
	</div>	
	  <br>
      <input class="btn btn-success mb-3 " type="submit" value="Actualizar">		<!--Boton para enviar los datos del formulario-->
	  <button type="reset" class="btn btn-danger mb-3">Deshacer Cambios</button>						<!-- Boton para resetear los campos --> 
	  <a  class="btn btn-primary mb-3 " href="lista_clientes.php">Volver a la Lista</a>		<!-- Boton para volver a la pagina de listado de productos -->
	</div>
	</form>
	
	</div>
	</div>
	</div>
<?php
}

if(isset($_REQUEST['planilla'])){           //Condicional para verificar si recibe los datos desde el archivo de movimientos o registros
    $accion= $_REQUEST['planilla'];
    $idEditar=$_REQUEST['ids'];

    //echo "Accion: $accion";
    //echo "<br>";
    //echo "Id: $idEditar";
    //echo "<br>";
    $consulta="SELECT * FROM registros WHERE registro_id = $idEditar";			//Codigo SQL para seleccionar un registro que posea el cliente_id mencionado anteriormente

    $resultado= $conexion->query($consulta);								//Codigo para enlazar el sql con la BD
    $fin = $resultado-> fetch_assoc();

    
    //Codigo ara obtener el nombre del cliente
   // $cliente_id=$fin['rela_cliente_id'];
    $consulta2="SELECT * from clientes order by cnombre_cliente asc";			//Codigo SQL para traer los datos del cliente
    
    $resultado2= $conexion->query($consulta2);								//Codigo para enlazar el sql con la BD
    /*while($fin2=$resultado2->fetch_assoc()){
        
        echo $fin2['cliente_id'], " ", $fin2['capellido_cliente'], " ", $fin2['cnombre_cliente'];
        echo "<br>";

    }
    $fin2 = $resultado2-> fetch_assoc();*/
    
   

    ?>
    <div class="container">
	  <div class="row">
		  <div class="col-lg-6 col-md-12 col-sm-12">
  <form action="updatecliente.php" method="POST">				<!-- Formulario para actualizar -->
    <input type="hidden" name="planillaCliente" value="confirmacion">       <!-- input hidden para activar el guardado de los datos -->
    <input type="hidden" name="cliente_id_pagina" value="<?php echo $fin['rela_cliente_id'] ?>">        <!-- input hidden para que retorne a la misma pagina en la que estabamos antes de editar -->     <!-- input hidden para activar el guardado de los datos -->
    
    <div class="form-group">
		<label for="registro_id" class="form-label">Id Registro</label>
		<input type="number" name="registro_id" class="form-control" id="registro_id" value="<?php echo $fin['registro_id'] ?>" readonly>
	</div>
    <div class="form-group">
		<label for="cliente_id" class="form-label">Id Cliente</label>
		<!--<input type="number" name="id_cliente" class="form-control" id="id_cliente" value="<?php //echo $fin['rela_cliente_id'] ?>" required>-->
        <select name="cliente_id" id="cliente_id" class="form-select">
        <?php   
            while($fin2=$resultado2->fetch_assoc()){
        ?>  
            <option value="<?php echo $fin2['cliente_id']; ?>" <?php if($fin2['cliente_id'] == $fin['rela_cliente_id'] ){echo 'SELECTED';} ?>>
            <?php echo $fin2['cnombre_cliente'], " ", $fin2['capellido_cliente']; ?></option> 
        <?php
            }
        ?>
            
        </select>
    </div> 
    <div class="form-group">
		<label for="nombre" class="form-label">Nombre del Producto</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $fin['cnombre_producto'] ?>" required>		  
	</div>	
	<div class="form-group">		
		<label for="cant" class="form-label">Cantidad del Producto</label>
		<input type="number" class="form-control" name="cant" id="cant" value="<?php echo $fin['ncant_prod'] ?>" min="1" required>		  
	</div>	
	<div class="form-group">	  
		<label for="precio_prod" class="form-label">Precio del Producto <span class="text-secondary">$</span></label>  
		<input type="number" name="precio_prod" class="form-control" id="precio_prod" value="<?php echo $fin['nprecio_producto'] ?>" required>
	</div>
    <div class="form-group">
        <label for="fecha" class="form-label">Fecha de la Venta</label>	
	<input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fin['dfecha_venta'];?>" required >
	</div>	
    <div class="form-group">
        <label for="hora" class="form-label">Hora de la Venta</label>	
	<input type="time" name="hora" id="hora" class="form-control" value="<?php echo $fin['thora_venta'];?>" >
	</div>	
	 
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
    <div class="form-group">
		<label for="cuotas_pag" class="form-label">Cuotas Pagadas</label>
		<input type="number" name="cuotas_pag" class="form-control" id='cuotas_pag' value="<?php echo $fin['ncuotas_pagadas'] ?>" >
	</div>
    <div class="form-group">
		<label for="precio_cuotas" class="form-label">Precio por Cuota <span class="text-secondary">$</span></label>
		<input type="number" class="form-control" name="precio_cuotas" id="precio_cuotas"  value="<?php echo $fin['nprecio_cuota'] ?>">

	</div>
	<div class="form-group">
		<label for="cuotas" class="form-label">Cuotas del Producto</label>
		<input type="number" class="form-control" name="cuotas" id="cuotas" value="<?php echo $fin['ncuotas_producto'] ?>">
	</div>
    <br>
      <input class="btn btn-success mb-3 " type="submit" value="Actualizar">		<!--Boton para enviar los datos del formulario-->
	  <button type="reset" class="btn btn-danger mb-3">Deshacer Cambios</button>						<!-- Boton para resetear los campos --> 
	  <?php if($accion=="editardRegistros"){ ?>
        <input type="hidden" name="editardRegistros" id="editardRegistros">		    <!--Para confirmar que se envio desde lista_registros.php -->
        <a  class="btn btn-primary mb-3 " href="lista_registros.php">Volver a la Lista</a>		<!-- Boton para volver a la pagina de listado de registros -->
        <?php }else{ ?>
            <a  class="btn btn-primary mb-3 " href="planilla_cliente.php?ids='<?php echo $fin['rela_cliente_id'] ?>'">Volver a la Lista</a>		<!-- Boton para volver a la pagina de listado de productos -->
        <?php } ?>
    </div>
	</form>
	
	</div>
	</div>
	</div>
<?php

}

?>

<!--Jquery bootstrap y popper-->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 	


 <!-- datatables JS -->
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    

<!-- JS -->
<script src="../main.js" charset="utf-8"></script>
<script src="../js/menu_lateral.js"> </script>
</body>
</html>
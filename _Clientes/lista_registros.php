<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
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
<!-- Sidemenu -->    
    <header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
    		<h1 class="text-center">Lista de <span class="text-danger">Registros</span></h1>        <!-- Titulo -->
			</div>
		</div>	
	</div>
</header>
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
        <!--<div id="name">Usuario <span><?php //echo $_SESSION['usuario'] ?> <a href="../Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>-->
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
</div> <!-- Fin Sidemenu -->
<?php
    require "../conexion.php";

    $fecha_actual=date("Y-m-d");	//Variable que guarda la fecha del dia en la que se carga el producto
    

    $pre_consulta="SELECT * from clientes order by cnombre_cliente asc";			//Codigo SQL para traer los datos del cliente
    $pre_resultado= $conexion->query($pre_consulta);

?>
<div>   <!------------------ Boton para agregar -------------------------->
<div class="container mt-3" style="">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">  
  <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
    Agregar una Nueva Venta
  </a>
  
</p>
<div class="collapse mb-3" id="collapseForm">
  <div class="card card-body">
	<form action="lista_registros.php" method="POST">
    <div class="container">
	<div class="row">
  	<div class="col-6" >
    <div class="mb-3">
        <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
	<label for="cliete_id" class="form-label">Cliente <span class="text-secondary">(Si no lo encuentra lo puede crear)</span> </label> 
    <select name="cliente_id" id="cliente_id" class="form-select">
    <?php    while($pre_fin=$pre_resultado->fetch_assoc()){   ?>    
        <option value="<?php echo $pre_fin['cliente_id']; ?>"> 
        
        <?php echo $pre_fin['cnombre_cliente'], " ", $pre_fin['capellido_cliente']; ?> </option>
    <?php
            }
    ?>
    </select>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="" class="form-label"><span class="text-center"></span></label> 
            <a href="lista_clientes.php#collapseForm" class="btn btn-info">Crear Nuevo Cliente</a>
        </div>
        </div>
	</div>
	<div class="mb-3">
		<input type="hidden" name="accion" value="confirmacion">            <!--Input hidden para confirmar el envio de este formulario-->
    <label for="nombre" class="form-label" >Nombre del Producto</label>
	<input type="text" name="nombre" id="nombre" class="form-control" required>
	</div>
	<div class="mb-3">
	<label for="doc" class="form-label">Cantidad del Producto</label> 
	<input type="number" name="cant" id="cant" class="form-control" required>
	</div>
    <div class="mb-3">
	<label for="precio_prod" class="form-label">Precio Total por la Compra</label>	
	<input type="number" name="precio_prod" id="precio_prod" class="form-control" min="1" required>
	</div> 
    <div class="mb-3">
	<label for="precio_cuotas" class="form-label">Precio por Cuotas</label>	
	<input type="number" name="precio_cuotas" id="precio_cuotas" class="form-control" placeholder="Puede dejar este campo vacio si no se vende por cuotas">
	</div> 
    </div>
    <div class="col-6">
    <div class="mb-3">
	<label for="cuotas" class="form-label" >Cuotas</label>
	<input type="number" name="cuotas" id="cuotas"  class="form-control" placeholder="Puede dejar este campo vacio si no se vende por cuotas">
	</div>
	<div class="mb-3">
	<label for="cuotas_pag" class="form-label">Cuotas Pagadas</label>	
	<input type="number" name="cuotas_pag" id="cuotas_pag" class="form-control" placeholder="Puede dejar este campo vacio si no se vende por cuotas">
	</div>
    <div class="mb-3">
	<label for="fecha" class="form-label">Fecha de la Venta</label>	
	<input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha_actual;?>" required >
	</div>
    <div class="mb-3">
	<label for="hora" class="form-label">Hora <span class="text-secondary">(Puede dejar este campo vacio si lo desea)</span></label>	
	<input type="time" name="hora" id="hora" class="form-control">
	</div>
	 
		<br>
  		<button type="submit" class="btn btn-primary">Almacenar</button>
		<button type="reset" class="btn btn-danger">Cancelar</button>
	</form></div>
			
	</div>
  </div>
</div>
</div>
<!-------------- Fin del boton agregar ------------------->


<?php 
if (isset($_POST['accion'])){								//Si el formulario anterior se envia
    //Definen las variables
    $id_cliente=$_REQUEST['cliente_id'];
    $nombre_prod=$_POST['nombre'];
    $cant_prod=$_POST['cant'];
    $precio_prod =$_POST['precio_prod'];
    $precio_cuotas=$_POST['precio_cuotas'];
    $cuotas=$_POST['cuotas'];
    $cuotas_pagadas= $_POST['cuotas_pag'];
    $fecha_venta= $_POST['fecha'];
    $hora_venta= $_POST['hora'];
    //$dthorario_venta= "$fecha_venta $hora_venta";
    
   /* echo "Cliente id: $id_cliente";
    echo "<br>";
    echo "Nombre: $nombre_prod";
    echo "<br>";
    echo "Cantidad de Producto: $cant_prod";
    echo "<br>";
    echo "Precio del Producto: $precio_prod";
    echo "<br>";
    echo "Precio de las cuotas: $precio_cuotas";
    echo "<br>";
    echo "Cuotas: $cuotas";
    echo "<br>";
    echo "Cuotas pagadas: $cuotas_pagadas";
    echo "<br>";
    echo "Fecha de venta: $fecha_venta";
    echo "<br>";
    echo "Hora de la Venta: $hora_venta";
    echo "<br>";
    echo "DATETIME: $dthorario_venta";*/

    $guardar="INSERT INTO `registros` (`rela_cliente_id`, `cnombre_producto`, `ncant_prod`, `nprecio_producto`, `nprecio_cuota`, `ncuotas_producto`, `ncuotas_pagadas`, `dfecha_venta`, `thora_venta`) VALUES ('$id_cliente', '$nombre_prod', '$cant_prod', '$precio_prod', '$precio_cuotas', '$cuotas', '$cuotas_pagadas', '$fecha_venta', '$hora_venta');";	//Esta linea de codigo almacena el sql que permite insertar registros a la tabla de clientes
    $resultado2=$conexion->query($guardar);		//Codigo que enlaza el codigo sql con la base de datos
    
}

?>


<div class="container" id="">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="table-responsive ">
                    <form action='checked.php' method='POST'>                <!--Formulario para los checkboxs-->

        			<table id="tablaProductos" class=" shadow-lg border border-bottom table table-striped table-hover">	<!-- INICIO DE LA TABLA --> 
        
					<thead class=""> 
					<tr>			<!-- Primera fila de la tabla -->
						<th class="border-start border-end border-dark">#</th>
						<th class="border-start border-end border-dark">Id</th>
						<th class="border-end border-dark">Cliente</th>
						<th class="border-end border-dark">Producto</th>
						<th class="border-end border-dark">Cantidad</th>
						<th class="border-end border-dark">Precio</th>
						<th class="border-end border-dark">Precio por Cuota</th>
						<th class="border-end border-dark">Cantidad de Cuotas</th>
						<th class="border-end border-dark">Cuotas Pagadas</th>
						<th class="border-end border-dark">Fecha y Hora de la Venta</th>
						<th class='border-end border-dark'>Editar</th>
						<th class='border-end border-dark'>Eliminar</th>
                        
						</tr>
						</thead>
                        <?php
                        $consulta= "SELECT * FROM registros order by registro_id ASC";     //Codigo sql que selecciona todos los registros de la tabla y los ordena por el id de manera ascendente
                        $resultado= $conexion->query($consulta);
                        
                        $contador=0;                            //Inicializo el contador para los checkboxs como 0
                        while($fin=$resultado->fetch_assoc()){
                            $contador=$contador+1;                  //Contador para los checkboxs
                            
                            $cliente_id=$fin['rela_cliente_id'];
                            $consulta_cliente= "SELECT * FROM clientes WHERE cliente_id=$cliente_id";
                            $resultado_cliente= $conexion->query($consulta_cliente);

                            while($fin_cliente=$resultado_cliente->fetch_assoc()){
                                $cliente_nombre=$fin_cliente['cnombre_cliente'];
                                $cliente_apellido= $fin_cliente['capellido_cliente'];
                                $ayp_cliente= "$cliente_apellido $cliente_nombre";
                            }

                            echo "<tr>"; 
                                echo "<td class='border-end'> <input class='form-check-input case' type='checkbox' value='".$fin['registro_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
                                echo "<td>", $fin['registro_id'], " </td>"; 
                                echo "<td> <a href='planilla_cliente.php?ids=".$cliente_id."'><span>$ayp_cliente</span></a></td>";
                               // echo "<td> ", $ayp_cliente ," </td>"; 
                                echo "<td>", $fin['cnombre_producto'], " </td>";
                                echo "<td>", $fin['ncant_prod'], " </td>";
                                echo "<td> $", $fin['nprecio_producto'], " </td>";
                                echo "<td> $", $fin['nprecio_cuota'], " </td>";
                                echo "<td>", $fin['ncuotas_producto'], " </td>";
                                echo "<td>", $fin['ncuotas_pagadas'], " </td>";
                                echo "<td>", $fin['dfecha_venta'], " ", $fin['thora_venta'], " </td>";
                                
                                echo "<td><a class='btn btn-primary' href='modif_cliente.php?ids=".$fin['registro_id']."&planilla=editardRegistros'>Editar</a></td>";		
                                echo "<td class='border-end' align='center'> <a class='btn btn-danger' Onclick='return ConfirmDelete();' href='checked.php?ids=".$fin['registro_id']."&planilla=eliminarPlanilla'>Eliminar</a></td>";
                                
                            echo "</tr>";
                        }
                        ?>

                        </table>		<!-- FIN DE LA TABLA -->
                        <input type="hidden" name="accion" value="<?php echo $contador ?>">             <!-- Input hidden para enviar el contador -->
                        

                        <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <input type="checkbox" id="selectall"> Seleccionar todo</div>
                                <div class="p-2 bd-highlight">
                                <span class="text-secondary">Opcion para los elementos seleccionados   </span>
                                    <input type="submit" class="btn btn-dark" name="checkPlanillaCliente" id="checkPlanillaCliente" value="Eliminar" Onclick="return ConfirmDelete();">
                                </div>
                                <div class="p-2 bd-highlight"></div> <!-- Para otro boton al lado del de eliminar -->
                                <div class="p-2 bd-highlight"></div> <!-- Para otro boton al lado del de eliminar -->
                        </div>
                        </form>                         <!--Fin Formulario para los checkboxs-->

                        <div class="mt-2 mb-3">
                            <a href="../index.php" class="btn btn-info">Volver</a>
                        </div>
				</div>
			</div>
		</div>
</div>


<!--Jquery bootstrap y popper-->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script> 	


 <!-- datatables JS -->
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    

<!-- JS -->
<script src="../main.js" charset="utf-8"></script>
<script src="../js/menu_lateral.js"> </script>

<!-- JS para el boton eliminar -->
<script>
    //Script para el check de selectall
    // añade multiples funcionalidades de select/unselect
$("#selectall").on("click", function() {
  $(".case").prop("checked", this.checked);
});

//  si todos los checkboxs son seleccionados, el "checkbox selectall" se checkea. Y viceversa
$(".case").on("click", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

    function ConfirmDelete()
    {
      var x = confirm("¿Seguro que quiere eliminar el registro de esta venta?");
      if (x)
          return true;
      else
        return false;
    }
</script>
</body>
</html>
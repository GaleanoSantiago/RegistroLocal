<?php
//Vistas incluidas
//include("../Includes/header.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimiento</title>
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
		<div class="row">
			<div class="col-lg-12">
    		<h1 class="text-center"><span class="text-danger">Compras </span>del Cliente</h1>        <!-- Titulo -->
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
        <!--<div id="name">Usuario <span><?php echo $_SESSION['usuario'] ?> <a href="../Login/cerrar_sesion.php"><button class="btn btn-danger">Cerrar Sesion</button></a></span></div>-->
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

<div class='container'>
<?php
require "../conexion.php";		//Php para conectar con la base de datos

$fecha_actual=date("Y-m-d");	//Variable que guarda la fecha del dia en la que se carga el producto
//dthorario_venta
//$tiempo= time();      No funcionan
//$hoy = getdate();     no funciona
//echo $hoy;
//echo "<br>";
//echo $fecha_actual;

$id=$_REQUEST["ids"];

$consulta= "SELECT * FROM clientes WHERE cliente_id=$id";
$resultado = $conexion->query($consulta);

while($fin=$resultado->fetch_assoc()){
    ?>
    <div class="row justify-content-end" >
    <div class="col col-lg-6 col-md-6 col-sm-12 "> 

    <div class="row text-center ">
        <div class="col">Información del Cliente</div>
    </div>
    <div class="row ">   <!-- inicio de la fila -->
    <div class="col-3 border border-bottom-0 rounded-top">Cliente ID: <?php echo $fin['cliente_id']; ?></div>
    <div class="col-5 border border-bottom-0 rounded-top">Cliente: <?php echo $fin['capellido_cliente'], " ", $fin['cnombre_cliente']; ?> </div>
    <div class="col-4 border border-bottom-0 rounded-top">Documento: <?php echo $fin['ndocumento_cliente']; ?></div>
    </div><!-- fin de la fila -->
    </div>
    </div>
    <?php
    $nombre_cliente=$fin['capellido_cliente'];
    
   /* echo "Id Cliente: ", $fin['cliente_id'];
    echo "<br>";
    echo "Cliente: " , $fin['capellido_cliente'], " ", $fin['cnombre_cliente'];
    echo "<br>";
    echo "Documento: ", $fin['ndocumento_cliente'];
    echo "<br>"; echo "<br>";*/


}
?>

<div>   <!------------------ Boton para agregar -------------------------->
<div class="container mt-3" style="">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Boton para la ventana modal -->
	<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Agregar una Nueva Venta de <?php echo $nombre_cliente; ?> 
	</button>

        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva Venta de <?php echo $nombre_cliente; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <form action="planilla_cliente.php" method="POST" id="formularioPlanilla">
        
        <div class="mb-3">
            <input type="hidden" name="accion" value="confirmacion">            <!--Input hidden para confirmar el envio de este formulario-->
            <input type="hidden" name="ids" value="<?php echo $id; ?>">            <!--Input hidden para enviar el id del cliente-->
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
	 
	</form>


      </div>
      <div class="modal-footer">
        <div class="pe-2 border">
            <button type="submit" class="btn btn-primary" form="formularioPlanilla">Almacenar</button>
		    <button type="reset" class="btn btn-danger" form="formularioPlanilla">Cancelar</button>
        </div>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>    
        
  
  </div>
</div>
</div>
<!-------------- Fin del boton agregar ------------------->

<?php 
if (isset($_POST['accion'])){								//Si el formulario anterior se envia
    //Definen las variables
    $id_cliente=$_REQUEST['ids'];
    $nombre_prod=$_POST['nombre'];
    $cant_prod=$_POST['cant'];
    $precio_prod =$_POST['precio_prod'];
    $precio_cuotas=$_POST['precio_cuotas'];
    $cuotas=$_POST['cuotas'];
    $cuotas_pagadas= $_POST['cuotas_pag'];
    $fecha_venta= $_POST['fecha'];
    $hora_venta= $_POST['hora'];
   // $dthorario_venta= "$fecha_venta $hora_venta";         //Ya no se usa desde que se modifico la base de datos
    
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

/*$consulta = "SELECT * from clientes order by cliente_id asc";		//consulta sql, trae todos los registros de la tabla clientes, ordenando los datos en base a clientes_id de manera ascendente
$resultado = $conexion->query($consulta);							//enlazando la consulta con la base de datos
if($conexion->errno) die($conexion->error);*/


?>
<form action='checked.php' method='POST'>                <!--Formulario para los checkboxs-->

<table id="tablaProductos" class='shadow-lg border border-bottom table table-striped table-hover'>
<thead>
<th class="border border-dark">#</th>
    <th class="border border-dark">Registro ID</th>
    <th class="border border-dark">Producto</th>
	<th class="border border-dark">Cantidad Producto</th>
	<th class="border border-dark">Precio</th>
	<th class="border border-dark">Precio por Cuotas</th>
    <th class="border border-dark">Cuotas</th>
    <th class="border border-dark">Cuotas Pagadas</th>
    <th class="border border-dark">Fecha de Venta</th>
    <th class="border border-dark">Editar</th>
    <th class="border border-dark">Eliminar</th>
</thead>

<?php

$consulta2= "SELECT * FROM registros WHERE rela_cliente_id=$id";
$resultado2= $conexion->query($consulta2);

$contador=0;                            //Inicializo el contador para los checkboxs como 0
while($fin2=$resultado2->fetch_assoc()){
    $contador=$contador+1;                  //Contador para los checkboxs


    echo "<tr>"; 
    echo "<td class='border-end'> <input class='form-check-input case' type='checkbox' value='".$fin2['registro_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
    echo "<td>", $fin2['registro_id'], " </td>"; 
    echo "<td>", $fin2['cnombre_producto'], " </td>";
    echo "<td>", $fin2['ncant_prod'], " </td>";
    echo "<td> $", $fin2['nprecio_producto'], " </td>";
    echo "<td> $", $fin2['nprecio_cuota'], " </td>";
    echo "<td>", $fin2['ncuotas_producto'], " </td>";
    echo "<td>", $fin2['ncuotas_pagadas'], " </td>";
    echo "<td>", $fin2['dfecha_venta'], " ", $fin2['thora_venta'], " </td>";
    
    echo "<td><a class='btn btn-primary' href='modif_cliente.php?ids=".$fin2['registro_id']."&planilla=editarPlanilla'>Editar</a></td>";		


    echo "<td class='border-end' align='center'> <a class='btn btn-danger' Onclick='return ConfirmDelete();' href='checked.php?ids=".$fin2['registro_id']."&planilla=eliminarPlanilla&idsCliente=".$fin2['rela_cliente_id']."'>Eliminar</a></td>";
    
    echo "</tr>";

}
//&idsCliente=".$fin2['rela_cliente_id']."
?>
</table>
<input type="hidden" name="accion" value="<?php echo $contador ?>">             <!-- Input hidden para enviar el contador -->
<input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $id; ?>">

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
    <?php if(isset($_REQUEST['clientes'])){ ?> <!-- Si recibe el "clientes" significa que el boton debe redirigir a la pagina de lista de clientes -->
    <a href="lista_clientes.php" class="btn btn-info">Volver</a></div>
    <?php }else{ ?> <!-- en caso contrario debe redirigir a la pagina de registros -->
    <a href="lista_registros.php" class="btn btn-info">Volver</a></div>
        <?php } ?>
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
      var x = confirm("¿Seguro que quiere eliminar el producto?");
      if (x)
          return true;
      else
        return false;
    }
</script>

</body>
</html>

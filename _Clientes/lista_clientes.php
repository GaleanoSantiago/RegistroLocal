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
    <title>Lista de Clientes</title>
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
    		<h1 class="text-center">Lista de <span class="text-danger">Clientes</span></h1>        <!-- Titulo -->
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
</div>    
<?php 

require "../conexion.php";		//Php para conectar con la base de datos
$fecha_actual=date("Y-m-d");	//Variable que guarda la fecha del dia en la que se carga el producto


	?> 

<div>   <!------------------ Boton para agregar -------------------------->
<div class="container" style="">
    <div class="row">
        <div class="col-lg-12">  

    <!-- Boton para la ventana modal -->
	<button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
	Agregar Nuevo Cliente
	</button>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action="lista_clientes.php" method="POST" id="formularioCliente">
        
        <div class="mb-3">
            <input type="hidden" name="accion" value="confirmacion">            <!--Input hidden para confirmar el envio de este formulario-->
        <label for="apellido" class="form-label" >Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control"  >
        </div>
        <div class="mb-3">
        <label for="nombre" class="form-label" >Nombre</label>
        <input type="text" name="nombre" id="nombre"  class="form-control" required>
        </div>
        <div class="mb-3">
        <label for="doc" class="form-label">Documento</label> 
        <input type="text" name="doc" id="doc" class="form-control">
        </div>
        <div class="mb-3">
        <label for="tel" class="form-label">N° de Telefono</label>	
        <input type="tel" name="tel" id="tel" class="form-control">
        </div>
        <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>	
        <input type="text" name="direccion" id="direccion" class="form-control"  >
        </div> 
        
        

        </form>

      </div>
      <div class="modal-footer">
        <div class="pe-2 border-end">
        <button type="submit" class="btn btn-primary" form="formularioCliente">Almacenar</button>
        <button type="reset" class="btn btn-danger" form="formularioCliente">Cancelar</button>
        </div>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  
</div>
</div>
<!-------------- Fin del boton agregar ------------------->
<br>
<?php
		
    
	if (isset($_POST['accion'])){								//Si el formulario anterior se envia
			//Definen las variables
            $apellido=$_POST['apellido'];
            $nombre=$_POST['nombre'];
            $direccion =$_POST['direccion'];
            $documento=$_POST['doc'];
            $tel = $_POST['tel'];
  
            $guardar="INSERT INTO `clientes` (`capellido_cliente`, `cnombre_cliente`, `ndocumento_cliente`, `ntelefono_cliente`, `cdireccion_cliente`) VALUES ('$apellido', '$nombre', '$documento', '$tel', '$direccion');";	//Esta linea de codigo almacena el sql que permite insertar registros a la tabla de clientes
            $resultado2=$conexion->query($guardar);		//Codigo que enlaza el codigo sql con la base de datos
            
        }

    $consulta = "SELECT * from clientes order by cliente_id asc";		//consulta sql, trae todos los registros de la tabla clientes, ordenando los datos en base a clientes_id de manera ascendente
    $resultado = $conexion->query($consulta);							//enlazando la consulta con la base de datos
    if($conexion->errno) die($conexion->error);


    ?>		
<div>                                       <!-- Tabla -->
<form action='checked.php' method='POST'>                
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive ">
        			<table id="tablaProductos" class=" shadow-lg border border-bottom table table-striped table-hover">	<!-- INICIO DE LA TABLA --> 
        
					<thead class=""> 
					<tr>			<!-- Primera fila de la tabla -->
						<th class="border-start border-end border-dark">#</th>
						<th class="border-start border-end border-dark">Id</th>
						<th class="border-end border-dark">Apellido</th>
						<th class="border-end border-dark">Nombre</th>
						<th class="border-end border-dark">Documento</th>
						<th class="border-end border-dark">Telefono</th>
						<th class="border-end border-dark">Direccion</th>
						<th class="border-end border-dark">Cantidad de Compras</th>
						<?php 
					//	if($acceso==1){
						echo "<th class='border-end border-dark'><span class='blue'> Editar</span></th>";
						echo "<th class='border-end border-dark'><span class='red'>Eliminar</span></th>";	   
					//}
						?>
						<th class="border-end border-dark">Movimiento</th>
                        
						</tr>
						</thead>
						<?php	
							
				
			$contador=0;                            //Inicializo el contador para los checkboxs como 0
	while($fin = $resultado->fetch_assoc()){ 		//Mientras se cumpla la condicion $resultado
            $contador=$contador+1;                  //Contador para los checkboxs
            $cliente_id= $fin['cliente_id'];

            $countSQL="SELECT COUNT(*) contador_ FROM registros WHERE rela_cliente_id = $cliente_id";        
            $resultadoSQL = $conexion->query($countSQL);
            $finSQL = $resultadoSQL->fetch_assoc();
					echo  "<tr>";		//Segunda fila de la tabla. En esta parte del codigo se exhiben los datos traidos de las consultas sql realizadas anteriormente
                    
						echo "<td class='border-end'> <input class='form-check-input case' type='checkbox' value='".$fin['cliente_id']."' id='flexCheckDefault' name='check_".$contador."'></td>";
                        echo "<th>  ",$cliente_id,"  </th>";
						echo "<td align='center'>  ",$fin['capellido_cliente'],"  </td>";
						echo "<td align='center'>  ",$fin['cnombre_cliente'],"  </td>";
						echo "<td align='center'>  ",$fin['ndocumento_cliente'],"  </td>";
						echo "<td align='center'>  ",$fin['ntelefono_cliente'],"  </td> ";
						echo "<td align='center'>  ",$fin['cdireccion_cliente'],"  </td>";
						echo "<td align='center' class='border'>  ",$finSQL['contador_'],"  </td>";
													//Codigo para enviar los datos por medio de GET
										//			if($acceso==1){								//Solo si el usuario es admin podrá acceder a estos botones
														echo "<td class='border' align='center'>  <a class='btn btn-primary' href='modif_cliente.php?ids=".$fin['cliente_id']."&editar=editar'>Editar</a></td>";		//Envia el dato almacenado en "cliente_id" a la pagina "modif_cliente.php" por medio del metodo GET
														//echo "<td class='border' align='center'> <button input type='button' value='Alta' onclick='location.href='modif_cliente.php?ids=".$fin['cliente_id']."'>Editar</button>";
                                                        echo " <td class='border-end' align='center'> <a class='btn btn-danger' Onclick='return ConfirmDelete();' href='checked.php?ids=".$fin['cliente_id']."&eliminar=eliminar'>Eliminar</a></td>";	//Envia el dato almacenado en "cliente_id" a la pagina "elimcliente.php" por medio del metodo GET
										//			}
						echo "<td class='border-end' align='center'><a class='btn btn-warning' href='planilla_cliente.php?clientes=lista&ids=".$fin['cliente_id']."' >Ver Movimiento</a></td>";	
                        //echo "<td>".$contador."</td>";
                    echo "</tr>";		//Fin de la segunda fila
                    
					}
				
          ?>
      				</table>		<!-- FIN DE LA TABLA -->
				</div>
			</div>
		</div>
        
        <input type="hidden" name="accion" value="<?php echo $contador ?>">
        
        <p>

        </p>
        
        <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight">
            <input type="checkbox" id="selectall"> Seleccionar todo</div>
        <div class="p-2 bd-highlight">
            Opcion para los elementos seleccionados   
            <input type="submit" class="btn btn-dark" name="enviar" id="enviar" value="Eliminar" Onclick="return ConfirmDelete();">
        </div>
        <div class="p-2 bd-highlight"></div>
        <div class="p-2 bd-highlight"></div>
        
        </div>

        
        </form>                         <!--Fin Formulario para los checkboxs-->
        <div class="mt-2 mb-3">
            <a href="../index.php" class="btn btn-info">Volver</a>
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
      var x = confirm("¿Seguro que quiere eliminar el cliente? Si lo elimina se borraran todos sus registros de venta tambien");
      if (x)
          return true;
      else
        return false;
    }
</script>  
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificando Datos</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
<?php
        require '../conexion.php';						//Php para conectar con la base de datos
		if(isset($_REQUEST['cliente'])){
							//Variables en donde se guardan los datos enviados del archivo modif_cliente.php
        $id=$_POST['id_cliente'];
		$apellido=$_POST['apellido'];
		$nombre = $_POST['nombre'];
		$documento=$_POST['doc'];
		$tel=$_POST['tel'];
		$direccion=$_POST['direccion'];

	
					//Codigo para actualizar un registro de la tabla clientes
	    $guardar="update clientes set capellido_cliente='$apellido',
	    cnombre_cliente='$nombre', ndocumento_cliente='$documento',
	    ntelefono_cliente='$tel', cdireccion_cliente='$direccion' where cliente_id=$id";					
	
        $resultado= $conexion->query($guardar);			//Enlaza el sql con la base de datos
        if($conexion->errno) die($conexion->error);
	
	if($resultado){							//Si la variable $resultado se lleva a cabo correctamente
		echo'<script type="text/javascript">
		alert("Datos Actualizados Correctamente");
		window.location.href="lista_clientes.php";
		</script>';
	
	}else{					//Si la condicion de $resultado no se cumple

		echo "<h2><span class='red'>Error</span> al Actualizar los Datos</h2>";		//Imprime por pantalla un mensaje de error
		echo "<h3>Vuelva a Intentar</h3>";
		
	}
}
	if(isset($_REQUEST['planillaCliente'])){
		//Definen las variables
		$cliente_id_pagina=$_REQUEST['cliente_id_pagina'];
		$id_registro=$_REQUEST['registro_id'];
		$id_cliente=$_REQUEST['cliente_id'];
		$nombre_prod=$_POST['nombre'];
		$cant_prod=$_POST['cant'];
		$precio_prod =$_POST['precio_prod'];
		$precio_cuotas=$_POST['precio_cuotas'];
		$cuotas=$_POST['cuotas'];
		$cuotas_pagadas= $_POST['cuotas_pag'];
		$fecha_venta= $_POST['fecha'];
		$hora_venta= $_POST['hora'];
		//$dthorario_venta= $_POST['dthorario_venta'];

		//Codigo para actualizar un registro de la tabla registros
	    $guardar="update registros set rela_cliente_id='$id_cliente', cnombre_producto='$nombre_prod',
	    ncant_prod='$cant_prod', nprecio_producto='$precio_prod',
	    nprecio_cuota='$precio_cuotas', ncuotas_producto='$cuotas', 
		ncuotas_pagadas='$cuotas_pagadas', dfecha_venta='$fecha_venta', thora_venta='$hora_venta' where registro_id=$id_registro";					
	
        $resultado= $conexion->query($guardar);			//Enlaza el sql con la base de datos
        if($conexion->errno) die($conexion->error);
		if($resultado){							//Si la variable $resultado se lleva a cabo correctamente
			if(isset($_REQUEST['editardRegistros'])){
				//$editarR=$_REQUEST['editardRegistros'];
				//echo $editarR;
				?>
				<script type="text/javascript">
				alert("Datos Actualizados Correctamente");
				window.location.href="lista_registros.php";
			</script>';
				<?php
			}
			?>
			<script type="text/javascript">
			alert("Datos Actualizados Correctamente");
			window.location.href="planilla_cliente.php?ids=<?php echo $cliente_id_pagina; ?>";
			</script>';
		<?php
		}else{					//Si la condicion de $resultado no se cumple
	
			echo "<h2><span class='red'>Error</span> al Actualizar los Datos</h2>";		//Imprime por pantalla un mensaje de error
			echo "<h3>Vuelva a Intentar</h3>";
			
		}
	}
    ?>
</body>
</html>
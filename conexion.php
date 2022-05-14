<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php
	
	$conexion=mysqli_connect("localhost", "root", "", "planilla_cliente");
	/*$usuario="root";
	$contra="";
	$base_datos="planilla_cliente";
	$equipos="localhost";
	
	$conexion= new mysqli ($equipos, $usuario, $contra, $base_datos);
	*/
	if($conexion->connect_error){
		die ("Fallo en la conexion: (" . $mysqli->mysqli_connect_errno() . ")" . $mysqli-> mysqli_connect_errno());
	}
	
	
	?>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminando Cliente</title>
    <link rel="stylesheet" href="../estilo.css">

</head>
<body>
    
<?php
    require '../conexion.php';			//Codigo para conectar con la base de datos por medio del archivo conexion.php
        
    /*if(isset($_REQUEST['ids'])){
    $id = $_GET['ids'];				//Variable que guarda el id del proveedor enviado desde la pagina de lista_cliente.php
       
    if(isset($_REQUEST['ids'])){

        
    $consulta="DELETE FROM clientes WHERE cliente_id= $id";		//Sql para eliminar registros de la base de datos basandose en el id del cliente
    
    $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
    if($conexion->errno) die($conexion->error);
	
    if($resultado){			//Si la condicion $resultado se cumple correctamente
        echo'<script type="text/javascript">				
        alert("Cliente Eliminado Correctamente de la Base de Datos");
        window.location.href="lista_clientes.php";
        </script>';
        }else{					//Si no se cumple la condicion de $resultado
        echo "<h2 align='center'>Ha ocurrido un <span class='red'>ERROR </span></h2>";					//Imprime por pantalla un mensaje de error
        echo "<h3>Cliente no eliminado. Vuelva a intentar</h3>";										//Y un mensaje de volver a intentar
        echo "<a href='lista_clientes.php' class'btn btn-primary'>Volver a la Lista</a>";
        }
    }
}else{
    echo "No se selecciono desde la fila";
    echo "<br>";
}*/

if(isset($_REQUEST['ids'])){
    $id = $_GET['ids'];				//Variable que guarda el id del cliente enviado desde la pagina de lista_cliente.php
    
    if(isset($_REQUEST['ids'])){

    
    $consulta="DELETE FROM clientes WHERE cliente_id= $id";		//Sql para eliminar registros de la base de datos basandose en el id del cliente

    $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
    if($conexion->errno) die($conexion->error);

    if($resultado){			//Si la condicion $resultado se cumple correctamente
        echo'<script type="text/javascript">				
        alert("Cliente Eliminado Correctamente de la Base de Datos");
        window.location.href="lista_clientes.php";
        </script>';
    }else{					//Si no se cumple la condicion de $resultado
        echo "<h2 align='center'>Ha ocurrido un <span class='red'>ERROR </span></h2>";					//Imprime por pantalla un mensaje de error
        echo "<h3>Cliente no eliminado. Vuelva a intentar</h3>";										//Y un mensaje de volver a intentar
        echo "<a href='lista_clientes.php' class'btn btn-primary'>Volver a la Lista</a>";
    }
}
}else{
    echo "No se selecciono desde la fila";
    echo "<br>";
}

if (isset($_POST['enviar'])) {

    for($i=0; $i<=$_POST["accion"];$i++){
        if(isset($_POST["check_$i"])){
            $actual=$_POST["check_$i"];
            echo $actual;
            echo "<br>";
            $consulta="DELETE FROM clientes WHERE cliente_id= $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor

            $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
            if($conexion->errno) die($conexion->error);
            
            
            
        }
    }
    if($resultado){			//Si la condicion $resultado se cumple correctamente
        echo'<script type="text/javascript">				
        alert("Cliente Eliminado Correctamente de la Base de Datos");
        window.location.href="lista_clientes.php";
        </script>';
    }else{					//Si no se cumple la condicion de $resultado
        echo "<h2 align='center'>Ha ocurrido un <span class='red'>ERROR </span></h2>";					//Imprime por pantalla un mensaje de error
        echo "<h3>Cliente no eliminado. Vuelva a intentar</h3>";										//Y un mensaje de volver a intentar
        echo "<a href='lista_clientes.php' class'btn btn-primary'>Volver a la Lista</a>";
    }
}

	?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*if(isset($_POST['check'])){
    $check=$_POST['check'];
    echo "Valor del checkbox: $check";
    }else{
        echo "El checkbox no fue seleccionado";
    }*/
    require '../conexion.php';			//Codigo para conectar con la base de datos por medio del archivo conexion.php
    
    // Para eliminar los clientes
    if(isset($_REQUEST['eliminar'])){
        $id = $_GET['ids'];				//Variable que guarda el id del cliente enviado desde la pagina de lista_cliente.php
        
        if(isset($_REQUEST['ids'])){

        $pre_consulta="DELETE FROM registros WHERE rela_cliente_id= $id";
        $pre_resultado=$conexion->query($pre_consulta);
        if($conexion->errno) die($conexion->error);
        

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
        //echo "No se selecciono desde la fila";
        //echo "<br>";
    }
// Para los elementos seleccionados con los checkboxs de la tabla clientes
    if(isset($_POST['enviar'])) {
        
        for($i=0; $i<=$_POST["accion"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
            
            if(isset($_POST["check_$i"])){
                $actual=$_POST["check_$i"];
                //echo $actual, " actual recibido";
                //echo "<br>";
                $pre_consulta="DELETE FROM registros WHERE rela_cliente_id= $actual";
                $pre_resultado=$conexion->query($pre_consulta);
                if($conexion->errno) die($conexion->error);

                $consulta="DELETE FROM clientes WHERE cliente_id= $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor
    
                $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
                if($conexion->errno) die($conexion->error);

            }
        }
        if($resultado){			//Si la condicion $resultado se cumple correctamente
            echo'<script type="text/javascript">				
            alert("Clientes Eliminado Correctamente de la Base de Datos");
            window.location.href="lista_clientes.php";
            </script>';
        }else{					//Si no se cumple la condicion de $resultado
            ?>
        <script type="text/javascript">
			alert("ERROR. No selecciono ningun elemento para eliminar");
			window.location.href="lista_clientes.php?";
		</script>
    <?php
        }
    }
    //Para eliminar los registros de planilla_cliente.php
    if (isset($_GET['planilla'])) {
        $id = $_GET['ids'];				//Variable que guarda el id del registro enviado desde la pagina de planilla_cliente.php
        if(isset($_REQUEST['idsCliente'])){ 
        $id_cliente=$_REQUEST['idsCliente'];
        }
        if(isset($_REQUEST['ids'])){

        
        $consulta="DELETE FROM registros WHERE registro_id= $id";		//Sql para eliminar registros de la base de datos basandose en el id
    
        $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
        if($conexion->errno) die($conexion->error);
	
        if(isset($_REQUEST['idsCliente'])){         //Si se recibe el parametro cliente_id significa que se envio desde movimientos
            //echo "enviado desde movimientos";

            if($resultado){			//Si la condicion $resultado se cumple correctamente
                ?>
                <script type="text/javascript">
                    alert("Datos Eliminados Correctamente de la Base de Datos");
                    window.location.href="planilla_cliente.php?ids=<?php echo $id_cliente; ?>";
                </script>
            <?php
            }else{					//Si no se cumple la condicion de $resultado
                ?>
                <script type="text/javascript">
                    alert("ERROR. No selecciono ningun elemento para eliminar");
                    window.location.href="planilla_cliente.php?ids=<?php echo $id_cliente; ?>";
                </script>
            <?php
              }
            }else{                      //Si no se recibe el parametro se envio desde la lista de registros  
            //echo "enviado desde registros";
                if($resultado){			//Si la condicion $resultado se cumple correctamente
               
                    ?>
                    <script type="text/javascript">
                        alert("Datos Eliminados Correctamente de la Base de Datos");
                        window.location.href="lista_registros.php";
                    </script>
                <?php
                }else{					//Si no se cumple la condicion de $resultado
                    ?>
                    <script type="text/javascript">
                        alert("ERROR. No selecciono ningun elemento para eliminar");
                        window.location.href="lista_registros.php";
                    </script>
                <?php
                  }
            }

            /*if($resultado){	
                ?>
                <script type="text/javascript">
                alert("Datos Eliminados Correctamente de la Base de Datos");
                window.location.href="planilla_cliente.php?ids=<?php echo $id_cliente; ?>";
                </script>
            <?php
            }else{					//Si no se cumple la condicion de $resultado
                echo "<h2 align='center'>Ha ocurrido un <span class='red'>ERROR </span></h2>";					//Imprime por pantalla un mensaje de error
                echo "<h3>Cliente no eliminado. Vuelva a intentar</h3>";										//Y un mensaje de volver a intentar
                echo "<a href='lista_clientes.php' class'btn btn-primary'>Volver a la Lista</a>";
            }*/
         }
        }
    
    
//Para eliminar los registros de planilla_cliente con los checkboxs 

if (isset($_POST['checkPlanillaCliente'])) {
    
    if(isset($_REQUEST['cliente_id'])){ 
    $id_cliente=$_REQUEST['cliente_id'];
    }
    for($i=0; $i<=$_POST["accion"];$i++){           //La "accion" representa la cantidad de veces que debe repetir el bucle, recibido de la variable $contador
        $accion= $_POST['accion'];
        
        if(isset($_POST["check_$i"])){
            $actual=$_POST["check_$i"];
           
            $consulta="DELETE FROM registros WHERE registro_id= $actual";		//Sql para eliminar registros de la base de datos basandose en el id del proveedor

            $resultado= $conexion->query($consulta);							//Codigo que enlaza la consulta sql con el archivo conexion.php, en el cual se encuentra la informacion de la BD. Permitiendo su ejecucion
            if($conexion->errno) die($conexion->error);
        }
    }

    if(isset($_REQUEST['cliente_id'])){         //Si se recibe el parametro cliente_id significa que se envio desde movimientos

    if($resultado){			//Si la condicion $resultado se cumple correctamente
        
        ?>
        <script type="text/javascript">
			alert("Datos Eliminados Correctamente de la Base de Datos");
			window.location.href="planilla_cliente.php?ids=<?php echo $id_cliente; ?>";
		</script>
    <?php
    }else{					//Si no se cumple la condicion de $resultado
        ?>
        <script type="text/javascript">
			alert("ERROR. No selecciono ningun elemento para eliminar");
			window.location.href="planilla_cliente.php?ids=<?php echo $id_cliente; ?>";
		</script>
    <?php
      }
    }else{                                  //Si no se recibe el parametro se envio desde la lista de registros
        if($resultado){			//Si la condicion $resultado se cumple correctamente
       
            ?>
            <script type="text/javascript">
                alert("Datos Eliminados Correctamente de la Base de Datos");
                window.location.href="lista_registros.php";
            </script>
        <?php
        }else{					//Si no se cumple la condicion de $resultado
            ?>
            <script type="text/javascript">
                alert("ERROR. No selecciono ningun elemento para eliminar");
                window.location.href="lista_registros.php";
            </script>
        <?php
          }
    }
    }

    ?>
</body>
</html>
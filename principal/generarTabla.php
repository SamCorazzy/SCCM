<?php //inicio de un documento php
//Este archivo es utilizado para poder mostrar la tabla en el archivo rBuscarMatricula.js para el archivo
// tabla_prueba.php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
//generamos la consulta
$sql = "SELECT t1.matricula, 
			   t2.nombre_ape,
			   t2.fecha_nac, 
			   t2.lugar_nac, 
			   t2.curp, 
			   t2.mex_por,
			   t2.nombre_ape_padre, 
			   t2.nombre_ape_madre, 
			   t2.estado_civil, 
			   t2.ocupacion, 
			   t2.leer_escrib, 
			   t2.grado_max_estudio,
			   t2.domicilio, 
			   t2.fecha_exped
		FROM 
			   datos_personales t2 LEFT JOIN matricula t1 
			   ON t2.curp = t1.curp ORDER BY t1.matricula DESC LIMIT 50;";//consulta JOIN de sql con un limite de resultados de 50 y ordenados descendintemente
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
	$matricula=$row['matricula'];
	$nombre_ape=$row['nombre_ape'];
	$fecha_nac=$row['fecha_nac'];
	$lugar_nac=$row['lugar_nac'];
	$curp=$row['curp'];
	$mex_por=$row['mex_por'];
	$nombre_ape_padre=$row['nombre_ape_padre'];
	$nombre_ape_madre=$row['nombre_ape_madre'];
	$estado_civil=$row['estado_civil'];
	$ocupacion=$row['ocupacion'];
	$leer_escrib=$row['leer_escrib'];
	$grado_max_estudio=$row['grado_max_estudio'];
	$domicilio=$row['domicilio'];
	$fecha_exped=$row['fecha_exped'];
	
	//Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
	$datosp[] = array('matricula'=> $matricula, 
						'nombre_apellidos'=> $nombre_ape, 
						'fecha_nac'=> $fecha_nac, 
						'lugar_nac'=> $lugar_nac, 
						'curp'=> $curp, 
						'mexicanos_por'=> $mex_por,
						'nombre_ape_padre'=> $nombre_ape_padre,
						'nombre_ape_madre'=> $nombre_ape_madre,
						'estado_civil'=> $estado_civil, 
						'ocupacion'=> $ocupacion, 
						'leer_escribir'=> $leer_escrib,
						'grado_maximo_estudio'=> $grado_max_estudio,
						'domicilio'=> $domicilio,
						'fecha_exped'=> $fecha_exped,
					);

}
	
//desconectamos la base de datos
$close = mysqli_close($con) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

$json_string = json_encode($datosp);//documento json que se usa para almacenar los datos del array
echo $json_string;


?>
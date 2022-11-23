<?php //inicio de un documento php
require 'conexion.php';
//Creamos la conexión

$buscar = $_POST['json'];

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
			   ON t2.curp = t1.curp WHERE t1.matricula LIKE '".$buscar."%';";//consulta JOIN de sql
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta
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
  

//Creamos el JSON
//$verduleria['verduleria'] = $verduleria;
$json_string = json_encode($datosp);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'verduleria.json';
file_put_contents($file, $json_string);
*/
	

?>
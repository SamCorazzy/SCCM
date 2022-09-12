<?php //inicio de un documento php

$server = "localhost";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sccm";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT t1.no_prog,
			   t1.matricula, 
			   t1.nombre_apellidos,
			   t1.fecha_nac, 
			   t1.lugar_nac, 
			   t1.curp, 
			   t1.mexicanos_por,
			   t2.nombre_ape_padre, 
			   t2.nombre_ape_madre, 
			   t2.estado_civil, 
			   t2.ocupacion, 
			   t2.leer_escribir, 
			   t2.grado_maximo_estudio, 
			   t2.domicilio, 
			   t2.fecha_exped
		FROM 
			   datos_personales t2 LEFT JOIN registro_de_personas t1 
			   ON t2.matricula = t1.matricula;";//consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($conexion, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ 
	$no_prog=$row['no_prog'];//relleno del array segun los datos que se desean obtener de la consulta
	$matricula=$row['matricula'];
	$nombre_apellidos=$row['nombre_apellidos'];
	$fecha_nac=$row['fecha_nac'];
	$lugar_nac=$row['lugar_nac'];
	$curp=$row['curp'];
	$mexicanos_por=$row['mexicanos_por'];
	$nombre_ape_padre=$row['nombre_ape_padre'];
	$nombre_ape_madre=$row['nombre_ape_madre'];
	$estado_civil=$row['estado_civil'];
	$ocupacion=$row['ocupacion'];
	$leer_escribir=$row['leer_escribir'];
	$grado_maximo_estudio=$row['grado_maximo_estudio'];
	$domicilio=$row['domicilio'];
	$fecha_exped=$row['fecha_exped'];
	

	$datosp[] = array('no_prog'=> $no_prog, 
						'matricula'=> $matricula, 
						'nombre_apellidos'=> $nombre_apellidos, 
						'fecha_nac'=> $fecha_nac, 
						'lugar_nac'=> $lugar_nac, 
						'curp'=> $curp, 
						'mexicanos_por'=> $mexicanos_por,
						'nombre_ape_padre'=> $nombre_ape_padre,
						'nombre_ape_madre'=> $nombre_ape_madre,
						'estado_civil'=> $estado_civil, 
						'ocupacion'=> $ocupacion, 
						'leer_escribir'=> $leer_escribir,
						'grado_maximo_estudio'=> $grado_maximo_estudio,
						'domicilio'=> $domicilio,
						'fecha_exped'=> $fecha_exped,
					);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
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
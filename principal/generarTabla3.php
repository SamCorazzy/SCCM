<?php //inicio de un documento php
require 'conexion.php';
//generamos la consulta
$sql = "SELECT t1.matricula, 
			   t2.nombre_ape,
			   t1.expedidas,
			   t1.inutilizadas,
               t1.extraviadas 
               FROM 
               datos_personales t2 RIGHT JOIN matricula t1
               ON t2.curp = t1.curp;";//consulta JOIN de sql
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta
	$matricula=$row['matricula'];
	$nombre_ape=$row['nombre_ape'];
	$expedidas=$row['expedidas'];
	$inutilizadas=$row['inutilizadas'];
    $extraviadas=$row['extraviadas'];
	

	$datosp[] = array('matricula'=> $matricula, 
						'nombre_apellidos'=> $nombre_ape, 
						'expedidas'=> $expedidas,
						'inutilizadas'=> $inutilizadas,
                        'extraviadas'=> $extraviadas,
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
<?php //inicio de un documento php
//Este archivo es utilizado para poder mostrar la tabla en el archivo a imprimir tabla2pdf.php para el
// archivo reporte.php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
//generamos la consulta
$sql = "SELECT t1.matricula, 
			   t2.nombre_ape,
			   t2.grado_max_estudio,
			   t2.domicilio,
			   t2.clase
			   FROM
               datos_personales t2 RIGHT JOIN matricula t1
               ON t2.curp = t1.curp;";//consulta JOIN de sql con los datos que se solicitaran de cada tabla
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
	$matricula=$row['matricula'];
	$nombre_ape=$row['nombre_ape'];
	$grado_max_estudio=$row['grado_max_estudio'];
	$domicilio=$row['domicilio'];
	$clase=$row['clase'];
	
	//Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
	$datosp[] = array('matricula'=> $matricula, 
						'nombre_apellidos'=> $nombre_ape, 
						'grado_maximo_estudio'=> $grado_max_estudio,
						'domicilio'=> $domicilio,
						'clase'=> $clase,
					);

}
	
//desconectamos la base de datos
$close = mysqli_close($con) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

$json_string = json_encode($datosp);//documento json que se usa para almacenar los datos del array
echo $json_string;


?>
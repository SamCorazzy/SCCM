<?php //inicio de un documento php

$server = "localhost";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sccm";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT MAX(no_prog) FROM registro_de_personas;";//consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($conexion, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$num = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ 
	$no_prog=$row['no_prog'];//relleno del array segun los datos que se desean obtener de la consulta
	

	$num[] = array('no_prog'=> $no_prog,);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$verduleria['verduleria'] = $verduleria;
$json_string = json_encode($num);//documento json que se usa para almacenar los datos del array
echo $json_string;

?>
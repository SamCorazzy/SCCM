<?php //inicio de un documento php
//generamos la consulta
$Año = date('Y');
$clase = $Año-18;

$sql2 = "SELECT SUM(CASE WHEN t2.grado_estudios='1-sinestudios' THEN 1 ELSE 0 END) AS sinestudios, SUM(CASE WHEN t2.grado_estudios='2-preescolar' THEN 1 ELSE 0 END) AS preescolar, SUM(CASE WHEN t2.grado_estudios='3-primaria' THEN 1 ELSE 0 END) AS primaria, SUM(CASE WHEN t2.grado_estudios='4-secundaria' THEN 1 ELSE 0 END) AS secundaria, SUM(CASE WHEN t2.grado_estudios='5-bachillerato' THEN 1 ELSE 0 END) AS bachillerato, SUM(CASE WHEN t2.grado_estudios='6-licenciatura' THEN 1 ELSE 0 END) AS licenciatura, COUNT(t2.grado_estudios) AS subtotal FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE YEAR(t2.fecha_nac)='".$clase."' LIMIT 1; ";//consulta JOIN de sql

if(!$result2 = mysqli_query($con, $sql2)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosC = array(); //creamos un array

while($row2 = mysqli_fetch_array($result2)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta
	$sinestudios2=$row2['sinestudios'];
	$preescolar2=$row2['preescolar'];
	$primaria2=$row2['primaria'];
	$secundaria2=$row2['secundaria'];
	$bachillerato2=$row2['bachillerato'];
	$licenciatura2=$row2['licenciatura'];
	$subtotal2=$row2['subtotal'];
	
	if($sinestudios2 == null){
		$sinestudios2=0;
	}if($preescolar2 == null){
		$preescolar2=0;
	}if($primaria2 == null){
		$primaria2=0;
	}if($secundaria2 == null){
		$secundaria2=0;
	}if($bachillerato2 == null){
		$bachillerato2=0;
	}if($licenciatura2 == null){
		$licenciatura2=0;
	}if($subtotal2 == null){
		$subtotal2=0;
	}

	$datosC[] = array('sinestudios2'=> $sinestudios2,
						'preescolar2'=> $preescolar2,
						'primaria2'=> $primaria2,
						'secundaria2'=> $secundaria2,
						'bachillerato2'=> $bachillerato2,
						'licenciatura2'=> $licenciatura2,
						'subtotal2'=> $subtotal2,
					);

}
	
//desconectamos la base de datos

//Creamos el JSON
//$verduleria['verduleria'] = $verduleria;
$json_string = json_encode($datosC);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'verduleria.json';
file_put_contents($file, $json_string);
*/
	

?>
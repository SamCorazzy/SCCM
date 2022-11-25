<?php //inicio de un documento php
//generamos la consulta
$Año = date('Y');
$clase = $Año-18;

$sql = "SELECT SUM(CASE WHEN t2.grado_estudios='1-sinestudios' THEN 1 ELSE 0 END) AS sinestudios, SUM(CASE WHEN t2.grado_estudios='2-preescolar' THEN 1 ELSE 0 END) AS preescolar, SUM(CASE WHEN t2.grado_estudios='3-primaria' THEN 1 ELSE 0 END) AS primaria, SUM(CASE WHEN t2.grado_estudios='4-secundaria' THEN 1 ELSE 0 END) AS secundaria, SUM(CASE WHEN t2.grado_estudios='5-bachillerato' THEN 1 ELSE 0 END) AS bachillerato, SUM(CASE WHEN t2.grado_estudios='6-licenciatura' THEN 1 ELSE 0 END) AS licenciatura, COUNT(t2.grado_estudios) AS subtotal FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE YEAR(t2.fecha_nac)<'".$clase."' LIMIT 1; ";//consulta JOIN de sql
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosA = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta
	$sinestudios=$row['sinestudios'];
	$preescolar=$row['preescolar'];
	$primaria=$row['primaria'];
	$secundaria=$row['secundaria'];
	$bachillerato=$row['bachillerato'];
	$licenciatura=$row['licenciatura'];
	$subtotal=$row['subtotal'];
	
	if($sinestudios == null){
		$sinestudios=0;
	}if($preescolar == null){
		$preescolar=0;
	}if($primaria == null){
		$primaria=0;
	}if($secundaria == null){
		$secundaria=0;
	}if($bachillerato == null){
		$bachillerato=0;
	}if($licenciatura == null){
		$licenciatura=0;
	}if($subtotal == null){
		$subtotal=0;
	}

	$datosA[] = array('sinestudios'=> $sinestudios,
						'preescolar'=> $preescolar,
						'primaria'=> $primaria,
						'secundaria'=> $secundaria,
						'bachillerato'=> $bachillerato,
						'licenciatura'=> $licenciatura,
						'subtotal'=> $subtotal,
					);

}
	
//desconectamos la base de datos

//Creamos el JSON
//$verduleria['verduleria'] = $verduleria;
$json_string = json_encode($datosA);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'verduleria.json';
file_put_contents($file, $json_string);
*/
	

?>
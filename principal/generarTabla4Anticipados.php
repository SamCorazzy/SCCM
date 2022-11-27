<?php //inicio de un documento php
//Este archivo es utilizado para poder mostrar la tabla en el archivo a imprimir tabla4pdf.php para el
// archivo reporte.php
$Año = date('Y');//Año actual
$clase = $Año-18;//obteniendo el valor de la clase

$sql = "SELECT SUM(CASE WHEN t2.grado_estudios='1-sinestudios' THEN 1 ELSE 0 END) AS sinestudios, SUM(CASE WHEN t2.grado_estudios='2-preescolar' THEN 1 ELSE 0 END) AS preescolar, SUM(CASE WHEN t2.grado_estudios='3-primaria' THEN 1 ELSE 0 END) AS primaria, SUM(CASE WHEN t2.grado_estudios='4-secundaria' THEN 1 ELSE 0 END) AS secundaria, SUM(CASE WHEN t2.grado_estudios='5-bachillerato' THEN 1 ELSE 0 END) AS bachillerato, SUM(CASE WHEN t2.grado_estudios='6-licenciatura' THEN 1 ELSE 0 END) AS licenciatura, COUNT(t2.grado_estudios) AS subtotal FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE YEAR(t2.fecha_nac)<'".$clase."' LIMIT 1; ";//consulta JOIN de sql para obtener las matriculas anticipadas  
//utlizando como referencia la variable $clase y asi saber cuantos de cada grado maximo de estudios hay
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($con, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$datosA = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
	$sinestudios=$row['sinestudios'];
	$preescolar=$row['preescolar'];
	$primaria=$row['primaria'];
	$secundaria=$row['secundaria'];
	$bachillerato=$row['bachillerato'];
	$licenciatura=$row['licenciatura'];
	$subtotal=$row['subtotal'];
	//En caso que el valor obtenido de cualquier consulta sea null o nulo entonces  la variable correspondiente se le asignara el valor de 0
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
	//Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
	$datosA[] = array('sinestudios'=> $sinestudios,
						'preescolar'=> $preescolar,
						'primaria'=> $primaria,
						'secundaria'=> $secundaria,
						'bachillerato'=> $bachillerato,
						'licenciatura'=> $licenciatura,
						'subtotal'=> $subtotal,
					);

}

$json_string = json_encode($datosA);//documento json que se usa para almacenar los datos del array
echo $json_string;

	

?>
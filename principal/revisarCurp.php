<?php
//inicio de un documento php
require 'conexion.php';
//Creamos la conexión
$curp = $_POST['json'];
$resultado;
    mysqli_set_charset($con, "utf8");
    $obtener = mysqli_query($con, "EXPLAIN SELECT curp FROM datos_personales WHERE curp = '$curp'");
    $num;
    foreach($obtener as $obtener){
        $num = $obtener['rows'];
    }
    if($num == 1){
        $resultado = "S";
    }
    if($num == 0){
        $resultado = "N";
    }

    $json_string = json_encode($resultado);//documento json que se usa para almacenar los datos del array
    echo $json_string;
?>
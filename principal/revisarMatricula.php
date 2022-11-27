<?php
//archivo que se usa para revisar si la matricula esta siendo usada el cual se obtiene del documento 
//formulario.php usando javascript gform.js
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
//Creamos la conexión
$matricula = $_POST['json'];//obtiene el valor de curp del archivo gForm.js 
$resultado;
    mysqli_set_charset($con, "utf8");
    //consulta de tipo explain para saber si la consulta arroja algun resultado
    $obtener = mysqli_query($con, "EXPLAIN SELECT expedidas FROM matricula WHERE matricula = '$matricula'");
    $num;
    foreach($obtener as $obtener){//se hace un ciclo foreach para poder leer los datos
        $num = $obtener['rows'];//se guarda el valor de la fila rows en la variable $num
    }
    if($num == 1){//se compara si tiene un valor de 1 o 0 para poder mandar una respuesta
        $resultado = "S";//respuesta a mandar el cual el archivo gForm.js usara
    }
    if($num == 0){
        $resultado = "N";//respuesta a mandar el cual el archivo gForm.js usara
    }

    $json_string = json_encode($resultado);//documento json que se usa para almacenar los datos del array
    echo $json_string;//se envia la respuesta
?>
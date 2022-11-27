<?php
//archivo que se usa para guardar una matricula extraviada en el archivo gMatriculas.js usado en el 
//archivo matriculas.php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
//convierte el json a array
$datos = json_decode($_POST['json'], true);//obtencion de datos del json decodificandolo
//recorrer el arreglo
foreach ($datos as $datos) {//un metodo for each php para recorrer el arreglo y conseguir los datos
    $matricula = $datos['matricula'];//datos obtenidos
    //La siguiente consulta es ejecutada y almacenado su resultado en la variable $obtener
    //Ya que esta consulta busca obtener cuanto es el valor almacenado en el campo extraviadas de la
    //tabla matricula
    $obtener = mysqli_query($con, "SELECT extraviadas FROM matricula WHERE matricula = '$matricula'");
    $num;//se crea una variable para almacenar el nuevo valor
    foreach($obtener as $obtener){//se hace un ciclo foreach para poder leer los datos
        $num = $obtener['extraviadas'];//se asigna l valor a la variable $num
    }
    $extraviadas = $num + 1;//se le suma 1 a la variable $num
    //Luego se guardara ese nuevo valor ejecutando un update a ese campo 
    $guardar = mysqli_query($con, "UPDATE matricula SET extraviadas = '$extraviadas' WHERE matricula = '$matricula'");
}

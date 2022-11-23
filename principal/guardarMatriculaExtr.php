<?php
require 'conexion.php';
//convierte el json a array
$datos = json_decode($_POST['json'], true);//obtencion de datos del json
//recorrer el arreglo
foreach ($datos as $datos) {
    $matricula = $datos['matricula'];
    //posiblemente cambiar a update
    $obtener = mysqli_query($con, "SELECT extraviadas FROM matricula WHERE matricula = '$matricula'");
    $num;
    foreach($obtener as $obtener){
        $num = $obtener['extraviadas'];
    }
    $extraviadas = $num + 1;
    $guardar = mysqli_query($con, "UPDATE matricula SET extraviadas = '$extraviadas' WHERE matricula = '$matricula'");
    // echo $guardar,"     ", $extraviadas;
}

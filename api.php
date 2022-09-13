<?php
require 'conexion.php';
//convierte el json a array
$datos = json_decode($_POST['json'], true);//obtencion de datos del json
//recorrer el arreglo
foreach ($datos as $datos) {
     $nombre_ape_padre = $datos['nombre_ape_padre'];
     $nombre_ape_madre = $datos['nombre_ape_madre'];
     $estado_civil = $datos['estado_civil'];
     $ocupacion = $datos['ocupacion'];
     $leer_escribir = $datos['leer_escribir'];
     $grado_maximo_estudio = $datos['grado_maximo_estudio'];
     $domicilio = $datos['domicilio'];
     $fecha_exped = $datos['fecha_exped'];
     $matricula = $datos['matricula'];
     
     $nombre_apellidos = $datos['nombre_apellidos'];
     $fecha_nac = $datos['fecha_nac'];
     $lugar_nac = $datos['lugar_nac'];
     $curp = $datos['curp'];
     $mexicanos_por = $datos['mexicanos_por'];

     //posiblemente cambiar a update

     $guardar = mysqli_query($con, "INSERT INTO registro_de_personas (matricula, 
                                                                      nombre_apellidos, 
                                                                      fecha_nac, 
                                                                      lugar_nac, 
                                                                      curp, 
                                                                      mexicanos_por) 
          VALUES ('$matricula', '$nombre_apellidos', '$fecha_nac', '$lugar_nac', '$curp', '$mexicanos_por')");
          //sentencia para insertar datos en la base de datos
     $guardar = mysqli_query($con, "INSERT INTO datos_personales (nombre_ape_padre, 
                                                                  nombre_ape_madre, 
                                                                  estado_civil, 
                                                                  ocupacion, 
                                                                  leer_escribir, 
                                                                  grado_maximo_estudio, 
                                                                  domicilio, 
                                                                  fecha_exped, 
                                                                  matricula)  
          VALUES ('$nombre_ape_padre', '$nombre_ape_madre', '$estado_civil', '$ocupacion', '$leer_escribir', 
                  '$grado_maximo_estudio', '$domicilio', '$fecha_exped', '$matricula')");
}

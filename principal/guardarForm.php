<?php
//Este archivo sirve para guardar los datos que obtiene el archivo gForm.js del archivo formulario.php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
//convierte el json a array
$datos = json_decode($_POST['json'], true);//obtencion de datos del json decodificandolos
//recorrer el arreglo
foreach ($datos as $datos) {//un metodo for each php para recorrer el arreglo y conseguir los datos
     $matricula = $datos['matricula'];//datos obtenidos
     $nombre_apellidos = $datos['nombre_apellidos'];
     $fecha_nac = $datos['fecha_nac'];
     $lugar_nac = $datos['lugar_nac'];
     $curp = $datos['curp'];
     $mexicanos_por = $datos['mexicanos_por'];
     $nombre_ape_padre = $datos['nombre_ape_padre'];
     $nombre_ape_madre = $datos['nombre_ape_madre'];
     $estado_civil = $datos['estado_civil'];
     $ocupacion = $datos['ocupacion'];
     $leer_escribir = $datos['leer_escribir'];
     $grado_maximo_estudio = $datos['grado_maximo_estudio'];
     $grado_estudios = $datos['grado_estudios'];
     $domicilio = $datos['domicilio'];
     $fecha_exped = $datos['fecha_exped'];
     $clase = $datos['clase'];

     //ejecuta una consulta sql para guardar los datos que fueron obtenidos en cada ciclo foreach
     //La siguiente consulta los guarda en la tabla matricula
     $guardar = mysqli_query($con, "INSERT INTO matricula (matricula, curp, expedidas) 
          VALUES ('$matricula', '$curp', '1')");
          //sentencia para insertar datos en la base de datos
     //La siguiente consulta los guarda en la tabla datos_personales
     $guardar = mysqli_query($con, "INSERT INTO datos_personales (
     nombre_ape, 
     fecha_nac, 
     lugar_nac, 
     curp, 
     mex_por,
     nombre_ape_padre, 
     nombre_ape_madre, 
     estado_civil, 
     ocupacion, 
     leer_escrib, 
     grado_max_estudio, 
     grado_estudios, 
     domicilio, 
     fecha_exped, 
     clase) 
     VALUES ('$nombre_apellidos', '$fecha_nac', '$lugar_nac', '$curp', '$mexicanos_por', '$nombre_ape_padre', '$nombre_ape_madre', '$estado_civil', '$ocupacion', '$leer_escribir', 
     '$grado_maximo_estudio', '$grado_estudios', '$domicilio', '$fecha_exped', '$clase')");
}

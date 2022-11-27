<?php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
$datos = json_decode($_POST['json'], true);//obtiene un array el cual lo obtiene del archivo rReporte.js 
//y lo decodifica para almacenarlo en esta variable $datos
$dataTipo = array();//see crea un nuevo array en donde se almacenaran los datos que se obtendran de este archivo

foreach ($datos as $datos) {
    $año = $datos['año'];//se obtiene un elemento del array datos el cual es el año para poder usarla en las consultas siguientes
    //Consulta en la cual se obtendra el conteo total de matriculas por mes y año han sido expedidas
    //Enero
    $enero = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=1 AND YEAR(fecha_exped)='$año'; "));
    //De igual forma Febrero
    $febrero = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=2 AND YEAR(fecha_exped)='$año'; "));
    //De igual forma con los siguientes meses
    $marzo = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=3 AND YEAR(fecha_exped)='$año'; "));

    $abril = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=4 AND YEAR(fecha_exped)='$año'; "));

    $mayo = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=5 AND YEAR(fecha_exped)='$año'; "));

    $junio = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=6 AND YEAR(fecha_exped)='$año'; "));

    $julio = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=7 AND YEAR(fecha_exped)='$año'; "));

    $agosto = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=8 AND YEAR(fecha_exped)='$año'; "));

    $septiembre = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=9 AND YEAR(fecha_exped)='$año'; "));

    $octubre = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=10 AND YEAR(fecha_exped)='$año'; "));

    $noviembre = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=11 AND YEAR(fecha_exped)='$año'; "));

    $diciembre = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t1.matricula) matricula FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE MONTH(fecha_exped)=12 AND YEAR(fecha_exped)='$año'; "));

    //En caso que el valor obtenido de cualquier consulta sea null o nulo entonces  la variable 
    //correspondiente se le asignara el valor de 0
    if($enero['matricula'] == null){
        $enero['matricula'] = 0;
    }
    if($febrero['matricula'] == null){
        $febrero['matricula'] = 0;
    }
    if($marzo['matricula'] == null){
        $marzo['matricula'] = 0;
    }
    if($abril['matricula'] == null){
        $abril['matricula'] = 0;
    }
    if($mayo['matricula'] == null){
        $mayo['matricula'] = 0;
    }
    if($junio['matricula'] == null){
        $junio['matricula'] = 0;
    }
    if($julio['matricula'] == null){
        $julio['matricula'] = 0;
    }
    if($agosto['matricula'] == null){
        $agosto['matricula'] = 0;
    }
    if($septiembre['matricula'] == null){
        $septiembre['matricula'] = 0;
    }
    if($octubre['matricula'] == null){
        $octubre['matricula'] = 0;
    }
    if($noviembre['matricula'] == null){
        $noviembre['matricula'] = 0;
    }
    if($diciembre['matricula'] == null){
        $diciembre['matricula'] = 0;
    }
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos
    $dataTipo = array(0 => $enero['matricula'],
                        1 => $febrero['matricula'],
                        2 => $marzo['matricula'],
                        3 => $abril['matricula'],
                        4 => $mayo['matricula'],
                        5 => $junio['matricula'],
                        6 => $julio['matricula'],
                        7 => $agosto['matricula'],
                        8 => $septiembre['matricula'],
                        9 => $octubre['matricula'],
                        10 => $noviembre['matricula'],
                        11 => $diciembre['matricula'],
    );

}
$close = mysqli_close($con);//se cierra la conexión con la base de datos
echo json_encode($dataTipo);//documento json que se usa para almacenar los datos del array

?>
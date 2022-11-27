<?php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
$datos = json_decode($_POST['json'], true);//obtiene un array el cual lo obtiene del archivo rReporte.js 
//y lo decodifica para almacenarlo en esta variable $datos
$dataTipo = array();//see crea un nuevo array en donde se almacenaran los datos que se obtendran de este archivo

foreach ($datos as $datos) {
    $año = $datos['año'];//se obtiene un elemento del array datos el cual es el año para poder usarla en las consultas siguientes
    $mes = $datos['mes'];//se obtiene un elemento del array datos el cual es el mes para poder usarla en las consultas siguientes
    //se obtiene la suma del total de matriculas expedidas segun el año y mes en el cual fueron expedidas y guardado en la variable $expedidas
    $expedidas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.expedidas) AS expedidas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));
    //De igual forma las inutilizadas
    $inutilizadas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.inutilizadas) AS inutilizadas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));
    //De igual forma las extraviadas
    $extraviadas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.extraviadas) AS extraviadas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));
    //En caso que el valor obtenido de cualquier consulta sea null o nulo entonces  la variable 
    //correspondiente se le asignara el valor de 0
    if($expedidas['expedidas'] == null){
        $expedidas['expedidas'] = 0;
    }
    if($inutilizadas['inutilizadas'] == null){
        $inutilizadas['inutilizadas'] = 0;
    }
    if($extraviadas['extraviadas'] == null){
        $extraviadas['extraviadas'] = 0;
    }
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $dataTipo = array(0 => $expedidas['expedidas'],
                        1 => $inutilizadas['inutilizadas'],
                        2 => $extraviadas['extraviadas'],
    );

}
$close = mysqli_close($con);//se cierra la conexión con la base de datos
echo json_encode($dataTipo);//documento json que se usa para almacenar los datos del array

?>
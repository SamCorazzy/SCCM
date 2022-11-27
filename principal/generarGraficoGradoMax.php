<?php
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
$datos = json_decode($_POST['json'], true);//obtiene un array el cual lo obtiene del archivo rReporte.js 
//y lo decodifica para almacenarlo en  esta variable $datos
$dataTipo = array();//se crea un nuevo array en donde se almacenaran los datos que se obtendran de este archivo

foreach ($datos as $datos) {
    $año = $datos['año'];//se obtiene un elemento del array datos el cual es el año para poder usarla en las consultas siguientes
    //consultas para obtener las matriculas que tengan el dato de 1-sinestudios verificando si existee primero la curp en la tabla matricula y datos_personales y que sea en una fecha especifica la cual se obtiene de la variablee $año y lo que se obtenga de esta consulta se guardara en la variable $sinestudios
    $sinestudios = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) sinestudios FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='1-sinestudios' AND YEAR(fecha_exped)='$año' LIMIT 1;"));
    //Lo obtenido de esta consulta se guardara en la variable $preescolar haciendo referencia a que los datos que se obtienen sera un conteo de los que tienen como grado maximo preescolar
    $preescolar = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) preescolar FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='2-preescolar' AND YEAR(fecha_exped)='$año' LIMIT 1;"));
    //De igual forma con la siguiente consulta se obtendra el conteo del total de grado maximo primaria 
    $primaria = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) primaria FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='3-primaria' AND YEAR(fecha_exped)='$año' LIMIT 1;"));
    //De igual forma con la siguiente consulta se obtendra el conteo del total de grado maximo secundaria
    $secundaria = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) secundaria FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='4-secundaria' AND YEAR(fecha_exped)='$año' LIMIT 1;"));
    //De igual forma con la siguiente consulta se obtendra el conteo del total de grado maximo bachillerato
    $bachillerato = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) bachillerato FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='5-bachillerato' AND YEAR(fecha_exped)='$año' LIMIT 1;"));
    //De igual forma con la siguiente consulta se obtendra el conteo del total de grado maximo licenciatura
    $licenciatura = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) licenciatura FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='6-licenciatura' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    //En caso que el valor obtenido de cualquier consulta sea null o nulo entonces  la variable correspondiente se le asignara el valor de 0
    if($sinestudios['sinestudios'] == null){
        $sinestudios['sinestudios'] = 0;
    }
    if($preescolar['preescolar'] == null){
        $preescolar['preescolar'] = 0;
    }
    if($primaria['primaria'] == null){
        $primaria['primaria'] = 0;
    }
    if($secundaria['secundaria'] == null){
        $secundaria['secundaria'] = 0;
    }
    if($bachillerato['bachillerato'] == null){
        $bachillerato['bachillerato'] = 0;
    }
    if($licenciatura['licenciatura'] == null){
        $licenciatura['licenciatura'] = 0;
    }

    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $dataTipo = array(0 => $sinestudios['sinestudios'],
                        1 => $preescolar['preescolar'],
                        2 => $primaria['primaria'],
                        3 => $secundaria['secundaria'],
                        4 => $bachillerato['bachillerato'],
                        5 => $licenciatura['licenciatura'],
    );

}
$close = mysqli_close($con);//se cierra la conexión con la base de datos
echo json_encode($dataTipo);//documento json que se usa para almacenar los datos del array

?>
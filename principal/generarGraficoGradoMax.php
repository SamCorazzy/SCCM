<?php
require 'conexion.php';
$datos = json_decode($_POST['json'], true);
$dataTipo = array();

foreach ($datos as $datos) {
    $año = $datos['año'];

    $sinestudios = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) sinestudios FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='1-sinestudios' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    $preescolar = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) preescolar FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='2-preescolar' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    $primaria = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) primaria FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='3-primaria' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    $secundaria = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) secundaria FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='4-secundaria' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    $bachillerato = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) bachillerato FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='5-bachillerato' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

    $licenciatura = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(t2.grado_estudios) licenciatura FROM matricula t1 RIGHT JOIN datos_personales t2 ON t1.curp=t2.curp WHERE t2.grado_estudios='6-licenciatura' AND YEAR(fecha_exped)='$año' LIMIT 1;"));

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
    $dataTipo = array(0 => $sinestudios['sinestudios'],
                        1 => $preescolar['preescolar'],
                        2 => $primaria['primaria'],
                        3 => $secundaria['secundaria'],
                        4 => $bachillerato['bachillerato'],
                        5 => $licenciatura['licenciatura'],
    );

}
$close = mysqli_close($con);
echo json_encode($dataTipo);//documento json que se usa para almacenar los datos del array

?>
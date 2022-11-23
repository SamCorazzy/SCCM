<?php
require 'conexion.php';
$datos = json_decode($_POST['json'], true);
echo("<script>console.log('PHP: ".$_POST['json']."');</script>");
$dataTipo = array();
$x=0;

foreach ($datos as $datos) {
    $año = $datos['año'];
    $mes = $datos['mes'];
    echo("console.log('PHP: ".++$x." ".$año." ".$mes."');");

    $expedidas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.expedidas) AS expedidas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));

    $inutilizadas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.inutilizadas) AS inutilizadas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));

    $extraviadas = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(t2.extraviadas) AS extraviadas FROM matricula t2 LEFT JOIN datos_personales t1 ON t2.curp = t1.curp WHERE MONTH(fecha_exped)='$mes' AND YEAR(fecha_exped) = '$año' LIMIT 1;"));
    $dataTipo = array(0 => $expedidas['expedidas'],
                        1 => $inutilizadas['inutilizadas'],
                        2 => $extraviadas['extraviadas'],
    );

}
$close = mysqli_close($con);
echo json_encode($dataTipo);//documento json que se usa para almacenar los datos del array

?>
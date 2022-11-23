<?php
require('conexion.php');
$tipo       = $_FILES['matriculas']['type'];
$tamanio    = $_FILES['matriculas']['size'];
$archivotmp = $_FILES['matriculas']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $matricula = !empty($datos[0])  ? ($datos[0]) : '';
       
if( !empty($matricula) ){
    $checkemail_duplicidad = ("SELECT matricula FROM matricula WHERE matricula='".($matricula)."' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 
$expedidas=0;
$inutilizadas=0;
$extraviadas=0;
$curp=" ";
$insertarData = "INSERT INTO matricula( 
   matricula, expedidas, inutilizadas, extraviadas,curp
) VALUES(
    '$matricula',$expedidas ,$inutilizadas,$extraviadas,'$curp'
)";
mysqli_query($con, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE matricula SET 
        matricula='" .$matricula. "',expedidas=".$expedidas.", inutilizadas=".$inutilizadas.", extraviadas=".$extraviadas.",curp='".$curp."'
        WHERE matricula='".$matricula."'
    ");
    $result_update = mysqli_query($con, $updateData);
    } 
  }

 $i++;
}
echo "<script>
window.location = './matriculas.php';
</script>
";

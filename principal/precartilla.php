<?php

ob_start();
$Año = date('Y'); //Obtener Año actual
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");//Obtener Mes
$mes = $meses[date('n')-1];//Variable para guardar el mes de la fecha actual
$dia = date('j');//Variable para obtener el dia del mes de la fecha actual


$a = json_decode($_POST['matricula'],true);
echo $a;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCCM - REPORTES</title>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><!-- script para la version jquery usada -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800&display=swap" rel="stylesheet">
    <!--LETRA-->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<!--LETRA-->
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        font-size: 6px;
        
    }
</style>


<body>
    <div>

         <div style="line-height: 5px;"> <!--interlineado -->
                <center><p>&nbsp; &nbsp; 2000</p></center>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  JUAN CARLOS RUPERTO ZARATE</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     06 DE SEPTIEMBRE DE 2000</p> 
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;SAN FELIPE JALAPA DE DIAZ TUXTEPEC OAXACA</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; JOSE RUPERTO MARIANO</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; AGRIPINA ZARATE GUADAKUPE</p>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SOLTERO</p>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ESTUDIANTE</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;SI &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    FOZS000917MOCLXNA9</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; BACHILLERATO TERMINADO</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; CALLE REFORMA S/N COL PINO SUAREZ SAN PEDRO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; IXCATLAN, OAXCA CP 68460</p>
                <br><br><br><br><br><br><br><br>
                <p>SAN JUAN BAUTISTA TUXTEPEC, OAXACA A <?php echo $dia, " DE ", $mes, " DEL ", $Año?></p>
                <p></p>
            </h4>
        </div><br>
            </h4>
        </div>

    </div>

</body>
</html>

<?php
$html = ob_get_clean();
//echo $html;

require_once 'libreria\dompdf\autoload.inc.php'; //..libreria\dompdf\autoload.inc.php
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true)); //para imagenes
$dompdf->setOptions($options);

$dompdf->loadHtml($html); //guarda el archivo html o un mensaje

//$dompdf->setPaper('letter');
//$dompdf->setPaper('A4', 'landscape');

//Tamaño personalizado
$dompdf->set_paper(array(0,0,226.760,283.455));

$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>
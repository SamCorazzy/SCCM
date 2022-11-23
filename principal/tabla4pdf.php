<?php

ob_start();

$Año = date('Y'); //Obtener Año actual
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");//Obtener Mes
$mes = $meses[date('n')-1];//Variable para guardar el mes de la fecha actual
$dia = date('j');//Variable para obtener el dia del mes de la fecha actual



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
        font-size: 16px;
    }
</style>


<body>

    <div>
        <br><br>
        <div>
            <h4 style="text-align: center;">JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAXACA
            </h4><br>
            <p>
                INFORME DE EFECTIVOS ALISTADOS EN LA JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAX. CORRESPONDIENTE AL AÑO <?php echo $Año?>
            </p><br>
        </div><br>

        <div>
            <table class="content-table, ta" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black; margin: 0 auto">
                <thead>
                    <tr>
                        <th>CLASE</th>
                        <th>ANALFANBETAS</th>
                        <th>PRIMARIA</th>
                        <th>SECUNDARIA</th>
                        <th>BACHILLERATO</th>
                        <th>LICECIATURA</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <th>ANTICIPADOS</th>
                            <th>g</th>
                            <th>g</th>
                            <th>g</th>
                            <th>g</th>
                            <th>g</th>
                            <th>g</th>

                        </tr>

                        <tr>
                            <th>CLASE</th>
                            <th>a</th>
                            <th>a</th>
                            <th>a</th>
                            <th>a</th>
                            <th>a</th>
                            <th>a</th>
                        </tr>
                        <tr>
                            <th>REMISOS</th>
                            <th>b</th>
                            <th>b</th>
                            <th>b</th>
                            <th>b</th>
                            <th>b</th>
                            <th>b</th>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    
                </tbody>
            </table><br><br>
            <p style="text-align: center;">SAN JUAN BAUSTISTA TUSTEPEC, OAXACA; <?php echo $dia, " DE ", $mes, " DEL ", $Año?></p><br>

            <h4 style="text-align: center;">PRESIDENTE DE LA JUNTA MUNICIPAL DE RECLUTAMIENTO</h4><br>

            <h4 style="text-align: center;">C. IRINEO</h4>
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
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>
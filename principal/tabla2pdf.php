<?php

ob_start();

include("generarTabla2.php");
// $datosp = json_decode($json_string, true);
$Año= date('Y') - 18; 
$a = 0;

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
        font-size: 12px;
    }
</style>


<body>
    <div>

        <div>
            <h4 style="text-align: center;">LISTA INICIAL DEL SORTEO<br>
                JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAXACA<br>
                LISTA QUE SE ELABORA COMO RESULTADO DEL REGISTRO DEL PESONAL DEL SERVICIO MILITAR NACIONAL<br>
                CLASE "<?php echo $Año?>", ANTICIPADOS Y REMISOS QUE PARTICIPARAN EN EL SORTEO DEL PRESENTE AÑO
            </h4>
        </div><br>

        <div>
            <table class="content-table" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black;">
                <thead>
                    <tr>
                        <th>No. PROG</th>
                        <th>MATRICULA</th>
                        <th>NOMBRE</th>
                        <th>RESULTADO</th>
                        <th>CLASE</th>
                        <th>GRADO MAXIMO DE ESTUDIOS</th>
                        <th>DOMICILIO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datosp as $perso) { ?>
                        <tr>
                            <th><?php echo ++$a ?></th>
                            <th><?php echo $perso['matricula']; ?></th>
                            <th><?php echo $perso['nombre_apellidos']; ?></th>
                            <th>aaaaa</th>
                            <th><?php echo $perso['clase']; ?></th>
                            <th><?php echo $perso['grado_maximo_estudio']; ?></th>
                            <th><?php echo $perso['domicilio']; ?></th>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
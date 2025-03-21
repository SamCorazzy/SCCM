<?php
//archivo que sirve para imprimir el primer reporte o reporte general que se usa en el archivo 
//reporte.php

ob_start();//inicia el metodo ob_start() para poder imprimir esta documento

include("generarTabla.php");//utiliza el archivo para poder interacturar con la base de datos
// $datosp = json_decode($json_string,true); //con o sin esta linea de codigo funciona 
$Año= date('Y') - 18; //Variable para obtener el año o clase a cual pertenece este reporte
?>

<!-- se abre un documento HTML para poder modificar como se vera el aspecto del documento a imprimir -->

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
            <h4 style="text-align: center;">LIBRO DE REGISTRO <br>
                JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAXACA <br>
                LIBRO QUE SE ELABORA COMO RESULTADO DEL REGISTRO DEL PESONAL DEL SERVICIO MILITAR NACIONAL<br>
                CLASE "<?php echo $Año?>", ANTICIPADOS Y PERMISOS QUE PARTICIPARAN EN EL SORTEO DEL PRESENTE AÑO
            </h4>
        </div><br>

        <div>
            <table class="content-table" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black;">
                <thead>
                    <tr>
                        <th>MATRICULA</th>
                        <th class=>NOMBRE(S) Y APELLIDOS PATERNO Y MATERNO</th>
                        <th class=>FECHA DE NACIMI<BR> ENTO</th>
                        <th class=>LUGAR DE NACIMIENTO</th>
                        <th>CURP</th>
                        <th>MEXICANOS POR:</th>
                        <th class=>NOMBRE Y APELLI <BR> DOS DEL PADRE</th>
                        <th class=>NOMBRE Y APELLI <BR> DOS DE LA MADRE</th>
                        <th>ESTADO CIVIL</th>
                        <th>OCUPACION</th>
                        <th>SABE LEER Y ESCRI<BR> BIR</th>
                        <th class=>GRADO MAXIMO DE ESTUDIOS</th>
                        <th class=>DOMICILIO</th>
                        <th class=>FECHA DE EXPED</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datosp as $perso){ //se hace un ciclo foreach para poder leer los datos ?>
                        <tr>
                            <th><?php echo $perso['matricula'];//dato php obtenido ?></th>
                            <th><?php echo $perso['nombre_apellidos']; ?></th>
                            <th><?php echo $perso['fecha_nac']; ?></th>
                            <th><?php echo $perso['lugar_nac']; ?></th>
                            <th><?php echo $perso['curp']; ?></th>
                            <th><?php echo $perso['mexicanos_por']; ?></th>
                            <th><?php echo $perso['nombre_ape_padre']; ?></th>
                            <th><?php echo $perso['nombre_ape_padre']; ?></th>
                            <th><?php echo $perso['estado_civil']; ?></th>
                            <th><?php echo $perso['ocupacion']; ?></th>
                            <th><?php echo $perso['leer_escribir']; ?></th>
                            <th><?php echo $perso['grado_maximo_estudio']; ?></th>
                            <th><?php echo $perso['domicilio']; ?></th>
                            <th><?php echo $perso['fecha_exped']; ?></th>
                        </tr>
                    <?php }//cierre de ciclo foreach ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>

<?php
//El siguiente metodo no permite que el documento html se muestre en cambio muostrara la vista de impresión
$html = ob_get_clean();
//echo $html;

//requiere el uso de la libreria Dompdf
require_once 'libreria\dompdf\autoload.inc.php'; //..libreria\dompdf\autoload.inc.php
use Dompdf\Dompdf;
//inicializa una nueva función Dompdf
$dompdf = new Dompdf();
//obtiene las funciones que requiere en caso de usarlas
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true)); //para imagenes
$dompdf->setOptions($options);

$dompdf->loadHtml($html); //guarda el archivo html o un mensaje

//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');//medidas del documento pdf que generara

$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>
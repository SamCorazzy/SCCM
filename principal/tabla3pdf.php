<?php
//archivo que sirve para imprimir el tercer reporte que se usa en el archivo reporte.php
ob_start();//inicia el metodo ob_start() para poder imprimir esta documento

include("generarTabla3.php");//utiliza el archivo para poder interacturar con la base de datos
$a = 0;//se inicializa una variable a usar en este archivo 
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
            <h4 style="text-align: center;"><div>
            <p style="text-align: center;">BALANCE DE LAS CARTILLAS EXPEDIDAS</p>
               <p style="text-align: center;">JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAXACA <br>
               BALANCE DE LAS CARTILLAS DE IDENTIDAD MILITAR QUE SE FUERON MINISTRADAS A ESTA JUNTA MUNICIPAL DE <br>
               RECLUTAMIENTO, POR LA OFICINA DE RECLUTAMIENTO DE LA 28/a. ZONA MILITAR PARA SER EXPEDIDAS AL <br>
               PERSONAL DE SOLDADOS DEL SERVICIO MILITAR NACIONAL CLASE "<?php echo $Año?>", ANTICIPADOS Y REMISOS.</p> 
                
            </h4>
        </div><br>
            </h4>
        </div><br>

        <div>
            <table class="content-table" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black; margin: 0 auto">
                <thead>
                    <tr>
                        <th>No. PROG</th>
                        <th>MATRICULA</th>
                        <th>NOMBRE</th>
                        <td colspan="3" style="text-align: center;">CARTILLAS
                            <table style="border-color: black;">
                                <tr>
                                <td>EXPEDIDAS</td>
                                <td>INUTILIZADAS</td>
                                <td>EXTRAVIADAS</th>
                            </tr>
                        </table>
                            
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($datosp as $perso) { //se hace un ciclo foreach para poder leer los datos ?>
                        <tr>
                            <th><?php echo ++$a ?></th>
                            <th><?php echo $perso['matricula']; //datos php obtenidos ?></th>
                            <th><?php echo $perso['nombre_apellidos']; ?></th>
                            <th><?php echo $perso['expedidas']; ?></th>
                            <th><?php echo $perso['inutilizadas']; ?></th>
                            <th><?php echo $perso['extraviadas']; ?></th>

                        </tr>
                    <?php } //cierre de ciclo foreach  ?>
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

$dompdf->setPaper('letter');//medidas del documento pdf que generara
//$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>
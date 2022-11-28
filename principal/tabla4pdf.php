<?php
//archivo que sirve para imprimir el cuarto reporte que se usa en el archivo reporte.php
ob_start();//inicia el metodo ob_start() para poder imprimir esta documento
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos

$Año = date('Y'); //Obtener Año actual
$meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"); //Obtener Mes
$mes = $meses[date('n') - 1]; //Variable para guardar el mes de la fecha actual
$dia = date('j'); //Variable para obtener el dia del mes de la fecha actual
$sumasinestudios = 0;//se iniciam variables para poder obtener la suma de vada una de las columnas de la 
//tabla a generar
$sumaspreescolar = 0;
$sumasprimaria = 0;
$sumassecundaria = 0;
$sumasbachillerato = 0;
$sumaslicanciatura = 0;
$subtotalTotal = 0;
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
                INFORME DE EFECTIVOS ALISTADOS EN LA JUNTA MUNICIPAL DE RECLUTAMIENTO DE SAN JUAN BAUTISTA TUXTEPEC, OAX. CORRESPONDIENTE AL AÑO <?php echo $Año ?>
            </p><br>
        </div><br>

        <div>
            <table class="content-table, ta" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black; margin: 0 auto">
                <thead>
                    <tr>
                        <th>CLASE</th>
                        <th>ANALFANBETAS</th>
                        <th>PREESCOLAR</th>
                        <th>PRIMARIA</th>
                        <th>SECUNDARIA</th>
                        <th>BACHILLERATO</th>
                        <th>LICECIATURA</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('generarTabla4Anticipados.php'); //utiliza el archivo para poder obtener los datos de su consulta
                    foreach ($datosA as $A)  { //se hace un ciclo foreach para poder leer los datos
                    ?>
                        <tr>
                            <th>ANTICIPADOS</th>
                            <th><?php $sumasinestudios = $A['sinestudios'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['sinestudios']; //datos php obtenidos ?></th>
                            <th><?php $sumaspreescolar = $A['preescolar'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['preescolar']; //datos php obtenidos ?></th>
                            <th><?php $sumasprimaria = $A['primaria'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['primaria']; //datos php obtenidos ?></th>
                            <th><?php $sumassecundaria = $A['secundaria'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['secundaria']; //datos php obtenidos ?></th>
                            <th><?php $sumasbachillerato = $A['bachillerato'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['bachillerato']; //datos php obtenidos ?></th>
                            <th><?php $sumaslicanciatura = $A['licenciatura'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['licenciatura']; //datos php obtenidos ?></th>
                            <th><?php $subtotalTotal = $A['subtotal'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                echo $A['subtotal']; //datos php obtenidos ?></th>

                        <?php } //cierre de ciclo foreach de anticipados ?>
                        </tr>

                        <tr>
                            <th>CLASE</th>
                            <?php
                            include('generarTabla4Clase.php'); //utiliza el archivo para poder obtener los datos de su consulta
                            foreach ($datosC as $C) {//se hace un ciclo foreach para poder leer los datos
                            ?>
                                <th><?php $sumasinestudios += $C['sinestudios2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['sinestudios2']; ?></th>
                                <th><?php $sumaspreescolar += $C['preescolar2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['preescolar2']; //datos php obtenidos ?></th>
                                <th><?php $sumasprimaria += $C['primaria2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['primaria2']; //datos php obtenidos ?></th>
                                <th><?php $sumassecundaria += $C['secundaria2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['secundaria2']; //datos php obtenidos ?></th>
                                <th><?php $sumasbachillerato += $C['bachillerato2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['bachillerato2']; //datos php obtenidos ?></th>
                                <th><?php $sumaslicanciatura += $C['licenciatura2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['licenciatura2']; //datos php obtenidos ?></th>
                                <th><?php $subtotalTotal += $C['subtotal2'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $C['subtotal2']; //datos php obtenidos ?></th>
                            <?php } //cierre de ciclo foreach de clase ?>

                        </tr>
                        <tr>
                            <th>REMISOS</th>
                            <?php
                            include('generarTabla4Remisos.php'); //utiliza el archivo para poder obtener los datos de su consulta
                            foreach ($datosR as $R) {//se hace un ciclo foreach para poder leer los datos
                            ?>
                                <th><?php $sumasinestudios += $R['sinestudios'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['sinestudios']; //datos php obtenidos ?></th>
                                <th><?php $sumaspreescolar += $R['preescolar'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['preescolar']; //datos php obtenidos ?></th>
                                <th><?php $sumasprimaria += $R['primaria'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['primaria']; //datos php obtenidos ?></th>
                                <th><?php $sumassecundaria += $R['secundaria'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['secundaria']; //datos php obtenidos ?></th>
                                <th><?php $sumasbachillerato += $R['bachillerato'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['bachillerato']; //datos php obtenidos ?></th>
                                <th><?php $sumaslicanciatura += $R['licenciatura'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['licenciatura']; //datos php obtenidos ?></th>
                                <th><?php $subtotalTotal += $R['subtotal'];//aqui se estan guardando los datos en las variables para sumar el total por columna de la tabla
                                    echo $R['subtotal']; //datos php obtenidos ?></th>

                            <?php } //cierre de ciclo foreach de remisos ?>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <th><?php echo $sumasinestudios //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $sumaspreescolar //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $sumasprimaria //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $sumassecundaria //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $sumasbachillerato //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $sumaslicanciatura //aqui se imprimimen las sumas de cada columna ?></th>
                            <th><?php echo $subtotalTotal //aqui se imprimimen las sumas de cada columna ?></th>
                        </tr>

                </tbody>
            </table><br><br>
            <p style="text-align: center;">SAN JUAN BAUSTISTA TUSTEPEC, OAXACA; <?php echo $dia, " DE ", $mes, " DEL ", $Año ?></p><br>

            <h4 style="text-align: center;">PRESIDENTE DE LA JUNTA MUNICIPAL DE RECLUTAMIENTO</h4><br>

            <h4 style="text-align: center;">C. IRINEO MOLINA ESPINOZA</h4>
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
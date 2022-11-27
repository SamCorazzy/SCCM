<?php
//archivo que sirve para imprimir la precartilla que se usa en el archivo tabla_prueba.php
ob_start();
require 'conexion.php';//utiliza el archivo para poder interacturar con la base de datos
$Año = date('Y'); //Obtener Año actual
$meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"); //Obtener Mes
$mes = $meses[date('n') - 1]; //Variable para guardar el mes de la fecha actual
$dia = date('j'); //Variable para obtener el dia del mes de la fecha actual


$matricula = $_POST["valor"];//obtiene el valor de la matricula buscada en el archivo tabla_prueba.php que 
//se compartio por medio del metodo POST

//se realizara una consulta para obtener los datos de a matricula en cuestion
$sql = "SELECT t2.nombre_ape,
			   t2.fecha_nac, 
			   t2.lugar_nac,
			   t2.nombre_ape_padre,
			   t2.nombre_ape_madre,
			   t2.estado_civil,
			   t2.ocupacion,
			   t2.leer_escrib,
			   t2.curp,
			   t2.grado_max_estudio,
			   t2.domicilio,
			   t2.clase
		FROM 
			   datos_personales t2 LEFT JOIN matricula t1 
			   ON t2.curp = t1.curp WHERE t1.matricula LIKE '" . $matricula . "%';"; //consulta JOIN de sql
mysqli_set_charset($con, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($con, $sql)) die(); //si los datos entre la coneccion y 
//la consulta son correctos habra un resultado el cual se guardara en result

$datosp = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{ //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $nombre_ape = $row['nombre_ape'];
    $fecha_nac = $row['fecha_nac'];
    $lugar_nac = $row['lugar_nac'];
    $nombre_ape_padre = $row['nombre_ape_padre'];
    $nombre_ape_madre = $row['nombre_ape_madre'];
    $estado_civil = $row['estado_civil'];
    $ocupacion = $row['ocupacion'];
    $leer_escrib = $row['leer_escrib'];
    $curp = $row['curp'];
    $grado_max_estudio = $row['grado_max_estudio'];
    $domicilio = $row['domicilio'];
    $clase = $row['clase'];

    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $datosp[] = array(
        'nombre_apellidos' => $nombre_ape,
        'fecha_nac' => $fecha_nac,
        'lugar_nac' => $lugar_nac,
        'nombre_ape_padre' => $nombre_ape_padre,
        'nombre_ape_madre' => $nombre_ape_madre,
        'estado_civil' => $estado_civil,
        'ocupacion' => $ocupacion,
        'leer_escribir' => $leer_escrib,
        'curp' => $curp,
        'grado_maximo_estudio' => $grado_max_estudio,
        'domicilio' => $domicilio,
        'clase' => $clase,
    );
}

//desconectamos la base de datos
$close = mysqli_close($con)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");


$json_string = json_encode($datosp); //documento json que se usa para almacenar los datos del array
echo $json_string;

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
<style>/* css interno para el tipo de font */
    body {
        font-family: 'Montserrat', sans-serif;
        font-size: 6px;

    }
</style>


<body>
    <div>

        <div style="line-height: 5px;">
            <!--interlineado -->
            <?php foreach ($datosp as $perso) { ?><!-- se hace un ciclo foreach para poder leer los datos -->
                <center>
                    <p>&nbsp; &nbsp; <?php echo $perso['clase']; //se usa  codigo php para poder recibir los datos ?></p>
                </center>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['nombre_apellidos'];//dato php obtenido ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['fecha_nac']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $perso['lugar_nac']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['nombre_ape_padre']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['nombre_ape_madre']; ?></p>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['estado_civil']; ?></p>
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['ocupacion']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $perso['leer_escribir']; ?> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['curp']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['grado_maximo_estudio']; ?></p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $perso['domicilio']; ?></p>
                <br><br><br><br><br><br><br><br>
                <p>SAN JUAN BAUTISTA TUXTEPEC, OAXACA A <?php echo $dia, " DE ", $mes, " DEL ", $Año //fecha con php?></p>
                <p></p>
                </h4>
        </div><br>
        </h4>

    <?php } //cierra el foreach ?>
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
//$dompdf->setPaper('A4', 'landscape');

//Tamaño personalizado
$dompdf->set_paper(array(0, 0, 226.760, 283.455));//medidas del documento pdf que generara

$dompdf->render();//renderiza el html en pdf

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>
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

    <!-- ChartJS -->
    <script type="text/javascript" src="JS/chartJS/Chart.min.js"></script>
    <script type="text/javascript" src="JS/jquery.js"></script>

</head>
<!--LETRA-->
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>


<body>
    <div>
        <header>
            <img class="imgHead" src="../img\287.png" alt="" width="100" height="80" class="mx-2">
            <a class="logo" href="formulario.php">SCCM</a>
            <nav>
                <ul>
                    <li><a href="formulario.php">FORMULARIO</a></li>
                    <li><a href="tabla_prueba.php">TABLA</a></li>
                    <li><a href="matriculas.php">MATRICULAS</a></l>
                    <li><a href="../index.php">SALIR</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="contenido">
        <div class="caja">
            <select id="año">
                <?php
                for ($i = 2022; $i < 2026; $i++) {
                    if ($i == 2022) {
                        echo '<option value="' . $i . '" selected>' . $i . '</option>';
                    } else {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                }
                ?>
            </select>
            <select id="mes" onclick="mostrarResultados()">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10" selected>Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="resultados"><canvas id="grafico"></canvas></div>
    </div>
    <br><br><br>
    <a type="button" href="reportepdf.php">Reporte 1</a>
    <a type="button" href="tabla2pdf.php">Reporte 2</a>
    <a type="button" href="tabla3pdf.php">Reporte 3</a>
    <a type="button" href="tabla4pdf.php">Reporte 4</a>

    <script type="text/javascript">
        $(document).ready(function() {
            mostrarResultados();
        });
    </script>
    <script src="rReporte.js"></script>
</body>


<footer>
    <p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
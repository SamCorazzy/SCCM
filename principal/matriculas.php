<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <title>SCCM - MATRICULAS</title>

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
    body {/* css interno para configurar el tipo de letra */
        font-family: 'Montserrat', sans-serif;
    }
</style>


<body>
    <div>
        <header><!-- imagen logo -->
        <img class="imgHead" src="../img/tux.png" alt="" width="200" height="80" class="mx-2">
            <a class="logo" href="formulario.php">SCCM</a>
            <nav>
                <ul><!-- Menu -->
                    <li><a href="formulario.php">FORMULARIO</a></li>
                    <li><a href="tabla_prueba.php">TABLA</a></li>
                    <li><a href="reporte.php">REPORTES</a></l>
                    <li><a href="../index.php">SALIR</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="contenido">
        <div>
            <main>
                <h3>ACCIONES DE MATRICULAS</h3>
                <form>
                    <div>
                        <h3>INGRESE MATRICULA EXTRAVIADA</h3>
                        <label for="matriculaExt" class="field">MATRICULA</label>
                        <!-- Elemento input para la matricula a dar por extraviada -->
                        <input type="text" name="matriculaExt" placeholder="MATRICULA" id="matriculaExt">
                    </div>
                    <div>
                        <!-- Elemento input tipo button para la matricula a dar por extraviada -->
                        <center><input type="button" name="guardarMaExtr" id="guardarMaExtr" value="GUARDAR"></center>
                    </div>
                    <div>
                        <h3>INGRESE MATRICULA A INUTILIZAR</h3>
                        <label for="matriculaInt" class="field">MATRICULA</label>
                        <!-- Elemento input para la matricula a dar por inutilizada -->
                        <input type="text" name="matriculaInt" placeholder="MATRICULA" id="matriculaInt">
                    </div>
                    <div>
                        <!-- Elemento input button para la matricula a dar por inutilizada -->
                        <center><input type="button" name="guardarMaInut" id="guardarMaInut" value="GUARDAR"></center>
                    </div>
                </form>
            </main>
        </div>

    </div>
    <br><br><br><br>
    <!-- Archivo js a usar para los eventos -->
    <script src="gMatriculas.js"></script>
</body>
<footer>
    <p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
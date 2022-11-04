<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a href="tabla_pruebas.php">TABLA</a></li>
                    <li><a href="reporte.php">REPORTES</a></l>
                    <li><a href="../index.php">SALIR</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="contenido">
        <div>
            <main>
                <h3>POR FAVOR INGRESA LAS MATRICULAS</h3>
                <form class="formu">
                    <div>
                        <label for="matricula" class="field">MATRICULA</label>
                        <input type="text" name="matricula" required placeholder="MATRICULA" id="matricula">
                    </div>
                    <div>
                        <center><input type="submit" name="guardar" id="guardar" value="GUARDAR"></center>
                    </div>
                </form>
            </main>
        </div>

    </div>
    <br><br><br><br>
    <script src="app.js"></script>
</body>
<footer>
    <p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
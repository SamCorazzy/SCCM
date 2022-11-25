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
                <form class="formu" action="precartilla.php" method="POST">
                <div>
                        <h3>INGRESE LA MATRICULA A IMPRIMIR</h3>
                        <?php
                        $matricula="";
                        echo '<input type="hidden" value="' . htmlspecialchars($matricula) . '" />'."\n";
                        echo '<label for="matricula" class="field">MATRICULA</label>
                        <input type="text" name="matricula" placeholder="MATRICULA" id="matricula" value="'.htmlspecialchars($matricula).'">'
                    ?>
                </div>
                    <div>
                        <center>
                            <!-- <input type="button" name="prematricula" id="prematricula" value="PRPARAR PARA IMPRIMIR" style="padding-right: 20px;"> -->
                            <!-- <input type="submit" name="imprimirMatricula" id="imprimirMatricula" value="IMPRIMIR"> -->
                            <a href="precartilla.php?matricula=<?php echo htmlspecialchars($matricula);?>">Ir a respuesta.php</a>
                        </center>
                    </div>
                    <div>
                        <h3>INGRESE MATRICULA EXTRAVIADA</h3>
                        <label for="matriculaExt" class="field">MATRICULA</label>
                        <input type="text" name="matriculaExt" placeholder="MATRICULA" id="matriculaExt">
                    </div>
                    <div>
                        <center><input type="button" name="guardarMaExtr" id="guardarMaExtr" value="GUARDAR"></center>
                    </div>
                    <div>
                        <h3>INGRESE MATRICULA A INUTILIZAR</h3>
                        <label for="matriculaInt" class="field">MATRICULA</label>
                        <input type="text" name="matriculaInt" placeholder="MATRICULA" id="matriculaInt">
                    </div>
                    <div>
                        <center><input type="button" name="guardarMaInut" id="guardarMaInut" value="GUARDAR"></center>
                    </div>
                </form>
            </main>
        </div>

    </div>
    <br><br><br><br>
    <script src="gMatriculas.js"></script>
</body>
<footer>
    <p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
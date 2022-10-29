<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCCM</title>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><!-- script para la version jquery usada -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800&display=swap" rel="stylesheet"> <!--LETRA-->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" >

</head>
<!--LETRA-->
<style>
    body{
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
                    <li><a href="tabla.php">TABLA</a></li>
                    <li><a href="matriculas.php">MATRICULA</a></li>
                    <li><a href="reporte.php">REPORTES</a></l>
                    <li><a href="../index.php">SALIR</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="contenido">
        <div>
          <main>
        <h3>POR FAVOR INGRESA LOS DATOS CORRESPONDIENTES</h3>
        <form class="formu">
            <div>
                <label for="curp" class="field">CURP</label>
                <input type="text" name="CURP" required placeholder="CURP" id="curp">
            </div>

            <!--etiqueta name para llamar de js y llamr el campo,
            required indica que llene el campo o completar
           -->

            <div>
                <label for="matricula" class="field">MATRICULA</label>
                <input type="text" name="matricula" required placeholder="MATRICULA" id="matricula">
            </div>

            <div>
                <label for="clase" class="field">CLASE</label>
                <input type="text" name="clase" required placeholder="CLASE" id="clase">
            </div>

            <div>
                <label for="nombre_apellidos" class="field">NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO</label>
                <input type="text" name="nombre_apellidos" required placeholder="NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO" id="nombre_apellidos">
            </div>

            <div>
                <label for="fecha_nac" class="field">FECHA DE NACIMIENTO</label>
                <input type="date" name="fecha_nac" required placeholder="FECHA DE NACIMIENTO" id="fecha_nac">
            </div>

            <div>
                <label for="lugar_nac" class="field">LUGAR DE NACIMIENTO</label>
                <input type="text" name="lugar_nac" required placeholder="LUGAR DE NACIMIENTO" id="lugar_nac">
            </div>

            <div>
                <label for="mexicanos_por" class="field">MEXICANOS POR</label>
                    <select name="mexicanos_por" id="mexicanos_por">
                        <option value="Nacionalizado">NACIONALIZADO</option>
                        <option value="Naturalizado">NATURALIZADO</option>
                    </select>        
            </div>

            <div>
                <label for="nombre_ape_padre" class="field">NOMBRE Y APELLIDOS DEL PADRE</label>
                <input type="text" name="nombre_ape_padre" placeholder="NOMBRE Y APELLIDOS DEL PADRE" id="nombre_ape_padre">
            </div>

            <div>
                <label for="nombre_ape_madre" class="field">NOMBRE Y APELLIDOS DE LA MADRE</label>
                <input type="text" name="nombre_ape_madre" placeholder="NOMBRE Y APELLIDOS DE LA MADRE" id="nombre_ape_madre">
            </div>

            <div>
                <label for="estado_civil" class="field">ESTADO CIVIL</label>
                    <select name="estado_civil" id="estado_civil">
                        <option value="Soltero">SOLTERO</option>
                        <option value="Casado">CASADO</option>
                    </select>        
            </div>

            <div>
                <label for="ocupacion" class="field">OCUPACIÓN</label>
                <input type="text" name="ocupacion" required placeholder="OCUPACION" id="ocupacion">
            </div>

            <div>
                <label for="leer_escribir" class="field">SABE LEER Y ESCRIBIR</label>
                    <select name="leer_escribir" id="leer_escribir">
                        <option value="Si">SI</option>
                        <option value="No">NO</option>
                    </select>        
            </div>

            <div>
                <label for="grado_maximo_estudio" class="field">GRADO MAXIMO DE ESTUDIOS</label>
                <input type="text" name="grado_maximo_estudio" required placeholder="GRADO MAXIMO DE ESTUDIOS" id="grado_maximo_estudio">
            </div>

            <div>
                <label for="domicilio" class="field">DOMICILIO</label>
                <input type="text" name="domicilio" required placeholder="DOMICILIO" id="domicilio">
            </div>

            <div>
                <label for="fecha_exped" class="field">FECHA DE EXPEND.</label>
                <input type="date" name="fecha_exped" required placeholder="FECHA DE EXPEDICIÓN" id="fecha_exped">
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
<footer><p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p></footer>

</html>
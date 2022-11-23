<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCCM - FORMULARIO</title>

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
                    <li><a href="tabla_prueba.php">TABLA</a></li>
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
                <form class="formu" action="">
                    <div>
                        <label for="curp" class="field">CURP</label>
                        <input type="text" name="curp" required placeholder="CURP" id="curp" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" minlength="18" maxlength="18">
                    </div>

                    <!--etiqueta name para llamar de js y llamr el campo,
            required indica que llene el campo o completar
           -->

                    <div>
                        <label for="matricula" class="field">MATRICULA</label>
                        <input type="text" name="matricula" required placeholder="MATRICULA" id="matricula" minlength="9" maxlength="9" pattern="[A-Z]{1}[-]\d{7}">
                    </div>


                    <div>
                        <label for="nombre_apellidos" class="field">NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO</label>
                        <input type="text" name="nombre_apellidos" required placeholder="NOMBRE(S) Y APELLIDOS PATERNO Y MATERNO" id="nombre_apellidos">
                    </div>
                    <div>
                        <label for="fecha_nac" class="field">FECHA DE NACIMIENTO</label>
                        <input type="date" id="fecha_nac" name="fecha_nac" required placeholder="FECHA DE NACIMIENTO" id="fecha_nac" min="" max="">
                    </div>
                    <div>
                        <label for="lugar_nac" class="field">LUGAR DE NACIMIENTO</label>
                        <input type="text" name="lugar_nac" required placeholder="LUGAR DE NACIMIENTO" id="lugar_nac">
                    </div>

                    <div>
                        <label for="clase" class="field">CLASE</label>
                        <input type="text" name="clase" required placeholder="CLASE" id="clase" minlength="4" maxlength="4" value="" readonly>
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
                        <select name="grado_maximo_estudio" id="grado_maximo_estudio" onclick="cambiaForm2(this.value)">
                            <option value="SinEstudios" selected>SIN ESTUDIOS</option>
                            <option value="Preescolar">PREESCOLAR</option>
                            <option value="Primaria">PRIMARIA</option>
                            <option value="Secundaria">SECUNDARIA</option>
                            <option value="Bachillerato">BACHILLERATO</option>
                            <option value="Licenciatura">LICENCIATURA</option>
                        </select>
                        <select class="select_grado" name="grado" id="grado">
                        </select>
                    </div>

                    <div>
                        <label for="domicilio" class="field">DOMICILIO</label>
                        <input type="text" name="domicilio" required placeholder="DOMICILIO" id="domicilio">
                    </div>

                    <div>
                        <label for="fecha_exped" class="field">FECHA DE EXPEND.</label>
                        <input type="date" name="fecha_exped" required placeholder="FECHA DE EXPEDICIÓN" id="fecha_exped" readonly>
                    </div>

                    <div>
                        <center><input type="submit" name="guardar" id="guardar" value="GUARDAR"></center>
                    </div>

                </form>
            </main>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            //obtener año de un input tipo date -------------------------
            $("#fecha_nac").change(function() {
                var value = $(this).val();
                var dia = new Date(value).getDate();
                var mes = new Date(value).getMonth() + 1;
                if (dia == 31 && mes == 12 || dia == 1 && mes == 1) {
                    $("#clase").val(new Date(value).getFullYear() + 1);
                } else {
                    $("#clase").val(new Date(value).getFullYear());
                }
            });

            //obtener fecha actual ----------------------------------

            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('fecha_exped').value = ano + "-" + mes + "-" + dia;

            var atras18Min = ano - 18;
            var atras18Max = ano - 14;
            $("#fecha_nac").attr("min", atras18Min + "-" + 1 + "-" + 1);
            $("#fecha_nac").attr("max", atras18Max + "-" + 12 + "-" + 31);
            document.getElementById('fecha_nac').value = atras18Min + "-" + 1 + "-" + 1;
        }); 
        </script>
        <script src = "gForm.js"></script> 
        <script src = "rSelect.js"></script>
</body>
<footer>
    <p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
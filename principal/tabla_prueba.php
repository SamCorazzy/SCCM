<!DOCTYPE html>
<html>

<head>
	<title> SCCM - TABLA</title>
	<meta charset="utf-8" />
	<meta name="description" content="Un formulario sirve para enviar datos a otra página que los recoge para usarlos o almacenarlos." />

	<!-- SweetAlert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- JQuery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><!-- script para la version jquery usada -->

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800&display=swap" rel="stylesheet">
	<!--LETRA-->

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="styles/style.css">

	<style>

	</style>

</head>
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
					<li><a href="matriculas.php">MATRICULA</a></li>
					<li><a href="reporte.php">REPORTES</a></l>
					<li><a href="../index.php">SALIR</a></li>
				</ul>
			</nav>
		</header>
	</div>


	<div class="contenido_tabla" id="tablajson">
		<!-- Elemento form con action precartilla.php para poder mandar con el method POST el valor del input
				buscar poder imprimir la precartilla de tal matricula -->
		<form action="precartilla.php" method="POST">
			<div>
				<label for="buscar" class="buscar">BUSCAR MATRICULA</label>
				<!-- Elemento input para buscar una matricula que tambien se podra imprimir -->
				<input type="text" id="buscar" name="buscar" class="buscar_input"  maxlength="9" onkeyup="buscarMatricula()">
				<input type="hidden" value="" name="valor" id="valor">
			</div>
			<!-- <br><br><br><br><br><br><br><br><br> -->
			<div class="tabla">
				<table border="1" class="content-table">
					<thead>
						<tr>
							<th>MATRICULA</th>
							<th>NOMBRE(S) Y APELLIDOS PATERNO Y MATERNO</th>
							<th>FECHA DE NACIMIENTO</th>
							<th>LUGAR DE NACIMIENTO</th>
							<th>CURP</th>
							<th>MEXICANOS POR:</th>
							<th>NOMBRE Y APELLIDOS DEL PADRE</th>
							<th>NOMBRE Y APELLIDOS DE LA MADRE</th>
							<th>ESTADO CIVIL</th>
							<th>OCUPACION</th>
							<th>SABE LEER Y ESCRIBIR</th>
							<th>GRADO MAXIMO DE ESTUDIOS</th>
							<th>DOMICILIO</th>
							<th>FECHA DE EXPED</th>
					</thead>
					<tbody>
						<tr><!-- Estos datos se mostraran en caso de no tener conexion -->
							<td scope="row">1</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
							<td>Otto</td>
						</tr>
					</tbody>
				</table>
				<br><br>
				<input type="submit" id="imprimir" value="IMPRIMIR"></input>
				<script type="text/javascript">
					// script interno para ejecutar funciones al cargar la pagina
					$(document).ready(function() {
						imprimirDatos();
					});
				</script>
			</div>
		</form>
	</div>

<!-- Archivo js a usar para los eventos -->
<script src="rBuscarMatricula.js"></script>
</body>
<footer>
	<p class="pie">Municipio de San Juan Bautista Tuxtepec, Oax.</p>
</footer>

</html>
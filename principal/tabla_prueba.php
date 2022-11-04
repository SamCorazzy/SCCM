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

<body>

	<div>
		<header>
			<img class="imgHead" src="../img\287.png" alt="" width="100" height="80" class="mx-2">
			<a class="logo" href="formulario.php">SCCM</a>
			<nav>
				<ul>
					<li><a href="formulario.php">TABLA</a></li>
					<li><a href="matriculas.php">MATRICULA</a></li>
					<li><a href="reporte.php">REPORTES</a></l>
					<li><a href="../index.php">SALIR</a></li>
				</ul>
			</nav>
		</header>
	</div>


	<div class="contenido_tabla" id="tablajson">
		<div class="tabla">
			<table border="1" class="content-table">
				<thead>
					<tr>
						<th>MATRICULA</th>
						<th class="noms">NOMBRE(S) Y APELLIDOS PATERNO Y MATERNO</th>
						<th class="fech">FECHA DE NACIMIENTO</th>
						<th class="lug">LUGAR DE NACIMIENTO</th>
						<th>CURP</th>
						<th>MEXICANOS POR:</th>
						<th class="noms">NOMBRE Y APELLIDOS DEL PADRE</th>
						<th class="noms">NOMBRE Y APELLIDOS DE LA MADRE</th>
						<th>ESTADO CIVIL</th>
						<th>OCUPACION</th>
						<th>SABE LEER Y ESCRIBIR</th>
						<th class="noms">GRADO MAXIMO DE ESTUDIOS</th>
						<th class="lug">DOMICILIO</th>
						<th class="fech">FECHA DE EXPED</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row">1</td>
						<!--ANTES ERA <th scope="row">1</th>-->
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
						<!--<td>@mdo</td>-->
					</tr>
				</tbody>
			</table>


			<script type="text/javascript">
				$(document).ready(function() {
					var url = "generarTabla.php"; //creacion de una variable
					$("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
					//tabla
					$.getJSON(url, function(datosp) { //metodo de obtencion de un documento json
						$.each(datosp, function(i, datosp) { //recorrer los elementos de un json
							var newRow =
								"<tr>"
								// imprimir los elementos del json en una celda de la tabla asignada
								+
								"<td>" + datosp.matricula + "</td>" +
								"<td>" + datosp.nombre_apellidos + "</td>" +
								"<td>" + datosp.fecha_nac + "</td>" +
								"<td>" + datosp.lugar_nac + "</td>" +
								"<td>" + datosp.curp + "</td>" +
								"<td>" + datosp.mexicanos_por + "</td>" +
								"<td>" + datosp.nombre_ape_padre + "</td>" +
								"<td>" + datosp.nombre_ape_madre + "</td>" +
								"<td>" + datosp.estado_civil + "</td>" +
								"<td>" + datosp.ocupacion + "</td>" +
								"<td>" + datosp.leer_escribir + "</td>" +
								"<td>" + datosp.grado_maximo_estudio + "</td>" +
								"<td>" + datosp.domicilio + "</td>" +
								"<td>" + datosp.fecha_exped + "</td>" +
								"</tr>";
							$(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun 
							//su id
						});

					});
				});
			</script>
		</div>
	</div>



</body>

</html>
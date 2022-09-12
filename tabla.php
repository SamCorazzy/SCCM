<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Bootstrap 5 JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- script -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- MENU NAV BAR -->
    <div>

        <header   style=" position: fixed; width: 100%;  z-index: 1000;"> 

            <nav class="navbar navbar-expand-lg fs-4" style="background-color: #F3F3F3; display:block;">
                <div class="container-fluid">
                  
                    <a class="navbar-brand px-4 text-dark fs-2" href="index.php"><img src="img\287.png" alt="" width="108" height="78" class="mx-2">SCCM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="mx-4" id="navbarNav">
                        <ul class="navbar-nav ">
                            
                            <li class="nav-item">
                                <a class="nav-link active text-dark" aria-current="page" href="index.php">FORMULARIO</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link text-dark" href="reporte.php">REPORTES</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-dark" href="#">CUALQUIERA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">SALIR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    </div>
    
   
    <!-- TERMINA EL MENU NAV BAR -->
<br><br><br>
    <div class="px-5 pt-5 table-responsive">

<table class="table table-striped" id="tablajson"> <!--id de la tabla-->
  <thead class="text-center ">
    <tr>
      <th scope="col" class="align-middle">No. PROG</th>
      <th scope="col" class="align-middle">MATRICULA</th>
      <th scope="col" class="align-middle">NOMBRE(S) Y APELLIDOS PATERNO Y MATERNO</th>
      <th scope="col" class="align-middle">FECHA DE NACIMIENTO</th>
      <th scope="col" class="align-middle">LUGAR DE NACIMIENTO</th>
      <th scope="col" class="align-middle">CURP</th>
      <th scope="col" class="align-middle">MEXICANOS POR:</th>
      <th scope="col" class="align-middle">NOMBRE Y APELLIEDOS DEL PADRE</th>
      <th scope="col" class="align-middle">NOMBRE Y APELLIEDOS DE LA MADRE</th>
      <th scope="col" class="align-middle">ESTADO CIVIL</th>
      <th scope="col" class="align-middle">OCUPACION</th>
      <th scope="col" class="align-middle">SABE LEER Y ESCRIBIR</th>
      <th scope="col" class="align-middle">GRADO MAXIMO DE ESTUDIOS</th>
      <th scope="col" class="align-middle">DOMICILIO</th>
      <th scope="col" class="align-middle">FECHA DE EXPED</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
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
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
      
            <script type="text/javascript">

				$(document).ready(function () {
					var url = "generarJSON.php"; //creacion de una variable
					$("#tablajson tbody").html("");//definiedo el formato de tabla en html usando un id de 
					//tabla
					$.getJSON(url, function (datosp) {//metodo de obtencion de un documento json
						$.each(datosp, function (i, datosp) {//recorrer los elementos de un json
							var newRow =
								"<tr>"
								+ "<td class="+"align-middle"+">" + datosp.no_prog + "</td>"
								// imprimir los elementos del json en una celda de la tabla asignada
								+ "<td class="+"align-middle"+">" + datosp.matricula + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.nombre_apellidos + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.fecha_nac + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.lugar_nac + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.curp + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.mexicanos_por + "</td>"
                                + "<td class="+"align-middle"+">" + datosp.nombre_ape_padre + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.nombre_ape_madre + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.estado_civil + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.ocupacion + "</td>"
                                + "<td class="+"align-middle"+">" + datosp.leer_escribir + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.grado_maximo_estudio + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.domicilio + "</td>"
								+ "<td class="+"align-middle"+">" + datosp.fecha_exped + "</td>"
								+ "</tr>";
							$(newRow).appendTo("#tablajson tbody");//Insertar una nueva fila enla tabla segun 
							//su id
						});

					});
				});

			</script>

    </div>
    <br><br><br><br><br><br> <br><br><br><br><br><br><br>
</body>
<hr>
<div class="card-body">
      <footer class=""><p class="text-center">Municipio de San Juan Bautista Tuxtepec, Oax.</p></footer>
</div>

</html>
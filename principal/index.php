<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCCM</title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Bootstrap 5 JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><!-- script para la version jquery usada -->


    <link href="../styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- MENU NAV BAR -->
    <div>

        <header   style=" position: fixed; width: 100%;  z-index: 1000;"> 

            <nav class="navbar navbar-expand-lg fs-4" style="background-color: #F3F3F3; display:block;">
                <div class="container-fluid">
                  
                    <a class="navbar-brand px-4 text-dark fs-2" href="index.php"><img src="../img\287.png" alt="" width="108" height="78" class="mx-2">SCCM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="mx-4" id="navbarNav">
                        <ul class="navbar-nav ">
                            
                            <li class="nav-item">
                                <a class="nav-link active text-dark" aria-current="page" href="tabla.php">TABLA</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-dark" href="matriculas.php">MATRICULAS</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link text-dark" href="reporte.php">REPORTES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="../index.php">SALIR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    </div>
 
    <!-- TERMINA EL MENU NAV BAR -->
        

    <br><br>
    <br> 
    <h6 class="px-5 pt-5">Agrega los datos correspondientes</h6>
    </div>
<form class="needs-validation" novalidate>
    <div class="card shadow mt-4 mx-5 px-3" id="contenedor">
        <div class="row">

            <div class=" col p-4">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CURP</span>
                    <input type="text" class="form-control" placeholder="CURP" aria-label="Curp" aria-describedby="basic-addon1" id="curp" required pattern="/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/" minlength="18" maxlength="18"/>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">MATRICULA</span>
                    <input type="text" class="form-control" placeholder="MATRICULA" aria-describedby="basic-addon1" id="matricula" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CLASE</span>
                    <input type="text" class="form-control" placeholder="CLASE" aria-label="Matricula" aria-describedby="basic-addon1" id="clase" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO</span>
                    <input type="text" class="form-control" placeholder="NOMBRE (S) Y APELLIDOS PATERNO Y MATERNO" aria-label="Matricula" aria-describedby="basic-addon1" id="nombre_apellidos" required>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">FECHA DE NACIMIENTO</span>
                    <input type="date" class="border px-2" aria-label="Matricula" aria-describedby="basic-addon1" placeholder="FECHA DE NACIMIENTO" id="fecha_nac" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">LUGAR DE NACIMIENTO</span>
                    <input type="text" class="form-control" placeholder="LUGAR DE NACIMIENTO" aria-label="Matricula" aria-describedby="basic-addon1" id="lugar_nac" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text " id="basic-addon1">MEXICANOS POR</span>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" required>
                    <select name="select" id="mexicanos_por">
                        <option value="Nacionalizado" selected>NACIONALIZADO</option>
                        <option value="Naturalizado">NATURALIZADO</option>
                    </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">NOMBRE Y APELLIDOS DEL PADRE</span>
                    <input type="text" class="form-control" placeholder="NOMBRE Y APELLIDOS DEL PADRE" aria-label="Matricula" aria-describedby="basic-addon1" id="nombre_ape_padre">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">NOMBRE Y APELLIDOS DE LA MADRE</span>
                    <input type="text" class="form-control" placeholder="NOMBRE Y APELLIDOS DE LA MADRE" aria-label="Matricula" aria-describedby="basic-addon1" id="nombre_ape_madre">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ESTADO CIVIL</span>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" required>
                        <select name="select" id="estado_civil">
                            <option value="soltero" selected>Soltero</option>
                            <option value="casado">Casado</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">OCUPACION</span>
                    <input type="text" class="form-control" placeholder="OCUPACION" aria-label="Matricula" aria-describedby="basic-addon1" id="ocupacion" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">SABE LEER Y ESCRIBIR</span>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" required>
                        <select name="select2" id="leer_escribir">
                            <option value="si" selected>Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">GRADO MAXIMO DE ESTUDIOS</span>
                    <input type="text" class="form-control" placeholder="GRADO MAXIMO DE ESTUDIOS" aria-label="Matricula" aria-describedby="basic-addon1" id="grado_maximo_estudio" required/>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">DOMICILIO</span>
                    <input type="text" class="form-control" placeholder="DOMICILIO" aria-label="Matricula" aria-describedby="basic-addon1" id="dom" required/>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">FECHA DE EXPEND.</span>
                    <input type="date" class="border px-2" aria-label="Matricula" aria-describedby="basic-addon1" placeholder="FECHA DE EXPEND" id="fecha_exped" required/>
                </div>

            </div>


        </div>


        <br>
        <div class="btn-group mx-5">
            <button type="button" class="btn  btn-primary mx-5" id="guardar"> <i class="bi bi-clipboard2-plus"></i> GUARDAR</button>

            <button type="button" class="btn btn-info mx-5"> <i class="bi bi-journal-text"></i> IMPRIMIR</button>

            <button type="button" class="btn btn-danger mx-5"> <i class="bi bi-trash"></i> BORRAR</button>
        </div>
        <br>
    </div>
    </div>
    <br><br><br>
</form>
    <script src="app.js"></script>
</body>

<hr>
<div class="card-body">
      <footer class=""><p class="text-center">Municipio de San Juan Bautista Tuxtepec, Oax.</p></footer>
</div>



</html>
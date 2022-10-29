<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/index.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<form action="validar.php" method="post">

<section class="vh-100 gradient-custom">
   <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-1 text-center">
                        <div class="mb-md-5 mt-md-4 pb-2">

                            <main class="form-signin container">

                            <h2 class="fw-bold mb-3 text-uppercase">Inicio</h2>

                            <div>
                                <img class="mb-3" src="img/log.png" alt="" width="100" height="100 ">
                            </div>

                            <p class="text-white-50 mb-2">Por favor ingrese su usuario y contraseña</p>
<!--
                            <p>Usuario</p>

                            <input type="text" placeholder="Ingrese su usuario" name="usuario">
-->
                            <div class="form-outline form-white mb-4">
                            <p class="text-white-50">Usuario</p>
                                <input type="text" id="typeEmailX" class="form-control form-control-lg" name="usuario"/>
                            </div>
<!--
                            <p>Contraseña</p>

                            <input type="password" placeholder="Ingrese su contraseña" name="password"><br><br>
-->
                            <div class="form-outline form-white mb-4">
                                <p class="text-white-50 ">Contraseña</p>
                                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                            </div>
<!--
                            <input type="submit" value="Ingresar"> 
-->
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" value="Ingresar">Login</button>

                        </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</section>
   </form> 
</body>
</html>
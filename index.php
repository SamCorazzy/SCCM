
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>

body{/* css interna para el tipo de letra */
    background:  #179b81  /*COLOR DE FONDO */  ;
}

</style>

<body>
    <!-- Elemento form con action validar.php para poder mandar con el method POST el valor de los input 
        de usuario y contraseña y asi poder validar y acceder -->
<form action="validar.php" method="post">

<section class="vh-100 gradient-custom">
   <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-black" class="log" style="border-radius: 1rem; background:   white   ;"> <!--COLOR DEL CONTENEDOR BLANCO COPIAR TODA ESTA LINEA Y EL TEXTO A NEGRO-->  
                    <div class="card-body p-1 text-center">
                        <div class="mb-md-5 mt-md-4 pb-2 ">

                            <main class="form-signin container">

                            <h2 class="fw-bold mb-3 text-uppercase ">Inicio</h2><!---->  

                            <div>
                                <img class="mb-3" src="img/tux.png" alt="" width="300" height="100 "><!--IMG AGREGADA COPIA LINEA--> 
                            </div>

                            <p class="text-black mb-2 fw-bold">Por favor ingrese su usuario y contraseña</p><!--COLOR A DE TEXTO A NEGRO CON NEGRITAS COPIAR TODA LA LINEA-->  

                            <div class="form-outline form-white mb-4">
                            <p class="text-black fw-bold">Usuario</p><!--COLOR A DE TEXTO A NEGRO CON NEGRITAS COPIAR TODA LA LINEA-->  
                                <input type="text" id="typeEmailX" class="form-control form-control-lg border-dark"  name="usuario"/><!--COLOR DEL BORDER COPIAR LINEA--> 
                            </div>
<!--
                            <p>Contraseña</p>

                            <input type="password" placeholder="Ingrese su contraseña" name="password"><br><br>
-->
                            <div class="form-outline form-white mb-4">
                                <p class="text-black fw-bold">Contraseña</p><!--COLOR A DE TEXTO A NEGRO CON NEGRITAS COPIAR TODA LA LINEA-->  
                                <input type="password" id="typePasswordX" class="form-control form-control-lg border-dark" name="password" /><!--COLOR DEL BORDER COPIAR LINEA-->  
                            </div>
<!--
                            <input type="submit" value="Ingresar"> 
-->
                            <button class="btn btn-outline-primary btn-lg px-5" type="submit" value="Ingresar">Iniciar Sesión</button><!--COLOR DE BTN A AZUL COPIA TODA LA LUNEA-->  

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
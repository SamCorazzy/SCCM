<?php
//este archivo es para poder validar el acceso por medio del login a el archivo formulario.php
include('db.php');//utiliza el archivo para poder interacturar con la base de datos
//requiere los datos enviados por el formulario en index.php para poder realizar la comprobacion
$USUARIO=$_POST['usuario'];//datos del usuarioa
$PASSWORD=$_POST['password'];//datos de la conrtaseña

//consulta sql para encontrar si existen esos valores en la base de datos
$consulta="SELECT* FROM personal where usuario='$USUARIO' and password='$PASSWORD'";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);//guarda el resultado si se obtuvo respuesta

if($filas){//si se obtuvo respuesta
    header("location:principal/formulario.php");//se trasalada a fomrulario.php
    }else{
        include ("index.php");//caso contrario se mantendra en el login
        ?>
        <!--<h1 class="bad">ERROR EN LA AUTENTICACION</h1> -->
        <head>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
       <script>//mandara una alerta que no se encuentra correcto el usuario o la vontraseña
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Usuario o Contraseña incorrecta',
          footer: '<a >Por favor vuelva intentarlo...</a>'
          })
        </script> 
        <?php
    }
mysqli_free_result($resultado);
mysqli_close($conexion);//cierra la conexion con la base de datos

?>
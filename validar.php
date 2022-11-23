<?php

include('db.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

$consulta="SELECT* FROM personal where usuario='$USUARIO' and password='$PASSWORD'";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:principal/formulario.php");
    }else{
        include ("index.php");
        ?>
        <!--<h1 class="bad">ERROR EN LA AUTENTICACION</h1> -->
        <head>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
       <script>
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
mysqli_close($conexion);

?>
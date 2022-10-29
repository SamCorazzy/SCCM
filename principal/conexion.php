<?php
define('DB_HOST','localhost');//definiendo el dominio
define('DB_USER','root');//definiendo el usuario
define('DB_PASS','');//definiendo la contraseña
define('DB_NAME','sccm');//definiendo la base de datos
$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);//haciendo peticion de conexion
mysqli_set_charset( $con, 'utf8');
if(!$con){
    die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
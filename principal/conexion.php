<?php
// Definir constantes para la conexión a la base de datos
define('DB_HOST', getenv('DB_HOST') ?: 'localhost'); // Dominio o IP del servidor
define('DB_USER', getenv('DB_USER') ?: 'root');      // Usuario de la base de datos
define('DB_PASS', getenv('DB_PASS') ?: '');         // Contraseña
define('DB_NAME', getenv('DB_NAME') ?: 'sccm');     // Nombre de la base de datos

// Crear conexión a la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Establecer codificación de caracteres a UTF-8
mysqli_set_charset($con, 'utf8');

// Verificar conexión
if (!$con) {
    die("Imposible conectarse: " . mysqli_connect_error());
}

if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}

echo "Conexión exitosa";

// Cerrar conexión cuando ya no se necesite
mysqli_close($con);
?>
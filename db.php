<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'sccm';

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_errno) {
    die("Error al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}

echo "Conexión exitosa";

$conexion->close();
?>
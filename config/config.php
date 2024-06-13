<?php
// show errors
//  ini_set('display_errors', '1');
//  ini_set('display_startup_errors', '1');
//  error_reporting(E_ALL);

// Parámetros de conexión a la base de datos
$host = "localhost"; 
$usuario = "root"; // $usuario = "usuario";
$contraseña = ""; // $contraseña = "contraseña";
$base_de_datos = "acdyccc_database";

// Crear una nueva conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Configurar el conjunto de caracteres y la zona horaria
$conexion->set_charset("utf8mb4");
// $conexion->query("SET time_zone = 'America/Argentina/Buenos_Aires'");
$conexion->query("SET NAMES 'utf8mb4' COLLATE 'utf8mb4_general_ci'");

?>
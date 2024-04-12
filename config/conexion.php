<?php 

session_start();
session_regenerate_id(true);

require_once('config.php');

$conexion = mysqli_connect(DB_HOST, DB_USUARIO, DB_CONTRASENA, DB_NOMBRE);

if (!$conexion) {
    session_destroy();
    die("Error de conexión: " . mysqli_connect_error());
}


?>
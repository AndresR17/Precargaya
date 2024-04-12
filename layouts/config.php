<?php
define('BASE_URL', 'http://localhost/Precargaya/');

define("KEY", "Recargaya@2024*");
define("AES", "AES-256-ECB");

session_start();
session_regenerate_id(true);

//sesion cuando algun usuario esta logeado
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
} 

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Genera un token CSRF único
}



?>
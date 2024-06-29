<?php
define('BASE_URL', 'https://www.recargayacolombia.com/');
define("KEY_FRONT", "Recargaya@2024*CLAVESECRETA");
define("AES_FRONT", "AES-256-ECB");

session_start();
session_regenerate_id(true);

if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
} 

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Genera un token CSRF único
}

//valida si existe una sesion
function validarSession($sesion){
    if (!isset($sesion)) {
        session_destroy();
        header("location:" . BASE_URL );
        exit();
    }
}

function borrarSesiones(){
    if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado']=null;
	}
    
}
?>
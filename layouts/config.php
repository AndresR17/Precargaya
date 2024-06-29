<?php
// define('BASE_URL', 'https://www.recargayacolombia.com/');
define('BASE_URL', 'http://localhost/Precargaya/');
define("KEY_FRONT", "Recargaya@2024*CLAVESECRETA");
define("AES_FRONT", "AES-256-ECB");

session_start();
session_regenerate_id(true);


//sesion cuando algun usuario esta logeado
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
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

function modalOpen(){

    if(isset($_SESSION['modal'])){

        echo "
        <script>
        // Obtenemos el modal
        const modal = document.getElementById('modal-login');

        // Función para abrir el modal
        function openModal() {
        // Mostramos el modal
        modal.classList.remove('hidden');
        modal.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'bottom-0', 'flex', 'items-center', 'justify-center');
        modal.setAttribute('aria-hidden', 'false');
    
        modal.focus();
        // Agregamos la clase para deshabilitar el desplazamiento del fondo
        document.body.classList.add('overflow-hidden');

        }
        openModal();

        </script>
        ";
    }

}

function borrarSesiones(){
	if(isset($_SESSION['modal'])){
		$_SESSION['modal']=null;
	}

    if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado']=null;
	}
    
}
?>
<?php 
//! CERRAR Y DESTRUIR SESIONES PARA QUE EL USUARIO NO ESTE LOGEADO 
session_start();

if(isset($_SESSION['user'])){
    unset($_SESSION['user']); // Eliminar solo la variable 'user' de la sesión
}

header('location: ../');
?>
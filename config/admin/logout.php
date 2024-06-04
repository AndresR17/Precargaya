<?php 
//! CERRAR Y DESTRUIR SESIONES PARA QUE EL USUARIO NO ESTE LOGEADO 
session_start();

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']); // Eliminar solo la variable 'admin' de la sesión
}

header('location:../../');
?>
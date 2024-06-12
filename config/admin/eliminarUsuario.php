<?php

//!CAMBIAR DE ESTADO A ELIMINADO USUARIOS DESDE EL PANEL ADMIN

require_once('../conexion.php');
require_once('../main.php');
require_once('../config.php');

$id = limpiar_cadena($_GET['id']);

if (!is_numeric($id)) {
    enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma!');
}

$sql = "UPDATE usuarios SET estado = 'eliminado' WHERE id = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    $_SESSION['eliminado'] = true;
    mysqli_stmt_close($stmt);
    header("location:". BASE_URL_BACK . "admin/usuarios.php");
}

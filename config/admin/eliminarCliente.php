<?php
//!CAMBIAR DE ESTADO A ELIMINADO CLIENTES DESDE EL PANEL ADMIN

require_once('../conexion.php');
require_once('../main.php');
require_once('../config.php');


$pagina = limpiar_cadena($_GET['pagina']);
$idCliente = limpiar_cadena($_GET['idCliente']);


if (!is_numeric($idCliente)) {
    enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma!');
}


$sql = "UPDATE usuarios SET estado = 'eliminado' WHERE id = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $idCliente);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    $_SESSION['eliminado'] = true;
    mysqli_stmt_close($stmt);
    header("location:". BASE_URL_BACK ."admin/clientes.php?pagina=$pagina");
}

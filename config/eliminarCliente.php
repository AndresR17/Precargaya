<?php 

require_once('./conexion.php');
require_once('./main.php');


$pagina = limpiar_cadena($_GET['pagina']);
$idCliente = limpiar_cadena($_GET['idCliente']);
$response = array();


if(!is_numeric($idCliente)){
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
}

if (count($response) == 0) {

    $sql = "UPDATE clientes SET estado = 'eliminado' WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idCliente);
    $success = mysqli_stmt_execute($stmt);

    if($success){
        $_SESSION['eliminado'] = true;
        mysqli_stmt_close($stmt);
        header("location:../auth/clientes.php?pagina=$pagina");
    }

    
}else{
    $_SESSION['error'] = true;
        mysqli_stmt_close($stmt);
        header("location:../auth/clientes.php?pagina=$pagina");
}



?>
<?php 

require_once 'conexion.php';
require_once 'main.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    $usuario = limpiar_cadena($data['usuario']);
    $contrasena = limpiar_cadena($data['password']);

    $query = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado)==1) {

        $_SESSION['usuario'] = $resultado;
        echo 1;
        exit();
        
    } else {
        echo 2;
        exit();
    }

}
?>
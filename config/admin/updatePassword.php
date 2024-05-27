<?php
//*se actualiza la password del usuario admin u otro usuario que este en el panel admin

require_once('../conexion.php');
require_once('../main.php');
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        // Manejar el error de datos JSON no válidos
        enviarRespuestaJSON('Datos JSON no válidos');
    }

    $passActual = limpiar_cadena($data['passActual']);
    $password = limpiar_cadena($data['password']);
    $passConfirmation = limpiar_cadena($data['passConfirmation']);
    $id = $_SESSION['admin']['id'];

    if (empty($passActual) || empty($password) || empty($passConfirmation)) {
        enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma!');
    }

    if ($password != $passConfirmation) {
        enviarRespuestaJSON('Las contraseñas no coinciden!');
    } else {
        $pass = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
    }

        $sql = "SELECT password FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();

        if ($resultado && password_verify($passActual, $resultado['password'])) {

            $sqlPass = "UPDATE usuarios SET password = ? WHERE id = ?";
            $stmt = $conexion->prepare($sqlPass);
            $stmt->bind_param("si", $pass, $id);
            $update = $stmt->execute();

            if ($update) {
                mysqli_stmt_close($stmt);
                // Se actualizó correctamente la contraseña
                enviarRespuestaJSON(1);
            }
        } else {
            mysqli_stmt_close($stmt);
            enviarRespuestaJSON(2);
            
        }

}else{
    session_destroy();
    header('location:'. BASE_URL_BACK);
}

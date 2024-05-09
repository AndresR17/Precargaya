<?php
//! PROCESO DE CAMBIO DE CONTRASEÑA, POR MEDIO DEL TOKEN ENVIADO AL CORREO

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once('../conexion.php');
    require_once('../main.php');
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['csrf'] === $_SESSION['csrf_token']) {

        // Datos del formulario
        $idHash = openssl_decrypt($data['user'], AES, KEY);
        $id = (int)limpiar_cadena($idHash);
        $token = limpiar_cadena($data['token']);
        $password = limpiar_cadena($data['password']);

        if (empty($id) || empty($token)) {
            enviarRespuestaJSON('Por favor vuelve a intentar nuevamente!');
        }

        if (!empty($password)) {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        } else {
            enviarRespuestaJSON('La constraseña no tiene un formato valido!');
        }

        $sql = "SELECT token FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc(); // Obtiene la fila como un array asociativo
        $tokenBD = $row['token']; // Obtiene el token de la fila

        if ($tokenBD && $tokenBD === $token) {
            $sqlDeleteToken = "UPDATE usuarios SET token = NULL, password = ? WHERE id = ?";
            $stmt = $conexion->prepare($sqlDeleteToken);
            $stmt->bind_param("si", $passwordHashed, $id);
            $stmt->execute();

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $_SESSION['newPassword'] = null;
                $_SESSION['modal'] = true;
                $stmt->close();
                enviarRespuestaJSON(1);
            } else {
                enviarRespuestaJSON('Token no valido!, intente nuevamente realizar el proceso.');
            }
        } else {
            enviarRespuestaJSON('Token no valido!');
        }
    } else {
        enviarRespuestaJSON('Token no valido, Recarga la pagina!');
    }
} else {
    session_destroy();
    header('location:../');
}

<?php 
//! EDITAR USUARIOS DEL PANEL ADMINISTRATIVO

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once('../conexion.php');
    require_once('../main.php');
    require_once('../config.php');

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['csrf_token'] === $_SESSION['csrf_token']) {

        $idEncript = openssl_decrypt($data['id_user'], AES, KEY);
        $id = (int) limpiar_cadena($idEncript);
        $name = limpiar_cadena($data['name']);
        $doc = limpiar_cadena($data['documento']);
        $email = limpiar_cadena($data['email']);
        $phone = limpiar_cadena($data['celular']);
        $rol = limpiar_cadena($data['rol']);
        $fecha = limpiar_cadena($data['fecha']);

        if (empty($id) || empty($name) || empty($doc) || empty($phone) || empty($rol) || empty($fecha)) {
            enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma');
        }

        if (empty($email)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.");
        } else {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $sql_email = "SELECT * FROM usuarios WHERE email = ? AND id != ?";
                $stmt = mysqli_prepare($conexion, $sql_email);
                mysqli_stmt_bind_param($stmt, "si", $email, $id);
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);

                // Verificar si se encontró un resultado
                if (mysqli_num_rows($resultado) > 0) {
                    mysqli_stmt_close($stmt);
                    enviarRespuestaJSON('Este correo ya fue usado anteriormente.');
                }
            } else {
                enviarRespuestaJSON("El email ingresado no es valido.");
            }
        }

        //actualizar el usuario
        $query = "UPDATE usuarios SET documento= ?, name= ?, email= ?, phone= ?, rol = ?, updateAt = ? WHERE id = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "ssssssi", $doc, $name, $email, $phone, $rol, $fecha, $id);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if ($affected_rows > 0) {
            mysqli_stmt_close($stmt);
            enviarRespuestaJSON(1);
        }else{
            enviarRespuestaJSON('El usuario no tiene modificaciones');
        }
    } else {
        session_destroy();
        enviarRespuestaJSON('Recarga la pagina y vuelve a intentarlo');
    }
} else {
    session_destroy();
    header('location:' . BASE_URL_BACK);
}
?>
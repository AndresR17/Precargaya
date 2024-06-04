<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once('../conexion.php');
    require_once('../main.php');
    require_once('../config.php');

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['csrf_token'] === $_SESSION['csrf_token']) {

        $name = limpiar_cadena($data['name']);
        $doc = limpiar_cadena($data['doc']);
        $email = limpiar_cadena($data['email']);
        $phone = limpiar_cadena($data['phone']);
        $rol = limpiar_cadena($data['rol']);
        $fecha = limpiar_cadena($data['fecha']);
        $password = limpiar_cadena($data['password']);
        $password_confirmation = limpiar_cadena($data['password_confirmation']);
        $estado = 'activo';

        if (empty($name) || empty($doc) || empty($phone) || empty($rol) || empty($password) || empty($password_confirmation)|| empty($fecha)) {
            enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma');
        }

        if ($password !== $password_confirmation) {
            enviarRespuestaJSON('Tus contraseñas no coinciden');
        } else {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        }

        if (empty($email)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.");
        } else {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $sql_email = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = mysqli_prepare($conexion, $sql_email);
                mysqli_stmt_bind_param($stmt, "s", $email);
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

        $sql = "INSERT INTO usuarios (name, documento, email, phone, rol, password, createdAt, estado ) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $doc, $email, $phone, $rol, $passwordHashed, $fecha, $estado);
        $success = mysqli_stmt_execute($stmt);

        //El registro fue realizado con exito
        if ($success) {
            mysqli_stmt_close($stmt);
            enviarRespuestaJSON(1);
        }
    } else {
        session_destroy();
        enviarRespuestaJSON('Recarga la pagina y vuelve a intentarlo');
    }
} else {
    session_destroy();
    header('location:' . BASE_URL_BACK);
}

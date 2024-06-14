<?php
//! VALIDAR LAS CREDENCIALES DEL USUARIO PARA LOGEARLO
require_once '../conexion.php';
require_once '../main.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {

        $usuario = limpiar_cadena($data['user']);
        $password = limpiar_cadena($data['password']);

        if (empty($usuario) || empty($password)) {
            enviarRespuestaJSON('Tus datos no son aceptados en la plataforma!');
        }


        $query = "SELECT * FROM usuarios WHERE email = ? ";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        $check_user = mysqli_stmt_get_result($stmt);


        if ($check_user && mysqli_num_rows($check_user) == 1) {

            $datosDB = mysqli_fetch_assoc($check_user);
            $check_password = password_verify($password, $datosDB["password"]);

            if ($check_password) {

                if ($datosDB['token'] !== null) {
                    $sqlDeleteToken = "UPDATE usuarios SET token = NULL WHERE id = ?";
                    $stmt = $conexion->prepare($sqlDeleteToken);
                    $stmt->bind_param("i", $datosDB['id']);
                    $stmt->execute();
                }

                $query = "SELECT id, documento, name, email, phone, rol FROM usuarios WHERE email = ? ";
                $stmt = mysqli_prepare($conexion, $query);
                mysqli_stmt_bind_param($stmt, "s", $usuario);
                mysqli_stmt_execute($stmt);
                $user = mysqli_stmt_get_result($stmt);

                if ($user && mysqli_num_rows($user) == 1) {

                    $datos = mysqli_fetch_assoc($user);
                    $response = $datos['rol'];

                    if ($response === 'admin' || $response === 'Cajero') {
                        $_SESSION['admin'] = $datosDB;
                        mysqli_stmt_close($stmt);
                        enviarRespuestaJSON($response);
                    } else {
                        $_SESSION['user'] = $datos;
                        mysqli_stmt_close($stmt);
                        enviarRespuestaJSON($response);
                    }
                }
            } else {
                mysqli_stmt_close($stmt);
                enviarRespuestaJSON(2);
            }
        } else {

            mysqli_stmt_close($stmt);
            enviarRespuestaJSON(2);
        }
    } else {
        session_destroy();
        enviarRespuestaJSON('Token no valido, Recarga la pagina!');
    }
} else {
    session_destroy();
    header('location:../');
}

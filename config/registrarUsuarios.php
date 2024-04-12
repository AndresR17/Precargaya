<?php

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {


        $documento = limpiar_cadena($data['documento']);
        $name = limpiar_cadena($data['name']);
        $correo = limpiar_cadena($data['email']);
        $phone = limpiar_cadena($data['phone']);
        $password = limpiar_cadena($data['password']);
        $rol = limpiar_cadena($data['rol']);
        $check = limpiar_cadena($data['check']);
        $estado = limpiar_cadena($data['estado']);
        $createdAt = limpiar_cadena($data['createdAt']);

        $response = array();
        //validar campos

        if ($documento == "" || $name == "" || $correo == "" || $phone == "" || $check == "" || $rol == "") {
            $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
        }


        if ($password == "") {
            $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
        } else {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        }


        if ($correo == "") {
            $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
        } else {

            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {


                $sql_email = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = mysqli_prepare($conexion, $sql_email);
                mysqli_stmt_bind_param($stmt, "s", $correo);
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);

                // Verificar si se encontró un resultado
                if (mysqli_num_rows($resultado) == 1) {
                    mysqli_stmt_close($stmt);
                    echo 1;
                    die();
                }
            }
        }

        if (count($response) > 0) {

            // Devuelve la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } else {

            $sql = "INSERT INTO usuarios (documento, name, email, phone, terminos, password, rol, estado, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la declaración
            $stmt = mysqli_prepare($conexion, $sql);

            mysqli_stmt_bind_param($stmt, "sssssssss", $documento, $name, $correo, $phone, $check, $passwordHashed, $rol, $estado, $createdAt);

            $success = mysqli_stmt_execute($stmt);

            if ($success) {
                echo 2;
            }

            mysqli_stmt_close($stmt);
            exit();
        }
    }else{
        session_destroy();
        echo 3;
        exit();
    }
}else{

    session_destroy();
    header('location:../');
}

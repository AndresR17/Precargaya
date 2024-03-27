<?php

require_once 'conexion.php';
require_once 'main.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    $usuario = limpiar_cadena($data['user']);
    $password = limpiar_cadena($data['password']);


    $query = "SELECT * FROM usuarios WHERE email = ? ";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $check_user = mysqli_stmt_get_result($stmt);


    if ($check_user && mysqli_num_rows($check_user) == 1) {

        $datos = mysqli_fetch_assoc($check_user);
        $check_password = password_verify($password, $datos["password"]);

        if ($check_password) {

            $query = "SELECT id, documento, name, email, phone, rol, createdAt FROM usuarios WHERE email = ? ";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $user = mysqli_stmt_get_result($stmt);

            if ($user && mysqli_num_rows($user) == 1) {

                $datos = mysqli_fetch_assoc($user);
                $response = $datos['rol'];
                $_SESSION['user'] = $datos;

                header('Content-Type: application/json');
                echo json_encode($response);
                mysqli_stmt_close($stmt);
                exit();

            }
        } else {
            mysqli_stmt_close($stmt);
            echo 2;
            exit();
        }
    } else {

        mysqli_stmt_close($stmt);
        echo 2;
        exit();
    }
}

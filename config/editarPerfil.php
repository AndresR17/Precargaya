<?php

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
}

$id = (int) limpiar_cadena($data['idUser']);
$documento = limpiar_cadena($data['documento']);
$name = limpiar_cadena($data['name']);
$correo = limpiar_cadena($data['email']);
$phone = limpiar_cadena($data['phone']);
$password = limpiar_cadena($data['password']);
$updateAt = limpiar_cadena($data['updateAt']);
$passwordNew = isset($data['passwordNew']) ? limpiar_cadena($data['passwordNew']) : $password;

$response = array();

//validar campos

if ($documento == "" || $name == "" || $correo == "" || $phone == "") {
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
}

if ($password == "") {
    $response['mensaje'] = "Ingresa tu contraseña.";
} else {
    $passwordHashed = password_hash($passwordNew, PASSWORD_BCRYPT, ['cost' => 10]);
}

if (count($response) == 0) {

    //consulta para obtener el usuario y validar la contraseña
    $query = "SELECT * FROM usuarios WHERE id = ? ";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $check_user = mysqli_stmt_get_result($stmt);


    if ($check_user && mysqli_num_rows($check_user) == 1) {

        $datos = mysqli_fetch_assoc($check_user);
        $check_password = password_verify($password, $datos["password"]);

        if ($check_password) {

            //actualizar el usuario
            $query = "UPDATE usuarios SET documento= ?, name= ?, email= ?, phone= ?, password= ?, updateAt= ? WHERE id = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "ssssssi", $documento, $name, $correo, $phone, $passwordHashed, $updateAt, $id);
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if ($affected_rows > 0) {

                //obtner usuario y actualizar la session
                $query = "SELECT id, documento, name, email, phone, rol, updateAt FROM usuarios WHERE id = ? ";
                $stmt = mysqli_prepare($conexion, $query);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $user = mysqli_stmt_get_result($stmt);

                if ($user && mysqli_num_rows($user) == 1) {
                    $_SESSION['user'] = mysqli_fetch_assoc($user);
                    echo 1;
                    exit();
                }

            }

        } else {
            mysqli_stmt_close($stmt);
            echo 2;
            exit();
        }
    } else {

        mysqli_stmt_close($stmt);
        echo 3;
        exit();
    }
} else {
    // Devuelve la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    exit();
}

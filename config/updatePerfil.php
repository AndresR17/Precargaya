<?php

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
}

$id = limpiar_cadena($data['id']);
$documento = limpiar_cadena($data['documento']);
$name = limpiar_cadena($data['name']);
$correo = limpiar_cadena($data['email']);
$phone = limpiar_cadena($data['phone']);
$password = limpiar_cadena($data['password']);
$passwordNew = isset($data['passwordNew']) ? limpiar_cadena($data['passwordNew']) : '';
$updateAt = limpiar_cadena($data['updateAt']);

$response = array();
//validar campos

if (empty($documento) || empty($name) || empty($phone) || empty($password) || empty($updateAt) || empty($id)){
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
}

if(empty($passwordNew)){
    $passHashed = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
}else{
    $passHashed = password_hash($passwordNew, PASSWORD_BCRYPT, ["cost" => 10]);
}


if (empty($correo)) {
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
} else {

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        $sql_email = "SELECT * FROM usuarios WHERE email = ? AND id != ?";
        $stmt = mysqli_prepare($conexion, $sql_email);
        mysqli_stmt_bind_param($stmt, "si", $correo, $id);
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

if(count($response) == 0){

    $query = "SELECT * FROM usuarios WHERE id = ? ";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $check_user = mysqli_stmt_get_result($stmt);

    if ($check_user && mysqli_num_rows($check_user) == 1) {

        $datos = mysqli_fetch_assoc($check_user);
        $check_password = password_verify($password, $datos["password"]);

        if ($check_password) {
            //validar que se realizaron los cambios
            
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




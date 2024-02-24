<?php

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
}

$documento = limpiar_cadena($data['documento']);
$name = limpiar_cadena($data['name']);
$correo = limpiar_cadena($data['email']);
$phone = limpiar_cadena($data['phone']);
$message = limpiar_cadena($data['message']);
$check = limpiar_cadena($data['check']);
$estado = limpiar_cadena($data['estado']);
$createdAt = limpiar_cadena($data['createdAt']);

$response = array();
//validar campos

if ($documento == "" || $name == "" || $correo == "" || $phone == "" || $check == "") {
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
}


if ($correo == "") {
    $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma.";
} else {

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {


        $sql_email = "SELECT * FROM clientes WHERE email = ?";
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

}else{

    $sql = "INSERT INTO clientes (documento, name, email, phone, comentarios, terminos, estado, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, "ssssssss", $documento, $name, $correo, $phone, $message, $check, $estado, $createdAt);

    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo 2;
    }

    mysqli_stmt_close($stmt);
    exit();
}

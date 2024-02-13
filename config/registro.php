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

//validar campos


    // if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

    //     $sql_email = "SELECT * FROM clientes WHERE correo = '$correo'; ";
    //     $check_email = mysqli_query($conexion, $sql_email);

    //     if ($check_email && mysqli_num_rows($check_email) == 1) {
    //         echo 1;
    //         die();
    //     }
    // }

    // $sql = "INSERT INTO clientes  VALUES (null, $documento, '$name', '$correo', '$phone', '$message', '$check')";
    // $save = mysqli_query($conexion, $sql);

    // if ($save) {
    //     echo 2;
    // }

echo 3;

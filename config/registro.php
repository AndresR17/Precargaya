<?php

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $data = json_decode(file_get_contents("php://input"), true);
}

$name = limpiar_cadena($data['name']);
$lastname = limpiar_cadena($data['lastname']);
$date = limpiar_cadena($data['date']);
$correo = limpiar_cadena($data['email']);
$phone = limpiar_cadena($data['phone']);
$texto = limpiar_cadena($data['text']);

//validar campos

if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

    $sql_email = "SELECT * FROM clientes WHERE correo = '$correo'; ";
    $check_email = mysqli_query($conexion, $sql_email);

    if ($check_email && mysqli_num_rows($check_email) == 1) {
        echo 1;
        die();
    }
}

$sql = "INSERT INTO clientes VALUES (null,'$name', '$lastname', '$date', '$correo', '$phone', '$texto')";
$save = mysqli_query($conexion, $sql);

if ($save) {
    echo 2;
}


<?php

require_once('./conexion.php');
require_once('./main.php');



$name = limpiar_cadena($_POST['name']);
$lastname = limpiar_cadena($_POST['lastname']);
$fechaN = limpiar_cadena($_POST['date']);
$correo = limpiar_cadena($_POST['email']);
$phone = limpiar_cadena($_POST['phone']);
$texto = limpiar_cadena($_POST['text']);

//validar campos


if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    
    $sql_email = "SELECT * FROM clientes WHERE correo = '$correo'; ";
    $check_email = mysqli_query($conexion, $sql_email);

    if($check_email && mysqli_num_rows($check_email)==1){
        $_SESSION['correo'] = true;
    }
    
}

    $sql = "INSERT INTO clientes VALUES ('$name', '$lastname', '$fechaN', '$correo', '$phone', '$texto')";
    $save = mysqli_query($conexion, $sql) ;

    if($save){
        $_SESSION['guardado'] = true;
        header('location:../index.php#formClientes');
    }

    mysqli_close($conexion);
?>

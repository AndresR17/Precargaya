<?php
session_start();
$conexion = mysqli_connect('localhost', 'root', '', 'precargaya');


if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
} else {
    echo 'Conexión exitosa';
}

$name =$_POST['name'];
$lastname = $_POST['lastname'];
$fechaN = $_POST['date'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$texto = $_POST['text'];

$errores = [];
if(!empty($name)  || empty($lastname) || empty($fechaN)) {
    $errores['datos'] = "los campos son requeridos";
}

if($errores == 0){
    $sql = "INSERT INTO registro (nombre, apellidos, fecha_de_nacimiento, correo, telefono, texto) VALUES ('$name', '$lastname', '$fechaN', '$email', '$phone', '$texto');";
    $save = mysqli_query($conexion, $sql) ;

    if($save){
        echo('registro exitoso');
    }
}else{
    $_SESSION['error'] = $errores;
    header("Location: index.php#form");
    exit(); 
}


?>

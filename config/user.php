<?php
require_once('conexion.php'); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];
    $rol = "administrador";

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT,['cost'=>10]);

    // Consulta SQL para insertar el usuario y la contraseña hasheada en la base de datos
    $sql = "INSERT INTO usuarios (user, password, rol) VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = mysqli_prepare($conexion, $sql);

    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $rol);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Comprobar si se insertó correctamente
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar el usuario.";
    }

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión
mysqli_close($conexion);
?>

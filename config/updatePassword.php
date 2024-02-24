<?php


require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        // Manejar el error de datos JSON no válidos
        echo json_encode(array("error" => "Datos JSON no válidos"));
        exit();
    }

    $passActual = limpiar_cadena($data['passActual']);
    $password = limpiar_cadena($data['password']);
    $passConfirmation = limpiar_cadena($data['passConfirmation']);
    $id = $_SESSION['user']['id'];

    $errores = array();

    if (empty($passActual) || empty($password) || empty($passConfirmation)) {
        $errores['mensaje'] = "Tus datos no son aceptados en nuestra plataforma!";
    }

    if ($password != $passConfirmation) {
        $errores['mensaje'] = "Las contraseñas no coinciden";
    } else {
        $pass = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
    }

    if (count($errores) == 0) {

        $sql = "SELECT password FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();

        if ($resultado && password_verify($passActual, $resultado['password'])) {

            $sqlPass = "UPDATE usuarios SET password = ? WHERE id = ?";
            $stmt = $conexion->prepare($sqlPass);
            $stmt->bind_param("si", $pass, $id);
            $update = $stmt->execute();

            if ($update) {
                // Se actualizó correctamente la contraseña
                $stmt->close();
                echo 1;
                exit();
            }
        } else {

            // Las contraseñas actuales no coinciden
            $stmt->close();
            echo 2;
            exit();
        }

    } else {
        // Devolver errores en formato JSON
        header('Content-Type: application/json');
        echo json_encode($errores);
        exit();
    }
}

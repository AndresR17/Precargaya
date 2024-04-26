<?php
//* Archivo para editar perfil de los clientes

require_once('./conexion.php');
require_once('./main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {


        $idEncript = openssl_decrypt($data['id'], AES, KEY);
        $id = (int) limpiar_cadena($idEncript);

        $documento = !empty($data['documento']) ? limpiar_cadena($data['documento']) : null;
        $name = limpiar_cadena($data['name']);
        $correo = limpiar_cadena($data['email']);
        $phone = !empty($data['phone']) ? limpiar_cadena($data['phone']) : null;
        $password = limpiar_cadena($data['password']);
        $passwordNew = isset($data['passwordNew']) ? limpiar_cadena($data['passwordNew']) : '';
        $updateAt = limpiar_cadena($data['updateAt']);

        if (empty($name) || empty($password) || empty($updateAt) || empty($id) || !is_numeric($id)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.");
        }

        if (empty($passwordNew)) {
            $passHashed = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
        } else {
            $passHashed = password_hash($passwordNew, PASSWORD_BCRYPT, ["cost" => 10]);
        }


        if (empty($correo)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.");
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
                    enviarRespuestaJSON("El correo ingresado ya se encuentra registrado.");
                }
            } else {
                enviarRespuestaJSON("El correo ingresado no es un correo valido.");
            }
        }

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
                mysqli_stmt_bind_param($stmt, "ssssssi", $documento, $name, $correo, $phone, $passHashed, $updateAt, $id);
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
                        mysqli_stmt_close($stmt);
                        enviarRespuestaJSON(1);
                    }
                }
            } else {
                mysqli_stmt_close($stmt);
                enviarRespuestaJSON(2);
            }
        } else {

            mysqli_stmt_close($stmt);
            enviarRespuestaJSON("El usuario que intentas actualizar no existe!");
        }
    } else {
        session_destroy();
        enviarRespuestaJSON('Token no valido, Recarga la pagina!');
    }
} else {

    session_destroy();
    header('location:../');
}

<?php
//!PROCESO PARA CREAR NUEVOS USUARIOS
require_once('../conexion.php');
require_once('../main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {

        $name = limpiar_cadena($data['name']);
        $correo = limpiar_cadena($data['email']);
        $password = limpiar_cadena($data['password']);
        $rol = limpiar_cadena($data['rol']);
        $check = limpiar_cadena($data['check']);
        $estado = limpiar_cadena($data['estado']);
        $createdAt = limpiar_cadena($data['createdAt']);


        if (empty($name) || empty($correo) || empty($check) || empty($rol)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.") ;
        }

        if (empty($password)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.") ;
        } else {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        }


        if (empty($correo)) {
            enviarRespuestaJSON("Tus datos no son aceptados en nuestra plataforma.") ;
        } else {

            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {


                $sql_email = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = mysqli_prepare($conexion, $sql_email);
                mysqli_stmt_bind_param($stmt, "s", $correo);
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);

                // Verificar si se encontró un resultado
                if (mysqli_num_rows($resultado) == 1) {
                    mysqli_stmt_close($stmt);
                    enviarRespuestaJSON(1) ;
                }
            }else{
                enviarRespuestaJSON("El email ingresado no es valido.") ;
            }
        }

            $sql = "INSERT INTO usuarios (name, email, terminos, password, rol, estado, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",  $name, $correo, $check, $passwordHashed, $rol, $estado, $createdAt);
            $success = mysqli_stmt_execute($stmt);
            if ($success) {
                mysqli_stmt_close($stmt);
                enviarRespuestaJSON(2) ;
            }
            
        
    }else{
        session_destroy();
        enviarRespuestaJSON('Recarga la pagina y vuelve a intentarlo') ;
    }
}else{

    session_destroy();
    header('location:../');
}

<?php
//! PROCESO PARA GENERAR EL TOKEN DE CAMBIO DE PASSWORD Y ENVIAR EL EMAIL CON EL PROCESO DE LA SOLICITUD / AMBIENTE DE PRUEBAS CON MAILTRAP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../conexion.php';
    require_once '../config.php';
    require_once '../main.php';

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {

        $email = limpiar_cadena($data['email']);
        $token = generarToken();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma.');
        }
        // Buscar usuario por correo electrónico
        $sql = "SELECT id, name FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $usuario = $stmt->get_result()->fetch_assoc();
        

        // Verificar si se encontró un USUARIO
        if ($usuario && $usuario !== null) {
            // Generar y actualizar token
            $sqlToken = "UPDATE usuarios SET token = ? WHERE id = ?";
            $stmt = $conexion->prepare($sqlToken);
            $stmt->bind_param("si", $token, $usuario['id']);
            $stmt->execute();
            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if ($affected_rows > 0) {
                //tomamos el id del usuario y lo encriptamos

                try {
                    //Server settings
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = HOST_SMTP;
                    $mail->SMTPAuth = true;
                    $mail->Port = PUERTO_SMTP;
                    $mail->Username = USER_SMTP;
                    $mail->Password = PASS_SMTP;

                    //Recipients
                    $mail->setFrom(EMAIL, EMPRESA);
                    $mail->addAddress($email);     //Add a recipient

                    //Contenido del mensaje
                    $mail->isHTML(true); // Establecer el formato del correo electrónico a HTML
                    $mail->Subject = 'Recupera tu acceso a RecargaYa';
                    $mail->Body = '
                        <p>Hola '. $usuario['name']. ',</p>
                        <p>Hemos recibido una solicitud para restablecer tu contraseña en RecargaYa.</p>
                        <p>Para continuar con el proceso, por favor haz clic en el siguiente enlace:</p>
                        <p><a href="' . BASE_URL_BACK . 'solicitar/nuevo_password/' . $token . '">Restablecer password</a></p>
                        <p>Si no solicitaste restablecer tu password, puedes ignorar este mensaje de correo electrónico.</p>
                        <p>¡Gracias por confiar en RecargaYa!</p>
                        ';
                    $mail->AltBody = 'Para restablecer tu password en RecargaYa, visita el siguiente enlace: ' . BASE_URL_BACK . 'solicitar/nuevo_password/' . $token;
                    $mail->send();

                    $_SESSION['newPassword'] = $usuario['id'];
                    $stmt->close();
                    enviarRespuestaJSON(1);

                } catch (Exception $e) {
                    enviarRespuestaJSON("Error al enviar el mensaje: {$mail->ErrorInfo}");
                }
            }
        } else {
            mysqli_stmt_close($stmt);
            enviarRespuestaJSON('Este email no se encuentra registrado.');
        }
    } else {
        session_destroy();
        enviarRespuestaJSON('Token no valido, Recarga la pagina!');
    }
} else {
    session_destroy();
    header('location:../');
}

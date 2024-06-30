<?php
//! PROCESO PARA GENERAR EL TOKEN DE CAMBIO DE PASSWORD Y ENVIAR EL EMAIL CON EL PROCESO DE LA SOLICITUD / AMBIENTE PRODUCCION CON LA API DE BREVO
require_once('../../vendor/autoload.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../conexion.php';
    require_once '../config.php';
    require_once '../main.php';

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {


        $email = limpiar_cadena($data['email']);
        $token = generarToken();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma.');
            echo 1;
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
                // Configure API key authorization: api-key
                $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', API_KEY_BREVO);

                $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );

                $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
                    'subject' => 'Recuperar cuenta',
                    'sender' => ['name' => EMPRESA, 'email' => EMAIL],
                    'to' => [['email' => $email]],
                    'htmlContent' => '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 40px;
                            }

                            .container {
                                align-items: center;
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #ffffff;
                                padding: 20px;
                                border-radius: 10px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }

                            h1 {
                                text-align: center;
                                color: #111111;
                                font-size: 27px;
                            }

                            h2 {
                                color: #333333;
                                font-size: 18px;
                            }

                            p {
                                color: #555555;
                                line-height: 1.6;
                                text-align: center;
                                font-size: 15px;
                            }
                            span {
                                font-weight:bold;
                            }
                            
                            .footer h3 {
                                color: #555555;
                                text-align: center;
                                font-size: 15px;
                                margin-bottom: 2px;
                            }

                            a {
                                text-align: center;
                                padding-left: 25px;
                                padding-right: 25px;
                                padding-top: 10px;
                                padding-bottom: 10px;
                                border-radius: 5px;
                                font-size: 16px;
                            }

                            .footer {
                                text-align: center;
                                color: #888888;
                                font-size: 12px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h1>Recupera el acceso a tu cuenta</h1>
                            <h2>Para continuar con el proceso, por favor haz clic en el siguiente enlace: </h2>
                            <br>
                            <a href="' . BASE_URL_BACK . 'solicitar/nuevo_password/' . $token . '">Click aqui para restablecer contraseña</a>
                            <br>
                            <br>
                            <p><span>Aviso: </span>Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje.</p>
                            <div class="footer">
                                <h3>¡Gracias por confiar en Nosotros!</h3>
                                &copy; RecargaYa Colombia - ' . date("Y") . '
                            </div>
                        </div>
                    </body>
                    </html>
                    '
                ]);
                
                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    // print_r($result);
                    $_SESSION['newPassword'] = $usuario['id'];
                    $stmt->close();
                    enviarRespuestaJSON(1);

                } catch (Exception $e) {
                    // echo 'Excepción al enviar el correo: ', $e->getMessage(), "\n";
                    enviarRespuestaJSON("Error al enviar el mensaje, Por favor escribemos y describe tu problema");
                }
            }
        } else {
            $stmt->close();
            enviarRespuestaJSON("Error al enviar el mensaje, Este correo no existe en nuestra plataforma");
        }
    } else {
        enviarRespuestaJSON('Token no valido, Recarga la pagina');
    }
} else {
    session_destroy();
    header('location:../../');
}

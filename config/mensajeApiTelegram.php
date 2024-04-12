<?php

require_once('./conexion.php');
require_once('./main.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['csrf_token']) {

        // Token del bot proporcionado por BotFather
        $botToken = TELEGRAM_TOKEN;

        // ID del chat donde quieres enviar el mensaje
        $chatId = TELEGRAM_ID_CHAT;

        // Datos del formulario
        $idHash = openssl_decrypt($_POST['id'], AES, KEY);
        $id = (int)limpiar_cadena($idHash);
        $name = limpiar_cadena($_POST['name']);
        $documento = limpiar_cadena($_POST['documento']);
        $idJugador = limpiar_cadena($_POST['idJugador']);
        $valor = (int)limpiar_cadena($_POST['valor']);
        $createdAt = limpiar_cadena($_POST['createdAt']);
        $tipo = 'Recarga';
        $response = array();
        $valorMinimo = 30000;

        // Recibir el archivo de imagen
        $imagen = $_FILES['imagen'];
        $fileTmpPath = $imagen['tmp_name'];
        $fileName = $imagen['name'];
        $fileType = $imagen['type'];

        // Verificar si se subió un archivo
        if ($imagen['error'] !== UPLOAD_ERR_OK) {
            // Error al subir el archivo
            $response['mensaje'] = "Error: No se pudo subir la imagen.";
            exit;
        }

        // Verificar si el archivo es una imagen válida
        $extensionesValidas = array("jpg", "jpeg", "png", "gif");

        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, $extensionesValidas)) {
            // Extensión de imagen no válida
            $response['mensaje'] = "Error: La extensión de la imagen no es válida.";
            exit;
        }

        if (empty($id) || empty($name) || empty($documento) || empty($idJugador) || empty($valor)) {
            $response['mensaje'] = "Tus datos no son aceptados en nuestra plataforma";
            exit;
        }

        if ($valor < $valorMinimo) {
            $response['mensaje'] = "Este valor no puede ser recargado";
            exit;
        }
        $valorFormateado = number_format($valor, 2);
        
        if (count($response) == 0) {
            // Mensaje a enviar
            $mensaje = "COMPROBANTE DE PAGO:
            \nCordial saludo, nueva RECARGA a realizar:
            \nNOMBRE: $name
            \nDOCUMENTO: $documento
            \nID JUGADOR: $idJugador
            \nVALOR A RECARGAR: $ $valorFormateado
            \n ";


            // URL de la API de Telegram para enviar mensajes
            $telegramUrl = "https://api.telegram.org/bot$botToken/sendPhoto";

            // Campos de la solicitud POST
            $postFields = array(
                'chat_id' => $chatId,
                'caption' => $mensaje,
                'photo' => new CURLFile($fileTmpPath, $fileType, $fileName), // Usa CURLFile para manejar el archivo adjunto
            );

            // Inicializar cURL para realizar la solicitud POST
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $telegramUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Ejecutar la solicitud y obtener la respuesta
            $response = curl_exec($ch);

            // Cerrar cURL
            curl_close($ch);

            // Comprobar si se envió correctamente
            if ($response && json_decode($response)->ok) {

                // LA RESPUESTA FUE CORRECTA 
                $sql = "INSERT INTO operaciones(id_usuario, tipo, valor, createdAt) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, "isss", $id, $tipo, $valor, $createdAt);
                $success = mysqli_stmt_execute($stmt);
                if($success){
                    echo 1;
                    exit();
                }

            } else {
                echo 2;
                exit();
            }
        } else {

            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    } else {

        header('Content-Type: application/json');
        echo "Token no valido, Recarga la pagina";
        exit();
    }
} else {
    session_destroy();
    header('location:../');
}

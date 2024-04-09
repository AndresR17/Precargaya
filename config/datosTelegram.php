<?php
session_start();

if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    // Token del bot proporcionado por BotFather
    $botToken = "6647970558:AAFlwJIlCUP6l_9qQsV4521u9OWLkSNmlMw";

    // ID del chat donde quieres enviar el mensaje
    $chatId = "5550985645";

    // Datos del formulario
    $nombre = $_POST['name-ope'];
    $documento = $_POST['doc-ope'];
    $idJugador = $_POST['idJugador-ope'];

    $fileTmpPath = $_FILES['com-ope']['tmp_name'];
    $fileName = $_FILES['com-ope']['name'];
    $fileType = $_FILES['com-ope']['type'];

    $texto = "Este es el comprobante de mi pago";

    // Mensaje a enviar
    $mensaje = "Nuevo operacion a realizar deposito:\nNombre: $nombre\nDocumento: $documento\nId Jugador: $idJugador\nMensaje: $texto";

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
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }

} else {

    // Error CSRF
    echo "Error CSRF: token no válido";
    
}

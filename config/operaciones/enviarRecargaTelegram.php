<?php
//!PROCESO PARA ENVIAR LA INFORMACION A LA API DE TELEGRAM AL MOMENTO DE REALIZAR UNA RECARGA


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../conexion.php');
    require_once('../main.php');

    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['csrf_token']) {


        // Datos del formulario
        $idHash = openssl_decrypt($_POST['id'], AES, KEY);
        $id = (int)limpiar_cadena($idHash);
        $name = limpiar_cadena($_POST['name']);
        $documento = limpiar_cadena($_POST['documento']);
        $contacto = limpiar_cadena($_POST['contacto']);
        $idJugador = limpiar_cadena($_POST['idJugador']);
        $casaApuestas = limpiar_cadena($_POST['casaApuestas']);
        $valor = (int)limpiar_cadena($_POST['valor']);
        $createdAt = limpiar_cadena($_POST['createdAt']);
        $tipo = "Recarga";
        $valorMinimo = 30000;

        // Recibir el archivo de imagen
        $imagen = $_FILES['imagen'];
        $fileTmpPath = $imagen['tmp_name'];
        $fileName = $imagen['name'];
        $fileType = $imagen['type'];

        // Verificar si se subió un archivo
        if ($imagen['error'] !== UPLOAD_ERR_OK) {
            enviarRespuestaJSON('Error: No se pudo subir la imagen.!');
        }

        $extensionesValidas = array("jpg", "jpeg", "png", "gif");

        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, $extensionesValidas)) {
            // Extensión de imagen no válida
            enviarRespuestaJSON('Error: La extensión de la imagen no es válida.!');
        }

        if (empty($id) || empty($name) || empty($documento) || empty($idJugador) || empty($valor) || empty($createdAt) || empty($contacto) || empty($casaApuestas)) {
            enviarRespuestaJSON('Tus datos no son aceptados en nuestra plataforma.!');
        }

        if(!is_numeric($valor) || !is_numeric($documento) || !is_numeric($id)){         
            enviarRespuestaJSON('Ingresaste datos incorrectos!');
        }

        if ($valor < $valorMinimo) {
            enviarRespuestaJSON('Este valor no puede ser recargado!');
        }

        $valorFormateado = number_format($valor, 2);
        
            // Mensaje a enviar
            $mensaje = "Comprobante de pago:"
            . "\nCordial saludo, ** RECARGA ** a realizar:"
            . "\n "
            . "\nNOMBRE: $name"
            . "\nDOCUMENTO: $documento"
            . "\nCONTACTO: $contacto"
            . "\n "
            . "\nID JUGADOR: $idJugador"
            . "\nCASA DE APUESTAS: $casaApuestas"
            . "\nVALOR A RECARGAR: $ $valorFormateado"
            . "\n "
            . "\n ************** | Gracias | ****************";


            // URL de la API de Telegram para enviar mensajes
            $telegramUrl = "https://api.telegram.org/bot". TELEGRAM_TOKEN ."/sendPhoto";

            // Campos de la solicitud POST
            $postFields = array(
                'chat_id' => TELEGRAM_ID_CHAT,
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
                $sql = "INSERT INTO operaciones(id_usuario, idJugador, casaDeApuestas, valor, tipo, createdAt) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, "isssss", $id, $idJugador, $casaApuestas, $valor, $tipo, $createdAt);
                $success = mysqli_stmt_execute($stmt);
                if($success){
                    enviarRespuestaJSON(1);
                    exit();
                }

            } else {
                enviarRespuestaJSON(2);
                exit();
            }
        
    } else {
        enviarRespuestaJSON('Token no valido, Recarga la pagina!');
    }
} else {
    session_destroy();
    header('location:../');
}

<?php

require_once('./conexion.php');
require_once('./main.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_SESSION['csrf_token']) && $data['token'] === $_SESSION['csrf_token']) {

        // Datos del formulario
        $idHash = openssl_decrypt($data['id'], AES, KEY);
        $id = (int)limpiar_cadena($idHash);
        $name = limpiar_cadena($data['name']);
        $documento = limpiar_cadena($data['documento']);
        $contacto = limpiar_cadena($data['contacto']);
        $idJugador = limpiar_cadena($data['idJugador']);
        $casaApuestas = limpiar_cadena($data['casaApuestas']);
        $codigo = limpiar_cadena($data['codigo']);
        $entidad = limpiar_cadena($data['entidad']);
        $cuenta = (int)limpiar_cadena($data['cuenta']);
        $valor = (int)limpiar_cadena($data['valor']);
        $createdAt = limpiar_cadena($data['createdAt']);
        $tipo = "Retiro";

        $valorMinimo = 100000;
        
        if (empty($id) || empty($name) || empty($documento) || empty($idJugador) || empty($valor) || empty($codigo) || empty($entidad) || empty($createdAt) || !is_numeric($cuenta) || !is_numeric($documento) || !is_numeric($valor) || !is_numeric($id) ||empty($contacto) || empty($casaApuestas)) {
            enviarRespuestaJSON('Tus datos son incorrectos!');
        }

        if ($valor < $valorMinimo) {
            enviarRespuestaJSON('Este valor no puede ser retirado!');
        }
        
        $valorFormateado = number_format($valor, 2);
        
        $mensaje = "Cordial Saludo:"
        . "\n** RETIRO ** a realizar:"
        . "\n "
        . "\n-NOMBRE: $name "
        . "\n-DOCUMENTO: $documento"
        . "\n-CONTACTO: $contacto"
        . "\n "
        . "\n-ID JUGADOR: $idJugador"
        . "\n-CASA DE APUESTAS: $casaApuestas"
        . "\n-CODIGO DE RETIRO: $codigo"
        . "\n "
        . "\n-ENTIDAD FINANCIERA: $entidad"
        . "\n-No DE CUENTA: $cuenta"
        . "\n-VALOR A RETIRAR: $ $valorFormateado"
        . "\n "
        . "\n*********** | Gracias | ************";



            // URL de la API de Telegram para enviar mensajes
            $telegramUrl = "https://api.telegram.org/bot" . TELEGRAM_TOKEN . "/sendMessage";


            // Campos de la solicitud POST
            $postFields = array(
                'chat_id' => TELEGRAM_ID_CHAT,
                'text' => $mensaje,
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
                $sql = "INSERT INTO operaciones(id_usuario, idJugador, casaDeApuestas, tipo, entidad, valor, createdAt) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, "issssss", $id, $idJugador, $casaApuestas, $tipo, $entidad, $valor, $createdAt);
                $success = mysqli_stmt_execute($stmt);
                if($success){
                    enviarRespuestaJSON(1);
                }
                
            } else {
                enviarRespuestaJSON(2);
            }
        
    } else {
        enviarRespuestaJSON('Token no valido, Recarga la pagina');
    }
} else {
    session_destroy();
    header('location:../');
}

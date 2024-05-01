<?php
require_once('../../vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '');

$apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);

$sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
    'subject' => 'RecargaYa!',
    'sender' => ['name' => 'RecargaYa', 'email' => 'recarga890@gmail.com'],
    'to' => [['name' => 'Max Mustermann', 'email' => 'eduar.cruz9715@gmail.com']],
    'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
    'params' => ['bodyMessage' => 'Este es un correo de prueba!']
]); 

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
    
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}


<?php 

$publicKey = "pub_test_TWj13GmeFpTJYr4iPuZadTjFghK4d68z";
$currency = "COP";
$amountInCents = 9250000;
$reference = "ASD5674892JAS1-";


$stringToHash = $reference . $amountInCents. $currency. $publicKey ;
// "tu_llave_privada" es tu clave privada proporcionada por Wompi

// Calcular el hash SHA256
$signature = hash("sha256", $stringToHash);

echo $signature ;

?>
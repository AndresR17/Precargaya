<?php

require_once('conexion.php');

$sql = "SELECT * FROM clientes  ORDER BY name ASC LIMIT 1,10";
$query = mysqli_query($conexion, $sql);


if ($query && mysqli_num_rows($query) == 1) {

    $response = mysqli_fetch_assoc($query);

    // Devuelve la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    
}

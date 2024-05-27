<?php
require_once('config.php');
require_once('../config/conexion.php');

validarSession($_SESSION['admin']);
require_once('../config/helper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- libreria AXIOS  -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Libreria para mostrar alertas  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>RecargaYa</title>
    <link rel="shortcut icon" href="<?= BASE_URL . 'img/logo-antes.jpg'?>" type="image/x-icon">
    <?php
    // if ($_SERVER["HTTPS"] != "on") {
    //     // Redirige a la versión HTTPS de la misma página
    //     $redirect_url = "https://www.mussacafec.com/";
    //     header("Location: $redirect_url");
    //     exit();
    //     } 
    ?>
</head>

<body class="bg-gray-900">
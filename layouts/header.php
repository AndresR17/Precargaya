<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- libreria splide para el slide -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    <!-- libreria aos para animaciones al scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- libreria AXIOS  -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Libreria para mostrar alertas  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>RecargaYa</title>
    <link rel="shortcut icon" href="img/logo-antes.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./src/css/app.css">
    <?php
    // if ($_SERVER["HTTPS"] != "on") {
    //     // Redirige a la versión HTTPS de la misma página
    //     $redirect_url = "https://www.mussacafec.com/";
    //     header("Location: $redirect_url");
    //     exit();
    //     } 
    ?>
</head>

<body class="bg-black">
<?php require_once('config.php'); ?>

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

    <title>RecargaYa - Colombia</title>
    <link rel="shortcut icon" href="<?= BASE_URL . 'img/logo-antes.jpg'?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= BASE_URL . 'src/css/app.css'; ?>">
    <script type="module" src="<?= BASE_URL . 'src/js/app.js' ?>"></script>

    <script type="text/javascript" src="https://checkout.wompi.co/widget.js"></script>

    <?php
    // if ($_SERVER["HTTPS"] != "on") {
    //     // Redirige a la versión HTTPS de la misma página
    //     $redirect_url = "https://www.recargayacolombia.com/";
    //     header("Location: $redirect_url");
    //     exit();
    //     } 
    ?>
</head>

<body class="flex flex-col bg-black min-h-screen">

    <!-- Boton de whatsap  -->
    <div data-dial-init class="z-50 fixed end-6 bottom-10 md:bottom-24 group">
        <a href="https://wa.link/xtfpkd" target="_blank" type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default" aria-expanded="false" class="flex items-center justify-center rounded-full w-14 h-14 bg-green-600 focus:outline-none hover:scale-110 transition duration-300">
            <img src="<?= BASE_URL . 'img/footer/Print_Glyph_White.png' ?>" alt="" class="w-8 h-8">
            <span class="sr-only">Open actions menu</span>
        </a>
    </div>
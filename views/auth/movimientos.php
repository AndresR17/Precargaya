<?php

require_once('../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/nav.php');

if (!isset($_SESSION['user'])) {
    header('location:index.php');
}

?>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white">Movimientos del usuario</h1>
</section>

<?php require_once(__DIR__ . '/../../layouts/footer.php') ?>
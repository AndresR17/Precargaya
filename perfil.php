<?php

require_once('./layouts/header.php');
if(!isset($_SESSION['user'])) {
    header('location:index.php') ;
} 
require_once('./layouts/nav.php');
?>

<section  class="flex flex-col xl:flex-row my-[5rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white">perfil aqui</h1>
</section>
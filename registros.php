<?php
require_once('./layouts/header.php');
if(!isset($_SESSION['user'])){
    header('location:index.php');
}
require_once('./layouts/nav.php');
?>

<section class="mt-24">
    <p class="text-white text-2xl text-center">Aqui se mostraran todos los registros de los clientes</p>
</section>

<?php require_once('./layouts/footer.php') ?>
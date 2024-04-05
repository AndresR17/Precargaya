<?php
require_once('../layouts/header.php');
require_once(__DIR__ . '/../layouts/nav.php');
?>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white text-2xl">Haz tus operaciones</h1>
</section>

<section data-aos="zoom-in-down" class="flex flex-col items-center justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">

    <form method="POST" action="<?= BASE_URL . 'config/datosTelegram.php'?>" enctype="multipart/form-data" >
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name-ope" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="name-ope" name="name-ope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="doc-ope" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documento</label>
                <input type="text" id="doc-ope" name="doc-ope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
        </div>
        <div class="mb-6">
            <label for="idJugador-ope" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id jugador</label>
            <input type="text" id="idJugador-ope" name="idJugador-ope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Comprobante de pago</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="com-ope" type="file">
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar datos</button>
    </form>

</section>

<?php require_once(__DIR__ . '/../layouts/footer.php') ?>
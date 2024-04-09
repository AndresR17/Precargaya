<?php
require_once('../layouts/header.php');
require_once(__DIR__ . '/../layouts/nav.php');
?>

<section class="flex flex-col xl:flex-row mt-[10rem] mb-[5rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white text-4xl">Retiros y Recargas de Dinero en 1xBet: ¡Gestiona tus Fondos con Confianza!</h1>
</section>

<section class="flex flex-col xl:flex-row mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <?php if (isset($_SESSION['user'])) :  ?>
        <p class="text-gray-200 text-lg">¡Bienvenido a nuestro formulario para retiros y recargas de dinero en 1xBet! Aquí encontrarás una manera fácil y segura de gestionar tus fondos de juego en nuestra plataforma. Por favor, completa los campos a continuación con la información requerida para procesar tu solicitud de retiro o recarga.</p>
    <?php else : ?>
        <p class="text-gray-200 text-lg">¡Bienvenido a nuestro formulario para retiros y recargas de dinero en 1xBet! Aquí encontrarás una manera fácil y segura de gestionar tus fondos de juego en nuestra plataforma. Por favor <span class="font-semibold text-blue-300">inicia sesion en nuestra plataforma para habilitar el siguiente formulario</span> , y asi procesar tu solicitud de retiro o recarga.</p>
    <?php endif; ?>
</section>

<section data-aos="zoom-in-down" class="flex flex-col items-center justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">

    <form method="POST" action="<?= BASE_URL . 'config/datosTelegram.php'; ?>" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="name-ope" class="block mb-2 text-base font-medium text-white">Nombre</label>
                <input type="text" id="name-ope" name="name-ope" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
            </div>
            <div>
                <label for="doc-ope" class="block mb-2 text-base font-medium text-white">Documento</label>
                <input type="text" id="doc-ope" name="doc-ope" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
            </div>

            <div class="mb-6">
                <label for="idJugador-ope" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                <input type="text" id="idJugador-ope" name="idJugador-ope" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID de 1XBET"/>
            </div>
            <div class="mb-6">
                <label for="idJugador-ope" class="block mb-2 text-base font-medium text-white">Valor a depositar</label>
                <input type="text" id="idJugador-ope" name="idJugador-ope" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $30.000"/>
            </div>

        </div>

        <div class="mb-6">
            <label class="block mb-2 text-base font-medium text-white" for="file_input">Comprobante de pago</label>
            <input class="block w-full text-base border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600" id="file_input" name="com-ope" type="file">
        </div>

        <?php if (isset($_SESSION['user'])) : ?>
            <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-8 py-2.5 text-center transition hover:scale-110">Realizar operacion</button>
        <?php endif; ?>

    </form>

</section>

<?php require_once(__DIR__ . '/../layouts/footer.php'); ?>
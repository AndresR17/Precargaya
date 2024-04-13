<?php
require_once('../layouts/header.php');
require_once(__DIR__ . '/../layouts/nav.php');
require_once(__DIR__ . '/../layouts/slide.php');
?>

<section data-aos="zoom-in" class="flex flex-col xl:flex-row mt-[6rem] mb-[5rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white text-4xl">Retiros y Recargas de Dinero en <span class="font-semibold text-blue-500 uppercase">1xBet</span></h1>
</section>


<section data-aos="zoom-in-up" class="flex flex-col xl:flex-row mx-5 mb-[3rem] md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">

    <?php if (!isset($_SESSION['user'])) :  ?>
        <p class="text-gray-200 text-lg">¡Bienvenido a nuestra seccion para retirar o recargar tu cuenta de <span class="font-semibold text-blue-500 uppercase">1xBet</span>! Aquí encontrarás una manera fácil y segura de gestionar tus fondos de juego en nuestra plataforma. Por favor <span class="font-semibold text-blue-500">inicia sesion en nuestra plataforma para habilitar cada formulario correspondiente</span> , y asi procesar tu solicitud de retiro o recarga.</p>

    <?php else : ?>
        <p class="text-gray-50 text-xl">¡Bienvenido a nuestra seccion para retirar o recargar tu cuenta de <span class="font-semibold text-blue-500 uppercase">1xBet</span>! Aquí encontrarás una manera fácil y segura de gestionar tus fondos de juego en nuestra plataforma. <br> Haz click en la operacion que desea realizar.</p>
    <?php endif; ?>

</section>

<!-- BOTONES PARA MOSTRAR LOS FORMULARIOS -->
<section class="flex flex-col mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] justify-center">

    <div class="flex w-full space-x-3">
        <button id="btn-retirar" type="button" class="flex w-full text-base text-white border items-center focus:outline-none focus:ring-4 font-medium rounded px-5 py-2.5 me-2 mb-2 bg-gray-800 border-gray-600 hover:bg-gray-700 focus:ring-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
            </svg>
            Retirar saldo
        </button>
        <button id="btn-recargar" type="button" class="flex w-full text-base text-white border items-center focus:outline-none focus:ring-4 font-medium rounded px-5 py-2.5 me-2 mb-2 bg-gray-800 border-gray-600 hover:bg-gray-700 focus:ring-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            Recargar saldo
        </button>
    </div>

</section>

<!-- DIV CREADO PARA QUE LA PAGINA SE POCISIONE EN ESTE DIV  -->
<div id="form"></div>

<!-- SECCION PARA RETIRAR -->
<section id="section-retirar" data-aos="zoom-in-down" class="hidden transition flex flex-col justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">

    <form method="POST" id="formRetirar" action="<?= BASE_URL . 'config/datosTelegram.php'; ?>" enctype="multipart/form-data" autocomplete="off">
        <fieldset class="w-full border border-gray-600 p-8  rounded-lg">
            <legend class="text-gray-200 text-base text-base border border-gray-600 px-4 py-2 rounded">
                Completa los campos a continuación para realizar tu retiro.
            </legend>

            <input type="hidden" id="token_retirar" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="hidden" id="id-retirar" value="<?= openssl_encrypt($user['id'], AES, KEY);  ?>">
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="user_retirar" class="block mb-2 text-base font-medium text-white">Nombre</label>
                    <input type="text" id="user_retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
                </div>
                <div>
                    <label for="doc-retirar" class="block mb-2 text-base font-medium text-white">Documento</label>
                    <input type="text" id="doc-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
                </div>

                <div class="">
                    <label for="idJugador-retirar" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                    <input type="text" id="idJugador-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID de 1XBET" />
                </div>
                <div class="">
                    <label for="cod-retirar" class="block mb-2 text-base font-medium text-white">Codigo de retiro</label>
                    <input type="text" id="cod-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" />
                </div>

            </div>
            <div class="my-6">
                <label for="ent-retirar" class="block mb-2 text-base font-medium text-white">Entidad financiera</label>
                <select id="ent-retirar" class=" border text-base rounded-lg focus:ring-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option selected>--Selccione una opcion--</option>
                    <option value="Bancolombia">Bancolombia</option>
                    <option value="Davivienda">Davivienda</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="cuenta-retirar" class="block mb-2 text-base font-medium text-white">Numero de cuenta</label>
                <input type="text" id="cuenta-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div class="mb-6">
                <label for="valor-retirar" class="block mb-2 text-base font-medium text-white">Valor a Retirar</label>
                <input type="text" id="valor-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $100.000" />
            </div>


            <?php if (isset($_SESSION['user'])) : ?>
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-10 py-2.5 text-center transition hover:scale-110 ">Realizar operación</button>
            <?php endif; ?>
        </fieldset>
    </form>

</section>

<!-- SECCION PARA RECARGAR -->
<section id="section-recargar" data-aos="zoom-in-down" class="hidden transition flex flex-col justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">
    <form method="POST" id="formRecargar" enctype="multipart/form-data" autocomplete="off">
        <fieldset class="w-full border border-gray-600 p-8  rounded-lg">
            <legend class="text-gray-200 text-base text-base border border-gray-600 px-4 py-2 rounded">
                Completa los campos a continuación para realizar tu recarga.
            </legend>

            <input type="hidden" id="token_recargar" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="hidden" id="idRecargar" value="<?= openssl_encrypt($user['id'], AES, KEY);  ?>">

            <div class="grid gap-6 md:grid-cols-2">

                <div id="resUserRecargar">
                    <label for="name-recargar" class="block mb-2 text-base font-medium text-white">Nombre</label>
                    <input type="text" id="name-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
                </div>
                <div id="resDocRecargar">
                    <label for="doc-recargar" class="block mb-2 text-base font-medium text-white">Documento</label>
                    <input type="text" id="doc-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
                </div>

                <div class="mb-6" id="resIDjugadorRecargar">
                    <label for="idJugador-recargar" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                    <input type="text" id="idJugador-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID de 1XBET" />
                </div>
                <div class="mb-6" id="resValorRecargar">
                    <label for="valor-recargar" class="block mb-2 text-base font-medium text-white">Valor a depositar</label>
                    <input type="text" id="valor-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $30.000" />
                </div>

            </div>

            <div class="mb-6" id="resComprobanteRecargar">
                <label class="block mb-2 text-base font-medium text-white" for="comprobante_recargar">Comprobante de pago</label>
                <input class="block w-full text-base border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600" id="comprobante_recargar" type="file">
            </div>

            <?php if (isset($_SESSION['user'])) : ?>
                <div id="btn-submit">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-8 py-2.5 text-center transition hover:scale-110">Realizar operacion</button>
                </div>
                
            <?php endif; ?>
        </fieldset>
    </form>

</section>



<script type="module" src="<?= BASE_URL . 'src/js/formOperaciones.js' ?>"></script>

<?php require_once(__DIR__ . '/../layouts/footer.php'); ?>
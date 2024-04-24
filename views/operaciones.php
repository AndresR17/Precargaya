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

<!-- SECCION PARA RETIRAR -->
<section id="section-retirar" data-aos="zoom-in-down" class="hidden transition flex flex-col justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">

    <form id="formRetirar" method="POST" autocomplete="off">
        <fieldset class="w-full border border-gray-600 p-8  rounded-lg">
            <legend class="text-gray-200 text-base text-base border border-gray-600 px-4 py-2 rounded">
                Completa los campos a continuación para realizar tu retiro.
            </legend>

            <input type="hidden" id="tokenRetirar" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="hidden" id="idRetirar" value="<?= openssl_encrypt($user['id'], AES_FRONT, KEY_FRONT);  ?>">

            <div class="grid gap-6 md:grid-cols-2">
                <div id="resUserRetirar">
                    <label for="nameRetirar" class="block mb-2 text-base font-medium text-white">Nombre completo</label>
                    <input type="text" id="nameRetirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
                </div>

                <div id="resDocRetirar">
                    <label for="doc-retirar" class="block mb-2 text-base font-medium text-white">N° documento</label>
                    <input type="text" id="doc-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
                </div>

                <div id="resContactoRetirar">
                    <label for="contacto-retirar" class="block mb-2 text-base font-medium text-white">N° contacto</label>
                    <input type="text" id="contacto-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['phone'] : ''; ?>" />
                </div>
                <div id="resIDjugadorRetirar">
                    <label for="idJugador-retirar" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                    <input type="text" id="idJugador-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID o numero de cuenta" />
                </div>

                <div id="resCasaApuestasRetirar">
                    <label for="casaApuestas-retirar" class="block mb-2 text-base font-medium text-white">Casa de apuestas</label>
                    <select id="casaApuestas-retirar" class="border border-gray-300 text-base rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option value="" selected>--Seleccione una opcion--</option>
                        <option value="1XBET">1XBET</option>
                        <option value="BETWINNER">BETWINNER</option>
                        <option value="22BET">22BET</option>
                        <option value="88STARZ">88STARZ</option>
                    </select>
                </div>
                <div id="resCodigoRetirar">
                    <label for="cod-retirar" class="block mb-2 text-base font-medium text-white">Codigo de retiro</label>
                    <input type="text" id="cod-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" />
                </div>

            </div>
            <div class="my-6" id="resEntRetirar">
                <label for="ent-retirar" class="block mb-2 text-base font-medium text-white">Entidad financiera</label>
                <select id="ent-retirar" class=" border text-base rounded-lg focus:ring-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>--Selccione una opcion--</option>
                    <option value="Bancolombia">Bancolombia</option>
                    <option value="Davivienda">Davivienda</option>
                </select>
            </div>

            <div class="mb-6" id="resCuentaRetirar">
                <label for="cuenta-retirar" class="block mb-2 text-base font-medium text-white">N° de cuenta para recibir fondos</label>
                <input type="text" id="cuenta-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div class="mb-6" id="resValorRetirar">
                <label for="valor-retirar" class="block mb-2 text-base font-medium text-white">Valor a Retirar</label>
                <input type="number" id="valor-retirar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $100.000" />
            </div>

            <?php if (isset($_SESSION['user'])) : ?>
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-10 py-2.5 text-center transition hover:scale-110 ">Realizar operación</button>
            <?php else : ?>
                <div>
                    <p class="text-red-600 text-base mb-2 text-white ">Para continuar, <span class="text-red-600 font-bold">inicia sesión o regístrate</span> para disfrutar de todas las funciones disponibles.</p>
                    <button type="button" data-modal-target="modal-login" data-modal-toggle="modal-login" class="inline-flex items-center rounded px-4 py-2 text-sm font-medium text-white uppercase bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br">
                        Iniciar sesion
                    </button>
                </div>
            <?php endif; ?>
        </fieldset>
    </form>

</section>

<!-- SECCION PARA RECARGAR -->
<section id="section-recargar" data-aos="zoom-in-down" class="hidden transition flex flex-col justify-center md:space-y-6 lg:space-x-4 my-10 mx-5 md:mx-[2rem] xl:mx-[10rem] p-4">

    <!-- seccion para mostrar donde pagar  -->
    <div class="flex flex-col space-y-6 p-2">
        <h1 class="text-white text-2xl">Nuestras cuentas para depósito</h1>

        <div class="flex space-x-6">
            <div class="flex items-center space-x-2 border border-gray-600 px-8 py-6 rounded-lg space-y-1 hover:scale-110 transition">
                <div class="">
                    <h3 class="text-white underline font-semibold text-base tracking-wide uppercase">Bancolombia Ahorros</h3>
                    <h4 class="text-blue-500 text-base">Nombre: <span class="text-white uppercase">Inversiones Dandres</span> </h4>
                    <p class="text-blue-500 text-base">No Cuenta: <span class="text-white tracking-wide">23300003291</span></p>
                    <!-- <p class="text-blue-500 text-base">NIT: <span class="text-white tracking-wide">901726824</span></p> -->
                </div>
                <img src="<?= BASE_URL . 'img/operaciones/logoBancolombia.png'; ?>" alt="Logo bancolombia" class="h-20">
            </div>

            <div class="flex items-center space-x-2 border border-gray-600 px-8 py-6 rounded-lg space-y-1 hover:scale-110 transition">
                <div class="">
                    <h3 class="text-white underline font-semibold text-base tracking-wide uppercase">Davivienda Ahorros</h3>
                    <h4 class="text-blue-500 text-base">Nombre: <span class="text-white uppercase">Inversiones Dandres</span> </h4>
                    <p class="text-blue-500 text-base">No Cuenta: <span class="text-white tracking-wide">489870025892</span></p>
                    <!-- <p class="text-blue-500 text-base">NIT: <span class="text-white tracking-wide">901726824</span></p> -->
                </div>
                <img src="<?= BASE_URL . 'img/operaciones/logoDavivienda.png'; ?>" alt="Logo bancolombia" class="h-20">
            </div>

            <button data-modal-target="modal-codigoQR" data-modal-toggle="modal-codigoQR" type="button" class="block flex flex-col justify-center items-center border border-gray-600 px-12 py-6 rounded-lg space-y-1 hover:scale-110 transition tracking-wide uppercase text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-8 py-3 me-2 mb-2 underline">
                <span>Pagar por codigo QR</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                </svg>
            </button>

            <div class="flex flex-col justify-center items-center border border-gray-600 px-8 py-6 rounded-lg space-y-1 hover:scale-110 transition">
                <a href="#" target="_blank" class="flex flex-col items-center justify-center tracking-wide text-white font-medium rounded-lg text-base px-8 py-3 me-2 mb-2 underline">
                    PAGOS CON TARJETA DE CREDITO
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                </a>
                <p class="text-blue-500">Recuerda: <span class="text-md text-gray-200"> Por deposito con tarjeta te cobramos el 3%</span></p>
            </div>
        </div>
    </div>

    <form method="POST" id="formRecargar" enctype="multipart/form-data" autocomplete="off">
        <fieldset class="w-full border border-gray-600 p-8  rounded-lg">
            <legend class="text-gray-200 text-base text-base border border-gray-600 px-4 py-2 rounded">
                Completa los campos a continuación para realizar tu recarga.
            </legend>

            <input type="hidden" id="token_recargar" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="hidden" id="idRecargar" value="<?= openssl_encrypt($user['id'], AES_FRONT, KEY_FRONT);  ?>">

            <div class="grid gap-6 md:grid-cols-2">
                <div id="resUserRecargar">
                    <label for="name-recargar" class="block mb-2 text-base font-medium text-white">Nombre completo</label>
                    <input type="text" id="name-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
                </div>
                <div id="resDocRecargar">
                    <label for="doc-recargar" class="block mb-2 text-base font-medium text-white">N° documento</label>
                    <input type="text" id="doc-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
                </div>
                <div id="resContactoRecargar">
                    <label for="contacto-recargar" class="block mb-2 text-base font-medium text-white">N° contacto</label>
                    <input type="number" id="contacto-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['phone'] : ''; ?>" />
                </div>
                <div id="resIDjugadorRecargar">
                    <label for="idJugador-recargar" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                    <input type="text" id="idJugador-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID o numero de cuenta" />
                </div>
                <div id="resCasaApuestasRecargar">
                    <label for="casaApuestas-Recargar" class="block mb-2 text-base font-medium text-white">Casa de apuestas</label>
                    <select id="casaApuestas-Recargar" class="border border-gray-300 text-base rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option value="" selected>--Seleccione una opcion--</option>
                        <option value="1XBET">1XBET</option>
                        <option value="BETWINNER">BETWINNER</option>
                        <option value="22BET">22BET</option>
                        <option value="88STARZ">88STARZ</option>
                    </select>
                </div>
                <div class="mb-6" id="resValorRecargar">
                    <label for="valor-recargar" class="block mb-2 text-base font-medium text-white">Valor a recargar</label>
                    <input type="number" id="valor-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $30.000" />
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

            <?php else : ?>
                <div>
                    <p class="text-red-600 text-base mb-2 text-white ">Para continuar, <span class="text-red-600 font-bold">inicia sesión o regístrate</span> para disfrutar de todas las funciones disponibles.</p>
                    <button type="button" data-modal-target="modal-login" data-modal-toggle="modal-login" class="inline-flex items-center rounded px-4 py-2 text-sm font-medium text-white uppercase bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br">
                        Iniciar sesion
                    </button>
                </div>
            <?php endif; ?>
        </fieldset>
    </form>

</section>

<!-- Main modal para ver el codigo QR -->
<div id="modal-codigoQR" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed top-0 right-0 left-0 bottom-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-white uppercase">
                    Escanea y realiza tu pago
                </h3>
                <button type="button" class="text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600" data-modal-hide="modal-codigoQR">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 flex items-center justify-center">
                <img src="<?= BASE_URL . 'img/operaciones/Codigo-Qr.jpg' ?>" alt="Codigo QR" class="h-[40rem]">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b border-gray-600">
                <button data-modal-hide="modal-codigoQR" type="button" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-8 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script type="module" src="<?= BASE_URL . 'src/js/formOperaciones.js' ?>"></script>

<?php require_once(__DIR__ . '/../layouts/footer.php'); ?>
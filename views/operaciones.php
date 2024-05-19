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
    <!-- <div class="flex flex-col space-y-6 p-2">
        <h1 class="text-white text-2xl">Nuestras cuentas para depósito</h1>

        <div class="flex space-x-6">
            <div class="flex items-center space-x-2 border border-gray-600 px-8 py-6 rounded-lg space-y-1 hover:scale-110 transition">
                <div class="">
                    <h3 class="text-white underline font-semibold text-base tracking-wide uppercase">Bancolombia Ahorros</h3>
                    <h4 class="text-blue-500 text-base">Nombre: <span class="text-white uppercase">Inversiones Dandres</span> </h4>
                    <p class="text-blue-500 text-base">No Cuenta: <span class="text-white tracking-wide">23300003291</span></p>
                    
                </div>
                <img src="<?= BASE_URL . 'img/operaciones/logoBancolombia.png'; ?>" alt="Logo bancolombia" class="h-20">
            </div>

            <div class="flex items-center space-x-2 border border-gray-600 px-8 py-6 rounded-lg space-y-1 hover:scale-110 transition">
                <div class="">
                    <h3 class="text-white underline font-semibold text-base tracking-wide uppercase">Davivienda Ahorros</h3>
                    <h4 class="text-blue-500 text-base">Nombre: <span class="text-white uppercase">Inversiones Dandres</span> </h4>
                    <p class="text-blue-500 text-base">No Cuenta: <span class="text-white tracking-wide">489870025892</span></p>
                    
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
    </div> -->


    <form method="POST" id="formRecargar" enctype="multipart/form-data" autocomplete="off">
        <fieldset class="w-full border border-gray-600 p-8  rounded-lg">
            <legend class="text-gray-200 text-base text-base border border-gray-600 px-4 py-2 rounded">
                Completa los campos a continuación para realizar tu recarga.
            </legend>

            <input type="hidden" id="token_recargar" value="<?= $_SESSION['csrf_token']; ?>">
            <input type="hidden" id="idRecargar" value="<?= openssl_encrypt($user['id'], AES_FRONT, KEY_FRONT);  ?>">

            <div id="resUserRecargar" class="mb-6">
                <label for="name-recargar" class="block mb-2 text-base font-medium text-white">Nombre completo</label>
                <input type="text" id="name-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500 focus:bg-gray-700" value="<?= isset($_SESSION['user']) ? $user['name'] : ''; ?>" />
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div id="resTipoDoc">
                    <label for="tipoDocRecargar" class="block mb-2 text-base font-medium text-white">Tipo de documento</label>
                    <select id="tipoDocRecargar" class="border border-gray-300 text-base rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option value="CC">Cédula de ciudadania</option>
                        <option value="CE">Cédula de extranjeria</option>
                        <option value="NIT">Número de intenficacion tributaria</option>
                        <option value="PP">Pasaporte</option>
                        <option value="DNI">Documento nacional de identidad</option>
                        <option value="RG">Carteira de identidades/Registro Geral</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div id="resDocRecargar">
                    <label for="doc-recargar" class="block mb-2 text-base font-medium text-white">N° documento</label>
                    <input type="text" id="doc-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="<?= isset($_SESSION['user']) ? $user['documento'] : ''; ?>" />
                </div>
                <div id="resContactoRecargar">
                    <label for="contacto-recargar" class="block mb-2 text-base font-medium text-white">N° contacto</label>
                    <div class="flex items-center">
                        <select name="Prefijo" id="Prefijo" class="w-1/4 border rounded-tl-lg rounded-bl-lg text-base block p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option value="+57">+57 - Colombia</option>
                            <option value="+507">+507 - Panamá</option>
                            <option value="+93">+93 - Afganistán</option>
                            <option value="+355">+355 - Albania</option>
                            <option value="+49">+49 - Alemania</option>
                            <option value="+376">+376 - Andorra</option>
                            <option value="+244">+244 - Angola</option>
                            <option value="+1 264">+1 264 - Anguila</option>
                            <option value="+672">+672 - Antártida</option>
                            <option value="+966">+966 - Arabia Saudita</option>
                            <option value="+213">+213 - Argelia</option>
                            <option value="+54">+54 - Argentina</option>
                            <option value="+374">+374 - Armenia</option>
                            <option value="+297">+297 - Aruba</option>
                            <option value="+61">+61 - Australia</option>
                            <option value="+43">+43 - Austria</option>
                            <option value="+994">+994 - Azerbaiyán</option>
                            <option value="+1">+1 - Bahamas</option>
                            <option value="+973">+973 - Bahréin</option>
                            <option value="+880">+880 - Bangladesh</option>
                            <option value="+1">+1 - Barbados</option>
                            <option value="+501">+501 - Belice</option>
                            <option value="+229">+229 - Benín</option>
                            <option value="+1">+1 - Bermudas</option>
                            <option value="+375">+375 - Bielorrusia</option>
                            <option value="+95">+95 - Birmania (Myanmar)</option>
                            <option value="+591">+591 - Bolivia</option>
                            <option value="+387">+387 - Bosnia-Herzegovina</option>
                            <option value="+267">+267 - Botsuana</option>
                            <option value="+55">+55 - Brasil</option>
                            <option value="+673">+673 - Brunéi</option>
                            <option value="+359">+359 - Bulgaria</option>
                            <option value="+226">+226 - Burkina Faso</option>
                            <option value="+257">+257 - Burundi</option>
                            <option value="+975">+975 - Bután</option>
                            <option value="+32">+32 - Bélgica</option>
                            <option value="+238">+238 - Cabo Verde</option>
                            <option value="+855">+855 - Camboya</option>
                            <option value="+237">+237 - Camerún</option>
                            <option value="+1">+1 - Canadá</option>
                            <option value="+56">+56 - Chile</option>
                            <option value="+86">+86 - China</option>
                            <option value="+357">+357 - Chipre</option>
                            <option value="+269">+269 - Comoras</option>
                            <option value="+850">+850 - Corea del Norte</option>
                            <option value="+82">+82 - Corea del Sur</option>
                            <option value="+506">+506 - Costa Rica</option>
                            <option value="+225">+225 - Costa de Marfil</option>
                            <option value="+385">+385 - Croacia</option>
                            <option value="+53">+53 - Cuba</option>
                            <option value="+599">+599 - Curazao</option>
                            <option value="+45">+45 - Dinamarca</option>
                            <option value="+253">+253 - Djibuti</option>
                            <option value="+1">+1 - Dominica</option>
                            <option value="+593">+593 - Ecuador</option>
                            <option value="+20">+20 - Egipto</option>
                            <option value="+503">+503 - El Salvador</option>
                            <option value="+212">+212 - El Sáhara Español</option>
                            <option value="+39">+39 - El Vaticano</option>
                            <option value="+971">+971 - Emiratos Árabes Unidos</option>
                            <option value="+291">+291 - Eritrea</option>
                            <option value="+421">+421 - Eslovaquia</option>
                            <option value="+386">+386 - Eslovenia</option>
                            <option value="+34">+34 - España</option>
                            <option value="+1">+1 - Estados Unidos</option>
                            <option value="+372">+372 - Estonia</option>
                            <option value="+251">+251 - Etiopía</option>
                            <option value="+63">+63 - Filipinas</option>
                            <option value="+358">+358 - Finlandia</option>
                            <option value="+679">+679 - Fiyi</option>
                            <option value="+33">+33 - Francia</option>
                            <option value="+241">+241 - Gabón</option>
                            <option value="+220">+220 - Gambia</option>
                            <option value="+995">+995 - Georgia</option>
                            <option value="+233">+233 - Ghana</option>
                            <option value="+350">+350 - Gibraltar</option>
                            <option value="+30">+30 - Grecia</option>
                            <option value="+299">+299 - Groenlandia</option>
                            <option value="+590">+590 - Guadalupe</option>
                            <option value="+1 671">+1 671 - Guam</option>
                            <option value="+502">+502 - Guatemala</option>
                            <option value="+224">+224 - Guinea</option>
                            <option value="+240">+240 - Guinea Ecuatorial</option>
                            <option value="+245">+245 - Guinea-Bissáu</option>
                            <option value="+592">+592 - Guyana</option>
                            <option value="+509">+509 - Haití</option>
                            <option value="+31">+31 - Holanda</option>
                            <option value="+504">+504 - Honduras</option>
                            <option value="+852">+852 - Hong Kong</option>
                            <option value="+36">+36 - Hungría</option>
                            <option value="+91">+91 - India</option>
                            <option value="+62">+62 - Indonesia</option>
                            <option value="+964">+964 - Irak</option>
                            <option value="+353">+353 - Irlanda</option>
                            <option value="+98">+98 - Irán</option>
                            <option value="+672">+672 - Isla Norfolk</option>
                            <option value="+44">+44 - Isla de Man</option>
                            <option value="+354">+354 - Islandia</option>
                            <option value="+1-345">+1-345 - Islas Caimán</option>
                            <option value="+682">+682 - Islas Cook</option>
                            <option value="+298">+298 - Islas Feroe</option>
                            <option value="+500">+500 - Islas Malvinas</option>
                            <option value="+1 670">+1 670 - Islas Marianas del Norte</option>
                            <option value="+692">+692 - Islas Marshall</option>
                            <option value="+870">+870 - Islas Pitcairn</option>
                            <option value="+677">+677 - Islas Salomón</option>
                            <option value="+1 284">+1 284 - Islas Vírgenes Británicas</option>
                            <option value="+972">+972 - Israel</option>
                            <option value="+39">+39 - Italia</option>
                            <option value="+1">+1 - Jamaica</option>
                            <option value="+81">+81 - Japón</option>
                            <option value="+962">+962 - Jordania</option>
                            <option value="+7">+7 - Kazajistán</option>
                            <option value="+254">+254 - Kenia</option>
                            <option value="+996">+996 - Kirgizistán</option>
                            <option value="+686">+686 - Kiribati</option>
                            <option value="+381">+381 - Kosovo</option>
                            <option value="+965">+965 - Kuwait</option>
                            <option value="+856">+856 - Laos</option>
                            <option value="+266">+266 - Lesoto</option>
                            <option value="+371">+371 - Letonia</option>
                            <option value="+231">+231 - Liberia</option>
                            <option value="+218">+218 - Libia</option>
                            <option value="+423">+423 - Liechtenstein</option>
                            <option value="+370">+370 - Lituania</option>
                            <option value="+352">+352 - Luxemburgo</option>
                            <option value="+961">+961 - Líbano</option>
                            <option value="+853">+853 - Macao</option>
                            <option value="+389">+389 - Macedonia</option>
                            <option value="+261">+261 - Madagascar</option>
                            <option value="+60">+60 - Malasia</option>
                            <option value="+265">+265 - Malaui</option>
                            <option value="+960">+960 - Maldivas</option>
                            <option value="+223">+223 - Mali</option>
                            <option value="+356">+356 - Malta</option>
                            <option value="+212">+212 - Marruecos</option>
                            <option value="+230">+230 - Mauricio</option>
                            <option value="+222">+222 - Mauritania</option>
                            <option value="+691">+691 - Micronesia</option>
                            <option value="+373">+373 - Moldavia</option>
                            <option value="+976">+976 - Mongolia</option>
                            <option value="+382">+382 - Montenegro</option>
                            <option value="+1 664">+1 664 - Montserrat</option>
                            <option value="+258">+258 - Mozambique</option>
                            <option value="+52">+52 - México</option>
                            <option value="+377">+377 - Mónaco</option>
                            <option value="+264">+264 - Namibia</option>
                            <option value="+674">+674 - Nauru</option>
                            <option value="+977">+977 - Nepal</option>
                            <option value="+505">+505 - Nicaragua</option>
                            <option value="+234">+234 - Nigeria</option>
                            <option value="+683">+683 - Niue</option>
                            <option value="+47">+47 - Noruega</option>
                            <option value="+687">+687 - Nueva Caledonia</option>
                            <option value="+64">+64 - Nueva Zelanda</option>
                            <option value="+227">+227 - Níger</option>
                            <option value="+968">+968 - Omán</option>
                            <option value="+92">+92 - Pakistán</option>
                            <option value="+680">+680 - Palau</option>
                            <option value="+675">+675 - Papúa Nueva Guinea</option>
                            <option value="+595">+595 - Paraguay</option>
                            <option value="+51">+51 - Perú</option>
                            <option value="+689">+689 - Polinesia Francesa</option>
                            <option value="+48">+48 - Polonia</option>
                            <option value="+351">+351 - Portugal</option>
                            <option value="+1">+1 - Puerto Rico</option>
                            <option value="+974">+974 - Qatar</option>
                            <option value="+44">+44 - Reino Unido</option>
                            <option value="+236">+236 - República Centroafricana</option>
                            <option value="+420">+420 - República Checa</option>
                            <option value="+243">+243 - República Democrática del Congo</option>
                            <option value="+1">+1 - República Dominicana</option>
                            <option value="+211">+211 - República de Sudán del Sur</option>
                            <option value="+242">+242 - República del Congo</option>
                            <option value="+262">+262 - Reunión</option>
                            <option value="+250">+250 - Ruanda</option>
                            <option value="+40">+40 - Rumanía</option>
                            <option value="+7">+7 - Rusia</option>
                            <option value="+685">+685 - Samoa</option>
                            <option value="+1 684">+1 684 - Samoa Americana</option>
                            <option value="+590">+590 - San Bartolomé</option>
                            <option value="+1">+1 - San Cristóbal y Nevis</option>
                            <option value="+378">+378 - San Marino</option>
                            <option value="+1 599">+1 599 - San Martín</option>
                            <option value="+508">+508 - San Pedro y Miquelón</option>
                            <option value="+1">+1 - San Vicente y las Granadinas</option>
                            <option value="+290">+290 - Santa Elena</option>
                            <option value="+1">+1 - Santa Lucía</option>
                            <option value="+239">+239 - Santo Tomé y Príncipe</option>
                            <option value="+221">+221 - Senegal</option>
                            <option value="+381">+381 - Serbia</option>
                            <option value="+248">+248 - Seychelles</option>
                            <option value="+232">+232 - Sierra Leona</option>
                            <option value="+65">+65 - Singapur</option>
                            <option value="+963">+963 - Siria</option>
                            <option value="+252">+252 - Somalia</option>
                            <option value="+94">+94 - Sri Lanka</option>
                            <option value="+27">+27 - Sudáfrica</option>
                            <option value="+249">+249 - Sudán</option>
                            <option value="+46">+46 - Suecia</option>
                            <option value="+41">+41 - Suiza</option>
                            <option value="+597">+597 - Surinam</option>
                            <option value="+268">+268 - Swazilandia</option>
                            <option value="+66">+66 - Tailandia</option>
                            <option value="+886">+886 - Taiwán</option>
                            <option value="+255">+255 - Tanzania</option>
                            <option value="+992">+992 - Tayikistán</option>
                            <option value="+670">+670 - Timor Oriental</option>
                            <option value="+228">+228 - Togo</option>
                            <option value="+690">+690 - Tokelau</option>
                            <option value="+1">+1 - Trinidad y Tobago</option>
                            <option value="+993">+993 - Turkmenistán</option>
                            <option value="+90">+90 - Turquía</option>
                            <option value="+688">+688 - Tuvalu</option>
                            <option value="+216">+216 - Túnez</option>
                            <option value="+380">+380 - Ucrania</option>
                            <option value="+256">+256 - Uganda</option>
                            <option value="+598">+598 - Uruguay</option>
                            <option value="+998">+998 - Uzbekistán</option>
                            <option value="+678">+678 - Vanuatu</option>
                            <option value="+58">+58 - Venezuela</option>
                            <option value="+84">+84 - Vietnam</option>
                            <option value="+967">+967 - Yemen</option>
                            <option value="+260">+260 - Zambia</option>
                            <option value="+263">+263 - Zimbabue</option>
                        </select>


                        <input type="number" id="contacto-recargar" class="w-3/4 border rounded-tr-lg rounded-br-lg text-base focus:border-blue-500 block p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" value="3991111111" />
                    </div>
                </div>

                <div id="resIDjugadorRecargar">
                    <label for="idJugador-recargar" class="block mb-2 text-base font-medium text-white">ID jugador</label>
                    <input type="text" id="idJugador-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="ID o numero de cuenta" value="DE34FR5TB0S9NM" />
                </div>

                <div id="resCasaApuestasRecargar">
                    <label for="casaApuestas-Recargar" class="block mb-2 text-base font-medium text-white">Casa de apuestas</label>
                    <select id="casaApuestas-Recargar" class="border text-base rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <!-- <option value="" selected>--Seleccione una opcion --</option> -->
                        <option value="1XBET">1XBET</option>
                        <option value="BETWINNER">BETWINNER</option>
                        <option value="22BET">22BET</option>
                        <option value="88STARZ">88STARZ</option>
                    </select>
                </div>

                <div class="mb-6" id="resValorRecargar">
                    <label for="valor-recargar" class="block mb-2 text-base font-medium text-white">Valor a recargar</label>
                    <input type="number" id="valor-recargar" class="border text-base rounded-lg focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="min $30.000" value="165000" />
                </div>
            </div>

            <div class="mb-6" id="resMetodos">
                <h3 class="mb-2 text-base font-medium text-white">Metodos de pago</h3>
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input type="radio" id="wompi" name="hosting" value="wompi" class="hidden peer" required />
                        <label for="wompi" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer border-gray-700 peer-checked:text-white peer-checked:border-blue-600 peer-checked:border-2 peer-checked:bg-blue-600 hover:text-gray-100 text-gray-200 bg-gray-800 hover:bg-gray-600">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Paga con <span class="font-bold">Wompi</span></div>
                                <div class="w-full">Realizar el pago</div>
                            </div>
                            <img src="<?= BASE_URL . 'img/operaciones/Wompi_ContraccionSecundaria.png' ?>" alt="" class="w-14 h-8 rounded-lg">
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="comprobante" name="hosting" value="comprobante" class="hidden peer">
                        <label for="comprobante" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer border-gray-700 peer-checked:text-white peer-checked:border-blue-600 peer-checked:border-2 peer-checked:bg-blue-600 hover:text-gray-100 text-gray-200 bg-gray-800 hover:bg-gray-600">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Ya realize el pago</div>
                                <div class="w-full">Subir mi comprobante de pago</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                        </label>
                    </li>
                </ul>
            </div>
            <!-- seccion para enviar los formularios dependiendo de que metodo de pago escoja el usuario  -->
            <?php if (isset($_SESSION['user'])) : ?>
                <div id="divWompi" class="hidden">

                    <button id="formButtonWompi" class="flex text-white text-base py-2 px-4 bg-blue-900 rounded-md hover:bg-blue-800" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="#233876" class="w-6 h-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                        Paga con<span class="font-semibold ml-1">Wompi</span>
                    </button>

                </div>

                <div id="btn-submit" class="hidden">
                    <div class="mb-6" id="comprobantePago">
                        <label class="block mb-2 text-base font-medium text-white" for="comprobante_recargar">Comprobante de pago</label>
                        <input class="block w-full text-base border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600" id="comprobante_recargar" type="file">
                    </div>
                    <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-8 py-2.5 text-center">Realizar operacion</button>
                </div>
            <?php endif; ?>
                <!-- MOSTRAMOS LA RESPUESTA QUE NOS DEVUELVE WOMPI  -->
                <div id="resWompi" class="mb-6"></div>

            <?php if (!isset($_SESSION['user'])) : ?>
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

<script type="module" src="<?= BASE_URL . 'src/js/formOperaciones.js' ?>"></script>

<?php require_once(__DIR__ . '/../layouts/footer.php'); ?>
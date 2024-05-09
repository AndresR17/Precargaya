<?php
require_once('../../layouts/header.php');
validarSession($_SESSION['newPassword']);

require_once(__DIR__ . '/../../layouts/nav.php');

?>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <div class="border border-gray-500 w-full py-10 rounded-lg">
        <h1 class="text-white font-bold text-2xl px-10 pb-10 border-b border-gray-500 uppercase">Generar nuevo password</h1>
        <div class="px-10 pt-10">
            <form autocomplete="off" method="POST" id="formNewPassword">
                <input type="hidden" id="csrf_rec" value="<?= $_SESSION['csrf_token']; ?>">
                <input type="hidden" id="user_rec" value="<?= openssl_encrypt($_SESSION['newPassword'], AES_FRONT, KEY_FRONT);?>">
                <input type="hidden" id="token_user" value="<?= $_GET['token']; ?>">

                <div id="resNuevoPassword" class="mb-6">
                    <label for="newPassword" class="block mb-2 text-base text-white font-medium text-gray-900 ">Nueva contraseña</label>
                    <input type="password" id="newPassword" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div id="resNuevoPassword_confirmation" class="mb-6">
                    <label for="newPassword_confirmation" class="block mb-2 text-base text-white font-medium text-gray-900 ">Confirmar nueva contraseña</label>
                    <input type="password" id="newPassword_confirmation" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base text-white w-full sm:w-auto px-8 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Recuperar</button>
            </form>
            
        </div>
    </div>
</section>

<script type="module" src="<?= BASE_URL . 'src/js/formEnviarPassword.js' ?>"></script>
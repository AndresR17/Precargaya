<?php
require_once('../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/nav.php');

?>


<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <div class="border border-gray-500 w-full py-10 rounded-lg">
        <h1 class="text-white font-bold text-2xl px-10 pb-10 border-b border-gray-500 uppercase">Recuperar cuenta</h1>
        <div class="px-10 pt-10">
            <p class="text-gray-200 mb-3 font-semibold text-base">Digite su email de registro para empezar el proceso de recuperacion de contraseña</p> 

            <form autocomplete="off"  method="POST" id="formRecuperarPassword">
                    <input type="hidden" id="csrf_Recuperar" value="<?= $_SESSION['csrf_token']; ?>">

                    <div id="resEmailRecuperar" class="mb-6">
                        <label for="email-Recuperar" class="block mb-2 text-base text-white font-medium text-gray-900 ">Email</label>
                        <input type="email" id="email-Recuperar" name="email_recuperar" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"  />
                    </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base text-white w-full sm:w-auto px-8 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Recuperar</button>
            </form>
        </div>
    </div>
</section>

<script type="module" src="<?= BASE_URL . 'src/js/formRecuperarPassword.js' ?>"></script>
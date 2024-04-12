<?php

require_once('../../layouts/header.php');
require_once(__DIR__ . '/../../layouts/nav.php');

if (!isset($_SESSION['user'])) {
    header('location:index.php');
}

?>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <div class="border border-gray-500 w-full py-10 rounded-lg">
        <h1 class="text-white font-bold text-2xl px-10 pb-10 border-b border-gray-500 uppercase">Informacion personal</h1>
        <div class="px-10 pt-10">
            <form autocomplete="off" id="formPerfil">

                <input type="hidden" id="csrf_token_perfil" value="<?= $_SESSION['csrf_token']; ?>">
                <input type="hidden" id="idUser" value="<?= openssl_encrypt($user['id'], AES, KEY);  ?>">
                
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div id="resPerfilName">
                        <label for="name-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">Nombre</label>
                        <input type="text" id="name-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" value="<?= $user['name']; ?>" />
                    </div>
                    <div id="resPerfilDocumento">
                        <label for="documento-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">No de identificacion</label>
                        <input type="text" id="documento-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" value="<?= $user['documento']; ?>" />
                    </div>
                    <div id="resPerfilEmail">
                        <label for="email-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">Email</label>
                        <input type="email" id="email-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" value="<?= $user['email']; ?>" />
                    </div>
                    <div id="resPerfilPhone">
                        <label for="phone-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">Telefono</label>
                        <input type="tel" id="phone-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" value="<?= $user['phone']; ?>" />
                    </div>
                </div>
                <div class="mb-6" id="resPerfilPassword">
                    <label for="password-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">Contraseña actual</label>
                    <input type="password" id="password-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="py-5">
                    <h2 class="text-white font-semibold text-xl uppercase">Actualizar password</h2>
                    <p class="text-base font-normal text-gray-400">Si desea actualizar su contraseña digite la siguiente informacion</p>
                </div>
                <div class="mb-6" id="resPerfilPasswordNew">
                    <label for="password-perfil-new" class="block mb-2 text-base text-white font-medium text-gray-900 ">Nueva contraseña</label>
                    <input type="password" id="password-perfil-new" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div class="mb-10">
                    <label for="confirm_password-perfil" class="block mb-2 text-base text-white font-medium text-gray-900 ">Confirmar nueva contraseña</label>
                    <input type="password" id="confirm_password-perfil" class="border text-base text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base text-white w-full sm:w-auto px-8 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Actualizar perfil</button>

            </form>

        </div>
    </div>
</section>

<script type="module" src="<?= BASE_URL . 'src/js/formPerfil.js' ?>"></script>

<?php require_once(__DIR__ . '/../../layouts/footer.php') ?>
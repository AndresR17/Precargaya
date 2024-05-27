<?php
require_once('./layouts/header.php');
require_once('./layouts/nav.php');

?>

<div class="p-4 sm:ml-72">
    <div class="py-4 px-16 rounded-lg mt-20">
        <div class="px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Perfil del usuario</h2>
        </div>

        <div class="py-4 px-2 flex mt-10 space-x-6">
            <div class="flex flex-col items-center justify-center w-2/5 border border-gray-600 py-4 px-4 space-y-3 bg-gray-800 rounded-lg">
                <img src="<?= BASE_URL . 'img/admin/user.png'?>" alt="Imagen Usuario" class="h-56 w-56 rounded-full">
                <div class="text-center">
                    <h3 class="text-white font-semibold text-xl"><?= $_SESSION['admin']['name'] ?></h3>
                    <p class="text-gray-200 font-normal text-base"><?= $_SESSION['admin']['rol'] ?></p>
                </div>
            </div>
            <div class="flex flex-col w-3/5 border border-gray-600 space-y-3 bg-gray-800 rounded-lg">
                <div class="w-full border-b border-gray-600 px-6">
                    <p class="inline-block text-blue-400 font-semibold text-base border-b-2 border-blue-600 px-6 py-4">
                        Cambiar contraseña
                    </p>
                </div>
                <div class="px-6">
                    <form action="" autocomplete="off" id="formPerfil" class="space-y-4 mt-3">
                        <div class="flex items-center space-x-4" >                        
                                <label for="passwordActual" class="block mb-2 text-base font-medium text-white w-2/5">Contraseña actual</label>
                                <div class="w-full" id="resPasswordActual">
                                    <input type="password" id="passwordActual" class="bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                        </div>
                        <div class="flex items-center space-x-4" >
                            <label for="password" class="block mb-2 text-base font-medium text-white w-2/5">Nueva contraseña</label>
                            <div class="w-full" id="resPassword">
                                <input type="password" id="password" class="bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            
                        </div>
                        <div class="flex items-center space-x-4" >
                            <label for="password_confirmation" class="block mb-2 text-base font-medium text-white w-2/5">Repetir nueva contraseña</label>
                            <div class="w-full" id="resPassword_confirmation">
                                <input type="password" id="password_confirmation" class="bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            
                        </div>
                        <div class="w-full flex justify-end py-2">
                            <input type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-8 py-2 hover:scale-110 transition duration-300 text-center cursor-pointer" value="Cambiar contraseña">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php borrarSesiones(); ?>
<script type="module" src="../src/js/perfilAuth.js"></script>

</body>

</html>
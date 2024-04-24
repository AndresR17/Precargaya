<nav class="shadow bg-gray-800 md:fixed md:top-0 w-full z-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="<?= BASE_URL; ?>" class="flex items-center space-x-2">
            <img src="<?= BASE_URL . 'img/logo-antes.jpg'; ?>" class="h-10 rounded-xl" alt="logo recargaya!" />
            <p class="flex text-2xl font-bold whitespace-nowrap text-white flex-col">RECARGAYA
                <!-- <span class="text-sm font-normal">Tu satisfaccion es nuestro mayor objetivo</span>git  -->
            </p>

        </a>

        <div class="flex items-center md:order-2 space-x-1 md:space-x-4 rtl:space-x-reverse">
            <?php if (!isset($_SESSION['user'])) : ?>
                <span class="inline-flex overflow-hidden rounded-md">
                    <button data-modal-target="modal-login" data-modal-toggle="modal-login" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white uppercase bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>
                        Iniciar sesion
                    </button>

                    <button data-modal-target="modal-register" data-modal-toggle="modal-register" class="inline-flex items-center px-4 py-2 text-white font-medium uppercase text-sm bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Registrarme
                    </button>
                </span>
            <?php else : ?>
                <div class="flex items-center space-x-3">

                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center text-base uppercase" type="button">Bienvenido<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation" class="z-10 hidden divide-y divide-gray-600 rounded-lg shadow w-44 bg-gray-700">
                        <div class="px-4 py-3 text-sm text-white">
                            <div class="text-base"><?= $user['name'] ?></div>
                            <div class="font-medium truncate text-base"><?= $user['email']; ?></div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                            <li>
                                <a href="<?= BASE_URL . 'auth/movimientos' ?>" class="block flex items-center px-4 py-2 hover:bg-gray-800 text-white text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                    </svg>
                                    Movimientos
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL . 'auth/perfil' ?>" class="block flex items-center px-4 py-2 hover:bg-gray-800 text-white text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    Perfil
                                </a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="<?= BASE_URL . 'config/logout.php'; ?>" class="block flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-800 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                                Cerrar sesion
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <button data-collapse-toggle="mega-menu-icons" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                <li>
                    <a href="<?= BASE_URL . 'aliados'; ?>" class="uppercase block py-2 px-3 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 text-white" aria-current="page">Aliados</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . 'operaciones'; ?>" class="uppercase block py-2 px-3 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 text-white">Operaciones</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main modal login -->
    <div id="modal-login" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed top-0 right-0 left-0 bottom-0 bg-black opacity-50"></div>

        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-900 border border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl uppercase font-semibold text-white ">
                        Ingresa a tu cuenta
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-login">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" id="formLogin" method="POST" autocomplete="off">

                        <input type="hidden" id="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

                        <div class="mostrarAlerta mt-2"></div>
                        <div>
                            <label for="user" class="block mb-2 text-sm font-medium text-white ">Email</label>
                            <input type="email" name="user" id="user" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white ">Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <div class="flex justify-end">
                            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Olvide mi contraseña!</a>
                        </div>
                        <button type="submit" class="w-full uppercase text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal para registro -->
    <div id="modal-register" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed top-0 right-0 left-0 bottom-0 bg-black opacity-50"></div>

        <div class="relative p-10 w-full max-w-8xl max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-gray-900 rounded-lg shadow border border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4  md:p-5 border-b rounded-t">
                    <h3 class="text-2xl uppercase font-semibold text-white">
                        Vamos a conectarnos
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-register">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="" id="formClientes" method="POST" autocomplete="off">
                        <input type="hidden" id="csrf_token_registro" value="<?= $_SESSION['csrf_token']; ?>">
                        <div class="mb-6" id="resDoc">
                            <label for="documento" class="block mb-2 text-base font-medium text-white">No Documento:</label>
                            <input type="text" id="documento" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6" id="resName">
                            <label for="name" class="block mb-2 text-base font-medium text-white">Nombre completo:</label>
                            <input type="text" id="name" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6" id="resEmail">
                            <label for="email" class="block mb-2 text-base font-medium text-white">Email:</label>
                            <input type="email" id="email" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-6" id="resPhone">
                            <label for="phone" class="block mb-2 text-base font-medium text-white">Telefono:</label>
                            <input type="text" id="phone" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <div class="mb-6" id="resPassword-register">
                            <label for="password-register" class="block mb-2 text-sm font-medium text-white ">Contraseña</label>
                            <input type="password" name="password-register" id="password-register" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>

                        <div class="mb-6" id="resPassword_confirmation">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-white ">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>

                        <div class="flex flex-col items-start mb-6" id="resCheck">
                            <div class="flex items-center h-5">
                                <input id="acepto" type="checkbox" class="w-4 h-4 border cursor-pointer border-gray-700 rounded bg-gray-800 focus:ring-3 focus:ring-blue-300"><span class="px-1 font-semibold text-white"></span>
                                <label for="acepto" class="text-white font-semibold text-base cursor-pointer mr-1">Acepto</label>
                                <a href="public/TÉRMINOS Y CONDICIONES – RecargaYa.pdf" target="_blank" class="flex items-center text-blue-400 hover:underline font-semibold">
                                    Terminos y condiciones
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                            </div>
                            <p class="text-gray-400 text-base mt-2 text-justify">Al hacer clic en “Registrarme”, usted acepta que RecargaYa procese sus datos personales proporcionados en el formulario anterior para comunicarse con usted como nuestro cliente potencial o real, tal y como se describe en nuestra Política de privacidad.</p>
                        </div>
                        <input type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-base w-full sm:w-auto px-16 py-2.5 hover:scale-110 transition duration-300 text-center cursor-pointer uppercase" value="Registrarme">
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>




<nav class="shadow bg-gray-800 fixed top-0 w-full z-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="./img/logo-antes.jpg" class="h-8 rounded-xl" alt="logo recargaya!" />
            <span class="self-center text-2xl font-bold whitespace-nowrap text-white tracking-wide">RECARGAYA!</span>
        </a>
        <div class="flex items-center md:order-2 space-x-1 md:space-x-4 rtl:space-x-reverse">
            <!-- Modal toggle -->

            <!-- boton del modal de registro  -->
            <button data-modal-target="modal-register" data-modal-toggle="modal-register" class="uppercase block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center " type="button">
                Registrarme
            </button>

            <!-- boton para el modal de login  -->
            <button data-modal-target="modal-login" data-modal-toggle="modal-login" type="button">
                <div class="flex">
                    <img src="./img/user.png" alt="" class="h-8 rounded-full">
                </div>
            </button>

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
                    <a href="aliados.php" class="uppercase block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 text-white" aria-current="page">Aliados</a>
                </li>

                <li>
                    <a href="#" class="uppercase block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 text-white">contactos</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main modal login -->
    <div id="modal-login" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-900 border border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl font-semibold text-white ">
                        Nuestra plataforma
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
                    <form class="space-y-4" id="formLogin" method="POST">
                        <div class="mostrarAlerta mt-2"></div>
                        <div>
                            <label for="user" class="block mb-2 text-sm font-medium text-white ">Email o usuario</label>
                            <input type="text" name="user" id="user" class="bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 ">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 ">
                        </div>
                        <div class="flex justify-end">
                            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Olvide mi password!</a>
                        </div>
                        <button type="submit" class="w-full uppercase text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal para registro -->
    <div id="modal-register" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="relative p-10 w-full max-w-8xl max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-gray-900 rounded-lg shadow border border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4  md:p-5 border-b rounded-t">
                    <h3 class="text-4xl uppercase font-semibold text-white">
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
                    <form class="" id="formClientes" method="POST">
                        <div class="mb-6" id="resDoc">
                            <label for="documento" class="block mb-2 text-base font-medium text-white">No Documento:</label>
                            <input type="text" id="documento" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="...">
                        </div>
                        <div class="mb-6" id="resName">
                            <label for="name" class="block mb-2 text-base font-medium text-white">Nombre:</label>
                            <input type="text" id="name" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre completo...">
                        </div>
                        <div class="mb-6" id="resEmail">
                            <label for="email" class="block mb-2 text-base font-medium text-white">Email:</label>
                            <input type="email" id="email" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="...">
                        </div>
                        <div class="mb-6" id="resPhone">
                            <label for="phone" class="block mb-2 text-base font-medium text-white">Telefono:</label>
                            <input type="text" id="phone" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="...">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-base font-medium text-white">Mensaje:</label>
                            <textarea id="message" rows="4" class="bg-gray-800 border border-gray-700 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Cuentanos tu experiencia..."></textarea>
                        </div>
                        <div class="flex flex-col items-start mb-6" id="resCheck">
                            <div class="flex items-center h-5">
                                <input id="acepto" type="checkbox" class="w-4 h-4 border border-gray-700 rounded bg-gray-800 focus:ring-3 focus:ring-blue-300"><span class="px-1 font-semibold text-white">Acepto</span><a href="public/TÉRMINOS Y CONDICIONES – RecargaYa.pdf" target="_blank" class="text-blue-400 hover:underline font-semibold">Terminos y condiciones.</a></label>
                            </div>
                            <p class="text-gray-500 text-base mt-2 text-justify">Al hacer clic en “Registrarme”, usted acepta que RecargaYa procese sus datos personales proporcionados en el formulario anterior para comunicarse con usted como nuestro cliente potencial o real, tal y como se describe en nuestra Política de privacidad.</p>
                        </div>
                        <input type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-base w-full sm:w-auto px-16 py-2.5 hover:scale-110 transition duration-300 text-center cursor-pointer uppercase" value="Registrarme">
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>
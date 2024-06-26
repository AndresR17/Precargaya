<?php
require_once('./layouts/header.php');
require_once('./layouts/nav.php');

//funcion definida en el archivo helper.php
$totalUsuarios = obtenerRegistros($conexion, 'usuarios', '!=', $_SESSION['admin']['id']);
$totalClientes = obtenerRegistros($conexion,'usuarios', '=', $_SESSION['admin']['id']);
$ultimosClientes = obtenerUltimosRegistros($conexion);

?>

<div class="p-4 sm:ml-72">
    <div class="py-4 px-16 border border-gray-600 rounded-lg mt-20">
        <div class="border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl font-semibold ">Dashboard</h2>
        </div>

        <section class="grid grid-cols-3 my-10 space-x-16">

            <a href="usuarios.php" class="border-2 border-gray-400 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer bg-gray-800 flex flex-col justify-center items-center space-y-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-white"><?= $totalUsuarios ?></h2>
                <p class="leading-relaxed text-gray-200">Usuarios</p>
            </a>
            <a href="clientes.php" class="border-2 border-gray-400 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer bg-gray-800 flex flex-col justify-center items-center space-y-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-white"><?= $totalClientes ?></h2>
                <p class="leading-relaxed text-gray-200">Clientes</p>
            </a>
            <!-- <a href="aliados.php" class="border-2 border-gray-400 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer bg-gray-800 flex flex-col justify-center items-center space-y-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-white">982</h2>
                <p class="leading-relaxed text-gray-200">Aliados</p>
            </a> -->

        </section>

        <section class="flex mt-20">
            <div class="w-3/5">
                <p class="text-white hidden">Seccion vacia</p>
            </div>
            <div class="w-2/5 border-2 border-gray-600 p-4 rounded space-y-6">
                <h3 class="text-gray-300 text-2xl border-b pb-4">Ultimos registros</h3>

                <?php foreach($ultimosClientes as $cliente): ?>
                <div class="flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                    <p class="text-gray-400"><?= $cliente['name'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>


</body>
</html>
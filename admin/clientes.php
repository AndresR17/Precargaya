<?php
if (!isset($_GET['pagina']) || !is_numeric($_GET['pagina']) || $_GET['pagina'] < 1) {
    header('location:./clientes.php?pagina=1');
}

require_once('./layouts/header.php');
require_once('./layouts/nav.php');

//realizamos la consulta para obtener los clientes 
require_once('../config/obtenerClientes.php');

if (isset($_SESSION['eliminado'])) {
    echo '
    <script>
        Swal.fire({
            title: "Correcto!",
            text: "Usuario eliminado correctamente!",
            icon: "success"
        });
    </script>
    ';
}
?>

<div class="p-4 sm:ml-72">
    <div class="py-4 px-2 border border-gray-600 rounded-lg mt-20">
        <div class="flex justify-between items-center px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Nuestros clientes</h2>

            <!-- BUSCADOR DE CLIENTES  -->
            <div class="px-4 flex w-[50%]">
                <form class="w-full" action="./clientes.php?pagina=1" method="POST" autocomplete="off">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="cliente" name="busqueda" class="block w-full p-3 ps-10 text-base text-gray-200 border-2 border-blue-500 rounded-lg bg-gray-800 focus:ring-blue-500 focus:border-blue-500 " placeholder="Documento o email." />
                        <button type="submit" class="text-white absolute end-2 bottom-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 ">Buscar</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Tabla de los clientes -->
        <div class="px-4 pt-4">
            <div class="relative overflow-x-auto rounded">

                <!-- apertura para imprimir la tabla si cliente trae regisros -->
                <?php if (count($clientes) > 0) : ?>

                    <table class="w-full text-left rtl:text-right">
                        <thead class="text-base text-gray-300 uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telefono
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente) : ?>
                                <tr class="bg-gray-800 border-b border-gray-400 text-gray-100 hover:bg-gray-600 text-base">
                                    <td class="px-6 py-4 font-bold">
                                        <?= $contador ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?= $cliente['name'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['documento'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['phone'] ?>
                                    </td>
                                    <td class="px-6 py-4 space-x-4 flex items-center">
                                        <!-- Boton para el modal de ver comentarios -->
                                        <button data-modal-target="modal-mensaje <?= $cliente['id'] ?>" data-modal-toggle="modal-mensaje <?= $cliente['id'] ?>" class="px-2 py-1 text-sm bg-indigo-300 rounded text-indigo-800 font-semibold hover:bg-indigo-600 hover:text-white cursor-pointer" type="button">
                                            Ver mensaje
                                        </button>

                                        <a onclick="mostrarAlerta(<?= $cliente['id'] ?>, <?= $pagina ?>)" class="px-2 py-1 text-sm bg-red-300 rounded text-red-800 font-semibold hover:bg-red-600 hover:text-white cursor-pointer">Eliminar</a>
                                    </td>
                                </tr>
                                <?php $contador++ ?>

                                <!-- Main modal para mostrar los comentarios de clientes-->
                                <div id="modal-mensaje <?= $cliente['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Mensaje de <?= $cliente['name'] ?>
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-mensaje <?= $cliente['id'] ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <p class="text-base leading-relaxed text-gray-200 ">
                                                    <?= $cliente['comentarios'] ?>
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="modal-mensaje <?= $cliente['id'] ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- fin del foreach que muestra la tabla de los clientes -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Mostrar paginador -->
                    <?php if ($registros <= $total) : ?>
                        <div class="flex justify-between px-4 mt-8 items-center space-x-6">
                            <!-- Previous Button -->
                            <div class="flex">
                                <a href="./clientes.php?pagina=<?= $pagina - 1 ?>" class="flex items-center justify-center px-6 h-10 me-3 text-base font-medium   border border-gray-800 rounded-lg  bg-blue-600 <?= ($pagina == 1) ? 'pointer-events-none text-gray-400 cursor-not-allowed' : 'hover:bg-blue-700 text-white' ?>">
                                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                    </svg>
                                    Anterior
                                </a>

                                <a href="./clientes.php?pagina=<?= $pagina + 1 ?>" class="<?= ($pagina == $Npaginas) ? 'pointer-events-none text-gray-400 cursor-not-allowed' : 'hover:bg-blue-700 text-white ' ?> flex items-center justify-center px-6 h-10 me-3 text-base font-medium bg-blue-600 border border-gray-800 rounded-lg">
                                    Siguiente
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <span class="text-base text-gray-100 bg-blue-600 px-6 py-2 rounded">
                                    Mostrando <span class="font-semibold text-white"><?= $inicio + 1 ?></span> de <span class="font-semibold text-white"><?= $contador - 1 ?></span> de <span class="font-semibold text-gray-100"><?= $total ?></span> clientes
                                </span>
                            </div>
                        </div>

                        <!-- si no se imprime paginador se muestra este enlace -->
                    <?php elseif ($busqueda != "") : ?>
                        <div class="m-2">
                            <a href="./clientes.php?pagina=1" class="inline-flex text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-8 py-2 mt-5 uppercase">Mostrar todos los registros</a>
                        </div>
                    <?php endif; ?>

                    <!-- si clientes es vacio se muestra este mensaje -->
                <?php elseif ($busqueda != "") : ?>
                    <div class="m-2">
                        <p class="text-white text-center text-4xl font-semibold">
                            No hay resultados
                        </p>
                        <a href="./clientes.php?pagina=1" class="inline-flex text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-8 py-2 mt-5 uppercase">Mostrar todos los registros</a>
                    </div>
                <?php else : ?>
                    <div class="py-2">
                        <p class="text-white text-center text-4xl font-semibold">
                            No hay clientes registrados
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php BorrarErrores(); ?>
<script src="../src/js/clientesAuth.js"></script>

</body>

</html>
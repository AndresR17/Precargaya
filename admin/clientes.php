<?php
if (!isset($_GET['pagina']) || !is_numeric($_GET['pagina']) || $_GET['pagina'] < 1) {
    header('location:./clientes.php?pagina=1');
}

require_once('./layouts/header.php');
require_once('./layouts/nav.php');

//realizamos la consulta para obtener los clientes 
require_once('../config/admin/obtenerClientes.php');

if (isset($_SESSION['eliminado'])) {
    echo '
    <script>
        Swal.fire({
            title: "Proceso realizado!",
            text: "Cliente eliminado correctamente!",
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
                        <thead class="text-base text-gray-400 bg-gray-700">
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
                                    Fecha registro/actualización
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente) : ?>
                                <tr class="bg-gray-800 border-b border-gray-400 text-gray-100 text-base">
                                    <td class="px-6 py-4 font-bold">
                                        <?= $contador ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?= $cliente['name'] ; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['documento'] ?? 'S/D' ;?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['email'] ;?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $cliente['phone'] ?? 'S/D' ;?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= !empty($cliente['updateAt']) ? 
                                        '<p class="flex flex-col">' . formatearFecha($cliente['updateAt']) . '
                                        <span class="text-sm">Actualizacion</span></p>'  : 
                                        '<p class="flex flex-col">' . formatearFecha($cliente['createdAt']) . '
                                        <span class="text-sm">Registro</span></p>' ; ?>
                                    </td>
                                    <td class="px-6 py-4 space-x-4 flex items-center">
                                        <a onclick="mostrarAlerta(<?= $cliente['id'] ?>, <?= $pagina ?>,'cliente')" class="px-2 py-1 text-sm bg-red-300 rounded text-red-800 font-semibold hover:bg-red-600 hover:text-white cursor-pointer">Eliminar</a>
                                    </td>
                                </tr>
                                <?php $contador++ ?>
                                
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
<?php borrarSesiones(); ?>
<script src="../src/js/clientesAuth.js"></script>

</body>

</html>
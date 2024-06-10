<?php

require_once('../../layouts/header.php');
//valida si tiene iniciada la sesion
validarSession($_SESSION['user']);

require_once(__DIR__ . '/../../layouts/nav.php');
require_once(__DIR__ . '/../../config/conexion.php');
require_once(__DIR__ . '/../../config/helper.php');

$datos = obtenerOperaciones($conexion, $user['id']);

?>

<?php if (count($datos) > 0) : ?>
    <section class="flex flex-col xl:flex-row mt-[8rem] mb-[3rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
        <h1 class="text-white text-4xl"> Mis movimientos </h1>
    </section>

    <section class="flex flex-col mt-[3rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">

        <div class="flex flex-col w-full">
            <ul class="grid w-full gap-6 md:grid-cols-2">
                <li>
                    <input type="checkbox" id="recarga" name="hosting" value="Recarga" class="categoria hidden peer" />
                    <label for="recarga" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer border-gray-700 peer-checked:text-white peer-checked:border-blue-600 peer-checked:border-2 peer-checked:bg-blue-600 hover:text-gray-100 text-gray-200 bg-gray-800 hover:bg-gray-600">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Todas las Recargas</div>
                            <div class="w-full">Mostrar todas mis recargas</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </label>
                </li>
                <li>
                    <input type="checkbox" id="retiro" name="hosting" value="Retiro" class="categoria hidden peer">
                    <label for="retiro" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer border-gray-700 peer-checked:text-white peer-checked:border-blue-600 peer-checked:border-2 peer-checked:bg-blue-600 hover:text-gray-100 text-gray-200 bg-gray-800 hover:bg-gray-600">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Todos los Retiros</div>
                            <div class="w-full">Mostrar todos mis retiros</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </label>
                </li>
            </ul>
        </div>
    </section>

    <section class="flex flex-col my-[3rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
        <div class="relative overflow-x-auto rounded">
            <table class="w-full text-base text-left rtl:text-right text-gray-200">
                <thead class="text-base uppercase bg-gray-700 text-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Movimiento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Casa de apuestas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID Jugador
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Entidad Bancaria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Valor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($datos as $operacion) : ?>
                        <tr class="filaDatos border-b bg-gray-800 border-gray-700 text-base hover:bg-gray-600">
                            <th scope="row" class="tipo px-6 py-4 font-medium whitespace-nowrap text-white">
                                <?= $operacion['tipo']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $operacion['casaDeApuestas']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $operacion['idJugador']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $operacion['entidad']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= '$ ' . number_format($operacion['valor'], 2); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= formatearFecha($operacion['createdAt']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </section>
    <main class="flex flex-grow"></main>
<?php else : ?>
    <section class="flex flex-grow xl:flex-row my-[4rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
        <div class="flex flex-col items-center space-y-2">
            <h1 class="text-white text-4xl"> No tienes movimientos</h1>
        <p class="text-white text-base">Realizar mi primera operacion <a href="<?= BASE_URL . 'operaciones'?>" class="text-blue-600 text-base underline">Click aqui</a></p>
        </div>
        
    </section>
<?php endif; ?>
<script type="module" src="<?= BASE_URL . 'src/js/movimientos.js' ?>"></script>

<?php require_once(__DIR__ . '/../../layouts/footer.php') ?>
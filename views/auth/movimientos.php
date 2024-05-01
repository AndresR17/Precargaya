<?php

require_once('../../layouts/header.php');
//valida si tiene iniciada la sesion
validarSession($_SESSION['user']);

require_once(__DIR__ . '/../../layouts/nav.php');
require_once(__DIR__ . '/../../config/conexion.php');
require_once(__DIR__ . '/../../config/helper.php');

$datos = obtenerOperaciones($conexion, $user['id']);

?>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <h1 class="text-white text-4xl"> Mis movimientos </h1>
</section>

<section class="flex flex-col xl:flex-row my-[6rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">

    <div class="relative overflow-x-auto rounded">
        <table class="w-full text-base text-left rtl:text-right text-gray-200">
            <thead class="text-base uppercase bg-gray-700 text-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Movimiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Entidad
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
                    <tr class="border-b bg-gray-800 border-gray-700 text-base hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                            <?= $operacion['tipo']; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $operacion['entidad'] ?? 'No requiere' ?>
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

<?php require_once(__DIR__ . '/../../layouts/footer.php') ?>
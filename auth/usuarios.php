<?php
require_once('./layouts/header.php');
require_once('./layouts/nav.php');

$usuarios = obtenerDatos($conexion,'usuarios');
?>

<div class="p-4 sm:ml-72">
    <div class="py-4 px-2 border border-gray-600 rounded-lg mt-20">
        <div class="px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Lista de usuarios</h2>
        </div>

        <!-- Tabla de usuarios  -->
        <div class="py-4 px-2">
            <div class="relative overflow-x-auto rounded">
                <?php if(count($usuarios) > 0 ) : ?>
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Usuario o email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rol
                            </th>
                            <th scope="col-2" class="px-6 py-3">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuarios as $usuario): ?>
                        <tr class="bg-gray-800 border-b border-gray-400 text-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-100">
                                <?= $usuario['user'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $usuario['rol'] ?>
                            </td>
                            <td class="px-6 py-4 space-x-4">
                                <a href="#" class="px-2 py-1 text-sm bg-indigo-300 hover:bg-indigo-600 hover:text-white border-indigo-600 rounded text-indigo-800 text-center font-semibold">Editar</a>
                                <a href="#" class="px-2 py-1 text-sm bg-red-300 rounded text-red-800 font-semibold hover:bg-red-600 hover:text-white">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
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

<script src="../src/js/obtenerUsuarios.js"></script>

</body>
</html>
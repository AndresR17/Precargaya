<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
}
require_once('./layouts/header.php');
require_once('./layouts/nav.php');
?>



<div class="p-4 sm:ml-64">
    <div class="py-4 px-2 border-2 border-gray-200 border-dashed rounded-lg mt-20">
        <div class="px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Lista de usuarios</h2>
        </div>

        <!-- Tabla de usuarios  -->
        <div class="py-4 px-2">

            <div class="relative overflow-x-auto rounded">
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
                        <tr class="bg-gray-800 border-b border-gray-400 text-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-100">
                                Administrador
                            </th>
                            <td class="px-6 py-4">
                                admin
                            </td>
                            <td class="px-6 py-4 space-x-4">
                                <a href="#" class="px-2 py-1 text-sm bg-indigo-300 hover:bg-indigo-600 hover:text-white border-indigo-600 rounded text-indigo-800 text-center font-semibold">Editar</a>
                                <a href="#" class="px-2 py-1 text-sm bg-red-300 rounded text-red-800 font-semibold hover:bg-red-600 hover:text-white">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>
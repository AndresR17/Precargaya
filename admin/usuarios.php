<?php
require_once('./layouts/header.php');
if($admin['rol'] !== 'admin') {
    header('location: dashboard.php');
}
require_once('./layouts/nav.php');

if (isset($_SESSION['eliminado'])) {
    echo '
    <script>
        Swal.fire({
            title: "Proceso realizado!",
            text: "Usuario eliminado correctamente!",
            icon: "success"
        });
    </script>
    ';
}

$usuarios = obtenerDatos($conexion, 'usuarios', $_SESSION['admin']['id']);
?>

<div class="p-4 sm:ml-72">
    <div class="py-4 px-2 border border-gray-600 rounded-lg mt-20">
        <div class="flex items-center justify-between px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Lista de usuarios</h2>
            <button data-modal-target="modal-usuario" data-modal-toggle="modal-usuario" class="flex items-center block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-base px-5 py-2.5 text-center" type="button">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Agregar
            </button>
        </div>

        <!-- Tabla de usuarios  -->
        <div class="py-4 px-2">
            <div class="relative overflow-x-auto rounded">
                <?php if (count($usuarios) > 0) : ?>
                    <table class="w-full text-base text-left rtl:text-right">
                        <thead class="text-base text-gray-400 bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Celular
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rol
                                </th>
                                <th scope="col" class="px-6 py-3">
                                Fecha registro/actualización
                                </th>
                                <th scope="col-2" class="px-6 py-3">
                                    Opciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr class="bg-gray-800 border-b border-gray-400 text-gray-200 text-base">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-100">
                                        <?= $usuario['documento'] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $usuario['name'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $usuario['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $usuario['phone'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $usuario['rol'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= !empty($usuario['updateAt']) ? 
                                        '<p class="flex flex-col">' . formatearFecha($usuario['updateAt']) . '
                                        <span class="text-sm">Actualizacion</span></p>'  : 
                                        '<p class="flex flex-col">' . formatearFecha($usuario['createdAt']) . '
                                        <span class="text-sm">Registro</span></p>' ; ?>
                                    </td>
                                    <td class="px-6 py-4 space-x-4">
                                        <a href="./perfil.php" class="px-2 py-1 text-base bg-indigo-300 hover:bg-indigo-600 hover:text-white border-indigo-600 rounded text-indigo-800 text-center font-semibold">Editar</a>
                                        <a onclick="mostrarAlerta(<?= $usuario['id'] ?>, null, 'usuario')" class="px-2 py-1 text-base bg-red-300 hover:bg-red-600 hover:text-white border-red-600 rounded text-red-800 text-center font-semibold cursor-pointer">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="py-2">
                        <p class="text-white text-center text-4xl font-semibold">
                            No hay usuarios registrados
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="modal-usuario" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed top-0 right-0 left-0 bottom-0 bg-black opacity-50"></div>
    <div class="relative p-4 w-full max-w-4xl max-h-full ">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow border border-gray-700 bg-gray-900">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                <h3 class="text-2xl font-semibold text-gray-900 text-white">
                    Crear usuario
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-base w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="modal-usuario">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="formRegister" method="POST" action="" autocomplete="off">
                <input type="hidden" class="datos" name="csrf_token" value="<?= $_SESSION['csrf_token'] ; ?>">
                <div class="mb-2" id="resForm"></div>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-base font-medium text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="doc" class="block mb-2 text-base font-medium text-white">Documento</label>
                        <input type="number" name="doc" id="doc" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="block mb-2 text-base font-medium text-white">Email</label>
                        <input type="email" name="email" id="email" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="phone" class="block mb-2 text-base font-medium text-white">Celular</label>
                        <input type="text" name="phone" id="phone" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Rol" class="block mb-2 text-base font-medium text-white">Rol</label>
                        <select id="Rol" name="rol" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Cajero">Cajero</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="password" class="block mb-2 text-base font-medium text-white">Contraseña</label>
                        <input type="password" name="password" id="password" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="col-span-2 sm:col-span-1  mb-6">
                        <label for="password_confirmation" class="block mb-2 text-base font-medium text-white">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="datos bg-gray-800 border border-gray-600 text-white text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-8 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</div>


<?php borrarSesiones(); ?>
<script type="module" src="../src/js/obtenerUsuarios.js"></script>
<script src="../src/js/clientesAuth.js"></script>

</body>
</html>
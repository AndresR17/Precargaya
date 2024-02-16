<?php
require_once('./layouts/header.php');
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
}
require_once('./layouts/nav.php');
?>

<div class="p-4 sm:ml-64">
    <div class="py-4 px-2 border-2 border-gray-200 border-dashed rounded-lg mt-20">
        <div class="px-4 border-b border-gray-400 pb-4">
            <h2 class="text-white text-2xl">Nuestros clientes</h2>
        </div>

        <!-- cards de los clientes -->
        <div class="p-4 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 ">
            <div class="relative block overflow-hidden rounded-lg border border-gray-100 p-2 sm:p-2 lg:p-4">
                <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
                <div class="sm:flex sm:justify-between sm:gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-100 sm:text-xl">
                            Nombre completo
                        </h3>
                        <p class="mt-1 text-xs font-medium text-gray-200">No documento</p>
                    </div>
                </div>
                <div class="sm:flex sm:justify-between sm:gap-4">
                    <div>
                        <p class="mt-1 text-xs font-medium text-gray-200">Email</p>
                        <p class="mt-1 text-xs font-medium text-gray-200">Contacto</p>
                    </div>
                </div>
                <div class="">
                    <p>contenido del mensaje</p>
                </div>
                <dl class="mt-2 flex gap-4 sm:gap-6 mb-2">
                    <div class="flex flex-col-reverse">
                        <dd class="text-xs text-gray-500">31st June, 2021</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>


<!-- <div class="mt-2">
    <p class="text-pretty text-sm text-gray-400">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. At velit illum provident a, ipsa
        maiores deleniti consectetur nobis et eaque.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt suscipit commodi voluptatem omnis dolorem sunt atque laborum, quis veniam iusto iure repellat fugit vero laboriosam mollitia. Sint dolor eligendi explicabo?
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem natus eligendi, quos sapiente maiores blanditiis minus atque officiis minima aspernatur vel iure fugit harum ea tempore earum nostrum odit. Ab.
    </p>
</div> -->
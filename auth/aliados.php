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
            <h2 class="text-white text-2xl">Nuestros aliados</h2>
        </div>

        <!-- cards de los clientes -->
        <div class="p-4">
            <div class="">
                <a href="#" class="relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
                    <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

                    <div class="sm:flex sm:justify-between sm:gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white sm:text-xl">
                                Nombre del aliado
                            </h3>

                            <p class="mt-1 text-xs font-medium text-gray-400">Aliado</p>
                        </div>

                        <div class="hidden sm:block sm:shrink-0">
                            <img alt="" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" class="size-16 rounded-lg object-cover shadow-sm" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-pretty text-sm text-gray-200">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. At velit illum provident a, ipsa
                            maiores deleniti consectetur nobis et eaque.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor laboriosam adipisci nesciunt voluptas placeat blanditiis debitis totam vero quis beatae, amet ipsam facere doloremque sed non labore culpa odio hic?
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis voluptate ut aspernatur neque quo ratione distinctio, eveniet dignissimos atque provident dolor a culpa aliquam libero ea aperiam nihil quod minima?
                        </p>
                    </div>

                    <dl class="mt-6 flex gap-4 sm:gap-6">
                        <dd class="text-xs text-gray-500">31st June, 2021</dd>
                        <div class="">
                            <p class="hidden">Este campo es para las estrellas</p>
                        </div>
                    </dl>
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
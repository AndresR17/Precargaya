<?php

require_once('./layouts/header.php');
require_once('./layouts/nav.php');
require_once('./layouts/slide.php');

modalOpen();

?>

<section data-aos="zoom-out-up" class="flex flex-col xl:flex-row my-[5rem] mx-5 md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem] items-center justify-center">
    <div class="lg:w-[40rem] xl:w-[60rem]">
        <img src="<?= BASE_URL . 'img/imgdown.jpg' ?>" class="w-full rounded" alt="Img-RecargaYa">
    </div>
    <div data-aos="zoom-out-left" class="flex justify-center flex-col lg:px-20 xl:p-6 space-y-6">
        <h2 class="text-white text-4xl font-semibold xl:text-2xl 2xl:text-4xl mt-5 xl:m-0">RecargaYA! <br> Acompañandote en los mejores momentos.</h2>
        <p class="text-gray-300 text-lg text-justify">
            No importa si estas en tu casa, trabajo u oficina solo basta tener conexión a internet
            y podrás utilizar nuestros servicios de recargas y retiros. Hemos realizado miles de
            transferencias en línea desde 2022
        </p>
        <div class="flex items-center justify-center xl:justify-start">
            <a class="text-sm md:text-base text-center font-semibold rounded bg-green-600 px-6 md:px-12 py-3 text-white uppercase hover:bg-green-700" href="<?= BASE_URL . 'operaciones'; ?>">
                Realizar mi primera operacion
            </a>
        </div>
    </div>
</section>

<section data-aos="zoom-out-down" class="flex items-center justify-center mx-5 my-[8rem] md:mx-[2rem] lg:mx-[5rem] xl:mx-[10rem]">
    <div data-aos="fade-up-right space-y-10" class="">
        <h2 class="text-gray-100 text-center text-4xl font-semibold mb-5 uppercase">Nuestros Servicios </h2>
        <p class="text-gray-200 text-lg text-justify lg:px-12">Enviar una recarga en línea, o, dicho de otra manera, <span class="font-semibold text-blue-300">RECARGAR O RETIRAR PREMIOS</span> de una aplicación de apuestas, nunca fue tan fácil como lo es con RecargaYA. Además de recibir dinero en efectivo en nuestras sedes comerciales, nos especializamos en transferencias en línea por medio de <span class="font-semibold text-blue-300">NEQUI, DAVIPLATA y BANCOLOMBIA,</span> de esta manera, dando oportunidades a nuestro público colombiano para interactuar incluso con plataformas internacionales que operan en diferentes monedas, como euros, dólares, entre otras muchas opciones.
        </p>
    </div>
</section>

<section data-aos="zoom-in" class="flex flex-col md:flex-row items-center justify-center md:space-x-10 mx-5 md:mx-[2rem] xl:mx-[10rem] mt-24 gap-6 ">

    <!-- Retiros -->
    <div class="max-w-sm p-2 rounded-lg overflow-hidden md:hover:shadow-lg bg-gray-900 md:hover:scale-110 transition duration-300">
        <div class="group relative">
            <img class="block rounded-t-lg hover:scale-110 transition duration-300" src="./img/retiros.png" alt="Imagen retiros" />
            <div class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-center items-center">
                <a href="<?= BASE_URL . 'operaciones/retirar'; ?>" class="text-white text-lg font-semibold uppercase">Realizar retiro</a>
            </div>
        </div>

        <div class="p-5">
            <h5 class="mb-6 text-4xl font-bold tracking-tight text-yellow-400">Retiros</h5>
            <p class="mb-3 text-base text-gray-200 text-justify">¡Descubre la comodidad de retirar dinero cuando quieras y donde quieras con Nequi Daviplata y Bancolombia! Queremos hacerte la vida más fácil y accesible, por eso te invitamos a aprovechar la conveniencia de nuestros cajeros. Retira efectivo de tu cuenta Nequi Daviplata y Bancolombia en cualquier momento, sin importar la hora o el lugar.</p>
            <div class="flex justify-center mt-10">
                <a class="group relative uppercase inline-flex items-center overflow-hidden rounded bg-blue-600 px-14 py-3 text-white focus:outline-none focus:ring active:bg-blue-500 text-center md:text-left" href="<?= BASE_URL . 'operaciones/retirar'; ?>"> 
                    <span class="hidden md:block absolute -end-full transition-all group-hover:end-4">
                        <svg class="hidden md:block size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                    <span class="text-base font-medium transition-all group-hover:me-4"> Retirar ahora! </span>
                </a>
            </div>
        </div>
    </div>

    <!-- depositos -->
    <div class="max-w-sm p-2 rounded-lg overflow-hidden md:hover:shadow-lg bg-gray-900 md:hover:scale-110 transition duration-300">
        <div class="group relative">
            <img class="block rounded-t-lg hover:scale-110 transition duration-300" src="./img/depositos.png" alt="Imagen retiros" />
            <div class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-center items-center">
                <a href="<?= BASE_URL . 'operaciones/recargar'; ?>" class="text-white text-lg font-semibold uppercase">Realizar recarga</a>
            </div>
        </div>

        <div class="p-5">
            <h5 class="mb-6 text-4xl font-bold tracking-tight text-yellow-400">Recargas</h5>
            <p class="mb-3 text-base text-gray-200 text-justify">¡Descubre la comodidad de depositar dinero cuando quieras y donde quieras con Nequi Daviplata y Bancolombia! Queremos hacerte la vida más fácil y accesible, por eso te invitamos a aprovechar la
                conveniencia de nuestros cajeros . Retira efectivo de tu cuenta Nequi
                Daviplata y Bancolombia en cualquier momento, sin importar la hora o el lugar.</p>
            <div class="flex justify-center mt-10">
                <a class="group relative uppercase inline-flex items-center overflow-hidden rounded bg-blue-600 px-14 py-3 text-white focus:outline-none focus:ring active:bg-blue-500 text-center md:text-left" href="<?= BASE_URL . 'operaciones/recargar'; ?>" >
                    <span class="hidden md:block absolute -start-full transition-all group-hover:start-4">
                        <svg class="hidden md:block size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                    <span class="text-base font-medium transition-all group-hover:ms-4"> Realizar Recarga </span>
                </a>
            </div>
        </div>
    </div>

</section>

<?php
borrarSesiones();
require_once('./layouts/footer.php')
?>
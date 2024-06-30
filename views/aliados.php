<?php
require_once('../layouts/header.php');
require_once(__DIR__ . '/../layouts/nav.php');

?>

<div class="splide mt-10" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide splide-1">
                <img src="<?= BASE_URL . 'img/slide/estadio.jpg'; ?>" alt="">
                <div class="overlay"></div>
                <div class="slide-content">
                    <div class="absolute top-[40%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 text-center text-white text-4xl md:text-6xl xl:text-7xl sm:block font-bold tracking-wide uppercase">Analistas y aliados</div>
                    <div class="slide-description absolute top-[65%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 leading-normal text-white text-center sm:text-base md:text-xl lg:text-2xl">La colaboración con nuestros Aliados se basa en un sólido compromiso con la calidad. Su enfoque meticuloso y atención a los detalles han elevado nuestros estándares.</div>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- ANALISTAS -->
<section class="grid grid-cols-1 mt-16 mx-2 md:mx-[8rem] xl:mx-[16rem] p-4 space-y-20">


    <div data-aos="fade-left" class="flex flex-col items-center lg:flex-row bg-gray-800 p-8 lg:py-2 rounded">
        <img src="<?= BASE_URL . 'img/aliados/pulpolandia.jpeg' ?>" class="rounded-xl w-64 " alt="Imagen aliado">
        <div class="flex flex-col p-2 lg:p-6 space-y-6 mt-4">
            <h3 class="text-start text-center text-yellow-400 text-2xl uppercase  font-semibold">Pulpolandia</h3>
            <p class="text-justify text-gray-200">
                Pulpolandia es un canal que esta bajo el control del Colombiano Oscar V. Conocido como el elpulpo79 en el mundo de las apuestas deportivas. El pulpo es especialista en estadisticas de Tennis, ligas Europeas de futbol y un amante de la NBA. El Pulpo vive en Estados Unidos hace 25 años de los cuales hace 17 años trabaja con apuestas deportivas de forma privada. En el 2019 nació Pulpolandia en telegram y tiene varios records en los 5 años con el canal de telegram. Uno de esos records es el de 27 apuestas ganadas de seguido. Ese record es publico para cualquier persona que quiera ir a verlo en su canal.
            </p>
            <div class="flex gap-4 md:ml-auto items-center justify-center">
                <a href="https://t.me/pulpolandia" target="_blank" class="flex text-white bg-blue-600 font-semibold py-2 px-8 rounded-lg hover:scale-110 transition">
                    Ir al chat ...
                    <img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" alt="Telegram logo" class="h-7 w-7 ml-2">
                </a>
            </div>
        </div>
    </div>


    <div data-aos="fade-left" class="flex flex-col items-center lg:flex-row bg-gray-800 p-8 lg:py-2 rounded">
        <img src="<?= BASE_URL . 'img/aliados/fpc.jpg' ?>" class="rounded-xl w-64 " alt="Imagen aliado">
        <div class="flex flex-col p-2 lg:p-6 space-y-6 mt-4">
            <h3 class="text-start text-center text-yellow-400 text-2xl uppercase  font-semibold">FPC Futbol</h3>
            <p class="text-justify text-gray-200">
                ¡mas de 5 años de trayectoria!
                expertos en pronósticos deportivos del Futbol profesional colombiano
                una nueva manera de ganar dinero con tu equipo favorito.
            </p>
            <div class="flex gap-4 md:ml-auto items-center justify-center">
                <a href="https://t.me/+kb9DIRRpVeUxMDcx" target="_blank" class="flex text-white bg-blue-600 font-semibold py-2 px-8 rounded-lg hover:scale-110 transition">
                    Ir al chat ...
                    <img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" alt="Telegram logo" class="h-7 w-7 ml-2">
                </a>
            </div>
        </div>
    </div>


    <div data-aos="fade-left" class="flex flex-col items-center lg:flex-row bg-gray-800 p-8 lg:py-2 rounded">
        <img src="<?= BASE_URL . 'img/aliados/PROANALISTAS.jpeg' ?>" class="rounded-xl w-64 " alt="Imagen aliado">
        <div class="flex flex-col p-2 lg:p-6 space-y-6 mt-4">
            <h3 class="text-start text-center text-yellow-400 text-2xl uppercase  font-semibold">PROANALISTAS10</h3>
            <p class="text-justify text-gray-200">
                Con mas de 10 años de experiencia en los análisis deportivos & una comunidad de +45.000 personas PROANALISTAS10 es el mejor canal de todo TELEGRAM. Nuestra estrategia esta basada en acoger un mercado en especifico como el futbol europeo, NBA y grandes eventos de tenis de campo, y con base en las tendencias estadísticas preparamos análisis de alta calidad con un 92% de probabilidad de conseguir ganancias en cada uno de nuestros picks.

                COMPRUEBALO TU MISMO 💰👇
            </p>
            <div class="flex gap-4 md:ml-auto items-center justify-center">
                <a href="https://t.me/+trwzMy1sitdjMGVh" target="_blank" class="flex text-white bg-blue-600 font-semibold py-2 px-8 rounded-lg hover:scale-110 transition">
                    Ir al chat ...
                    <img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" alt="Telegram logo" class="h-7 w-7 ml-2">
                </a>
            </div>
        </div>
    </div>



    <!--otro analista-->
    <div data-aos="fade-left" class="flex flex-col items-center lg:flex-row bg-gray-800 p-8 lg:py-2 rounded">
        <img src="<?= BASE_URL . 'img/aliados/masterC.jpeg' ?>" class="rounded-xl w-64 " alt="Imagen aliado">
        <div class="flex flex-col p-2 lg:p-6 space-y-6 mt-4">
            <h3 class="text-start text-center text-yellow-400 text-2xl uppercase  font-semibold">Master Colombia</h3>
            <p class="text-justify text-gray-200">
                Máster Colombia con 7 años de experiencias en apuestas Deportivas, con nosotros encontrarás combinadas,
                retos multiplicadores y pronósticos diarios
            </p>
            <div class="flex gap-4 md:ml-auto items-center justify-center">
                <a href="https://t.me/+VafKow_Q8TdqsRF7" target="_blank" class="flex text-white bg-blue-600 font-semibold py-2 px-8 rounded-lg hover:scale-110 transition">
                    Ir al chat ...
                    <img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" alt="Telegram logo" class="h-7 w-7 ml-2">
                </a>
            </div>
        </div>
    </div>


</section>


<?php require_once(__DIR__ . '/../layouts/footer.php') ?>
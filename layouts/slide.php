<div class="splide" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__arrows splide__arrows--ltr">
        <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide" aria-controls="splide01-track">
            <img src="<?= BASE_URL . 'img/left.png'; ?>" width="40px" alt="">
        </button>
        <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track">
            <img src="<?= BASE_URL . 'img/right.png'; ?>" width="40px" alt="">
        </button>
    </div>
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide splide-1" data-splide-interval="5000">
                <img src="<?= BASE_URL . 'img/img.1.jpg'; ?>" alt="">
                <div class="overlay"></div>
                <div class="slide-content">
                    <div class="absolute top-[40%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 text-center text-white text-4xl md:text-6xl xl:text-7xl sm:block font-bold tracking-wide ">RECARGA TU CUENTA</div>
                    <div class="slide-description absolute top-[65%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 leading-normal text-white text-center sm:text-base md:text-xl lg:text-2xl">¿Qué es RecargaYA? RecargaYA es una de las plataformas de recarga y retiros de premios nacional más usada en Colombia.</div>
                </div>
            </li>

            <li class="splide__slide splide-1" data-splide-interval="5000">
                <img src="<?= BASE_URL . 'img/img.2.jpg'; ?>" alt="">
                <div class="overlay"></div>
                <div class="slide-content">
                    <div class="absolute top-[40%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 text-center text-white text-4xl md:text-6xl xl:text-7xl sm:block font-bold tracking-wide ">RETIRAR AHORA</div>
                    <div class="slide-description absolute top-[65%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 leading-normal text-white text-center sm:text-base md:text-xl lg:text-2xl">Podras realizar tus retiros, sin tener que preocuparte. Hemos realizado miles de transferencias en línea desde 2022</div>
                </div>
            </li>

            <li class="splide__slide splide-1" data-splide-interval="5000">
                <img src="<?= BASE_URL . 'img/img.3.jpg'; ?>" alt="">
                <div class="overlay"></div>
                <div class="slide-content">
                    <div class="absolute top-[40%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 text-center text-white text-4xl md:text-6xl xl:text-7xl sm:block font-bold tracking-wide">DEPOSITA AHORA</div>
                    <div class="slide-description absolute top-[65%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 leading-normal text-white text-center sm:text-base md:text-xl lg:text-2xl">El 99% de los depositos y retiros realizados con RecargaYA son procesados entre 1 a 5 minutos y con 0% de comisiones</div>
                </div>
            </li>

        </ul>
    </div>
</div>
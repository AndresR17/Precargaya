<?php 
function banner($imagenRuta, $texto){
    echo '
    <div class="splide" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide splide-1">
                    <img src="' . BASE_URL . 'img/slide/' . $imagenRuta . '" alt="">
                    <div class="overlay"></div>
                    <div class="slide-content">
                        <div class="absolute top-[40%] left-[50%] -translate-y-[50%] -translate-x-[50%] z-10 text-center text-white text-4xl md:text-6xl xl:text-7xl sm:block font-bold tracking-wide">'. $texto .'</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    ';
}
?>



// iniciar las animaciones de AOS 
AOS.init();


// Configuraciones para el slide 
window.addEventListener('load', () => {

    const splideElements = document.querySelectorAll('.splide');

    // Recorre cada elemento y crea una instancia de Splide
    splideElements.forEach(element => {
        const splide = new Splide(element, {
            perPage: 1,
            rewind: true,
            autoplay: true,
            interval: 5000,
        });

        splide.mount();
    });

})

//prevenir el enter en los formularios y solo funciona en los textarea
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && event.target.tagName === 'INPUT' && event.target.type !== 'textarea') {
            event.preventDefault();
        }
    });
});


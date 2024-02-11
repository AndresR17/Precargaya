window.addEventListener('load', ()=> {

    const splideElements = document.querySelectorAll('.splide');

    // Recorre cada elemento y crea una instancia de Splide
    splideElements.forEach(element => {
        const splide = new Splide(element, {
            perPage: 1,
            rewind: true,
            
        });
    
        splide.mount();
    });

})
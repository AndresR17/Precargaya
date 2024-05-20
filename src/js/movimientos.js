document.addEventListener('DOMContentLoaded', function() {

    const grupoCheckbox = document.querySelectorAll('.categoria');
    const filaDatos = document.querySelectorAll('.filaDatos');

    function BuscarCategoria() {
        const categoriaSeleccionada = Array.from(grupoCheckbox).find(checkbox => checkbox.checked);

        filaDatos.forEach(datos => {
            const tipo = datos.querySelector('.tipo').textContent.toLowerCase().trim();

            const mostrarBusqueda = !categoriaSeleccionada || categoriaSeleccionada.value.toLowerCase() === tipo;

            if(!mostrarBusqueda){
                datos.classList.add('hidden');
            }else{
                datos.classList.remove('hidden');
            }
        })
    }

    grupoCheckbox.forEach(checkbox => {
        checkbox.addEventListener('change', () => {

            if(checkbox.checked){
                grupoCheckbox.forEach(otrosChekbox => {
                    if(otrosChekbox !== checkbox){
                        otrosChekbox.checked = false;
                    }
                })
            }

            BuscarCategoria();
        })
    })

    BuscarCategoria();
});
const btnRetirar = document.getElementById('btn-retirar');
const btnDepositar = document.getElementById('btn-depositar');
const sectionDepositar = document.getElementById('section-depositar');
const sectionRetirar = document.getElementById('section-retirar');

btnRetirar.addEventListener('click', () => cambiarColor(btnRetirar, btnDepositar, sectionRetirar, sectionDepositar));
btnDepositar.addEventListener('click', () => cambiarColor(btnDepositar, btnRetirar, sectionDepositar, sectionRetirar));


function cambiarColor(btnClick, btnActivo, section1, section2 ) {

    // validamos que tenga al que se da click el color gris 
    if (btnClick.classList.contains("bg-gray-800")) {

        // se valida que el otro boton no tenga el color azul
        if(btnActivo.classList.contains("bg-blue-700")){

            // quitamos los colores y removemos la section del boton que esta activo
            btnActivo.classList.remove("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700","focus:ring-4","border-blue-600");
            btnActivo.classList.add("bg-gray-800", "hover:bg-gray-700","border-gray-600", "hover:bg-gray-700");
            section2.classList.add('hidden')

            // 
            btnClick.classList.remove("bg-gray-800","border-gray-600", "hover:bg-gray-700");
            btnClick.classList.add("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700","focus:ring-4","border-blue-600");
            section1.classList.remove('hidden')
            
        }else{

            btnClick.classList.remove("bg-gray-800","border-gray-600", "hover:bg-gray-700");
            btnClick.classList.add("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700","focus:ring-4","border-blue-600");
            section1.classList.remove('hidden')
        }
        
    } else {
        
        btnClick.classList.remove("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700","focus:ring-4","border-blue-600");
        btnClick.classList.add("bg-gray-800", "hover:bg-gray-700","border-gray-600", "hover:bg-gray-700");
        section1.classList.add('hidden')
    }
}

function mostrarForm () {

}
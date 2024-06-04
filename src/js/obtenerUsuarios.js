import { obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL, currentPath } from './config.js';

const formRegistrar = document.getElementById('formRegister');
formRegistrar.addEventListener('submit', validarForm);

function validarForm(e){

    e.preventDefault();

    const datos = obtenerDatos();
    const campoVacio = Object.entries(datos).find(([key, value]) => value === '');

    if (!campoVacio) {
        datos['fecha'] = obtenerFecha()
        enviarRegistro(datos);
    }else{
        mostrarError(`El campo <span class="font-bold uppercase">${campoVacio[0]}</span>  no debe ir vacio`, 'resForm' );
    }

}

function enviarRegistro(datos) {

    spinner();

    axios.post(BASE_URL + '/config/admin/registrarUsuario.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const respuesta = response.data;
            Swal.close();

            if (respuesta === 1) {

                formRegistrar.reset();

                Swal.fire({
                    title: "Registro exitoso!",
                    text: "Tu registro fue realizado correctamente!",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#28A745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cerrar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = currentPath ;
                    }
                });
                
            } else {

                Swal.fire({
                    title: "Hubo un error!",
                    text: `${respuesta}`,
                    icon: "error"
                });
            }

        })
        .catch(function (error) {
            console.log(error);
        })
}

function obtenerDatos() {

    const datosObj = {};
    const grupoDatos = document.querySelectorAll('.datos');

    grupoDatos.forEach(datos => {
        datosObj[datos.name] = datos.value;
    })
    
    return datosObj;
}


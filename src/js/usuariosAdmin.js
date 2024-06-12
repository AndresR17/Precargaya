//!VALIDACION,REGISTRO Y EDICION DE USUARIOS EN EL PANEL ADMINISTRATIVO 
import { obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL, currentPath } from './config.js';

//* OCULTAR DIV DE EDITAR
const buttonDiv = document.getElementById('cerrarDiv');
buttonDiv.addEventListener('click', function () {

    // Obtener la URL actual
    var currentUrl = new URL(window.location.href);
    // Verificar si existe el parámetro "edit"
    if (currentUrl.searchParams.has('edit')) {
        currentUrl.searchParams.delete('edit');
        //actualizar URL
        history.replaceState(null, '', currentUrl.href);
    }

    const divEditar = document.getElementById('divEditar');
    divEditar.classList.add('hidden')
})

//*VALIDACION AL MOMENTO DE CREAR UN NUEVO USUARIO

const formRegistrar = document.getElementById('formRegister');
formRegistrar.addEventListener('submit', validarForm);

function validarForm(e) {

    e.preventDefault();

    const datos = obtenerDatos('.datos');
    const campoVacio = Object.entries(datos).find(([key, value]) => value === '');

    if (!campoVacio) {
        datos['fecha'] = obtenerFecha()
        enviarRegistro(datos);
    } else {
        mostrarError(`El campo <span class="font-bold uppercase">${campoVacio[0]}</span>  no debe ir vacio`, 'resForm');
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
                        window.location.href = currentPath;
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


//* VALIDACION AL MOMENTO DE EDITAR UN USUARIO

const formEditar = document.getElementById('formEditar');
formEditar.addEventListener('submit', validarFormEditar);

function validarFormEditar(e) {
    e.preventDefault();

    const datos = obtenerDatos('.datosEditar');
    const campoVacio = Object.entries(datos).find(([key, value]) => value === '');

    if (!campoVacio) {
        datos['fecha'] = obtenerFecha()
        editarDatos(datos);
    } else {
        mostrarError(`El campo <span class="font-bold uppercase">${campoVacio[0]}</span>  no debe ir vacio`, 'resFormEditar');
    }
}

function editarDatos(datos) {

    spinner();

    axios.post(BASE_URL + '/config/admin/editarUsuario.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const respuesta = response.data;
            console.log(response);
            Swal.close();
            if (respuesta === 1) {

                formRegistrar.reset();

                Swal.fire({
                    title: "Actualizado Correctamente!",
                    text: "El usuario fue actualizado con exito!",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#28A745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cerrar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = currentPath;
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

function obtenerDatos(clase) {

    const datosObj = {};
    const grupoDatos = document.querySelectorAll(`${clase}`);

    grupoDatos.forEach(datos => {
        datosObj[datos.name] = datos.value;
    })

    return datosObj;
}




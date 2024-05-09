//! FORMULARIO DE ENVIO DE EMAIL Y PETICION DE GENERAR EL TOKEN PARA RECUPERAR LA CUENTA
import { validarCampo, validarCorreo, obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL } from './config.js';

const formRecuperarPassword = document.getElementById('formRecuperarPassword');
formRecuperarPassword.addEventListener('submit', validarForm);

function validarForm(e) {
    e.preventDefault();

    const emailRecuperar = document.getElementById('email-Recuperar');
    const tokenRecuperar = document.getElementById('csrf_Recuperar');

    if (!validarCampo(emailRecuperar, 'Por favor ingrese su email de registro', 'resEmailRecuperar')) return;

    if (!validarCorreo(emailRecuperar)) {
        mostrarError('El formato del correo es inválido', 'resEmailRecuperar');
        return;
    }

    const datos = {
        token: tokenRecuperar.value,
        email: emailRecuperar.value,
    }

    recuperarPassword(datos)

}

function recuperarPassword(datos) {

    spinner();

    axios.post(BASE_URL + '/config/solicitar/solicitudNewPassword.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

        .then(function (response) {
            const respuesta = response.data;
            Swal.close();

            if (respuesta == 1) {
                formRecuperarPassword.reset();

                Swal.fire({
                    title: "Solicitud enviada!",
                    text: "Revisa tu email de registro y sigue las instrucciones.",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#28A745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar!",
                    cancelButtonText: "Cerrar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = BASE_URL ;
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



//!CAMBIO DE CONTRASEÑA ENVIADO - VALIDACION DEL FORMULARIO PARA ENVIAR LAS NUEVAS PASSWORD A LA BASE DE DATOS Y ENVIAR LA PETICION

import { validarCampo, validarCorreo, obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL } from './config.js';
const formNewPassword = document.getElementById('formNewPassword');
formNewPassword.addEventListener('submit', validarFormulario);

function validarFormulario(e) {
    e.preventDefault();

    const tokenCsrf = document.getElementById('csrf_rec');
    const userRec = document.getElementById('user_rec');
    const tokenAcceso = document.getElementById('token_user');
    const passwordNew = document.getElementById('newPassword');
    const passwordNewConfirmation = document.getElementById('newPassword_confirmation');


    if (!validarCampo(passwordNew, 'Ingresa tu nueva contraseña', 'resNuevoPassword')) return;
    if (!validarCampo(passwordNewConfirmation, 'Confirma tu nueva contraseña', 'resNuevoPassword_confirmation')) return;

    if (passwordNew.value !== passwordNewConfirmation.value) {
        mostrarError('Las contraseñas no coinciden', 'resNuevoPassword');
        return;
    }

    const nuevosDatos = {
        csrf: tokenCsrf.value,
        user: userRec.value,
        token: tokenAcceso.value,
        password: passwordNew.value
    }

    enviarNuevaPassword(nuevosDatos)

}

function enviarNuevaPassword(datos) {
    spinner();

    axios.post(BASE_URL + '/config/solicitar/actualizarPassword.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

        .then(function (response) {
            const respuesta = response.data;
            Swal.close();
            console.log(response);

            if (respuesta == 1) {

                formNewPassword.reset();

                Swal.fire({
                    title: "Actualizacion exitosa!",
                    text: "Tu contraseña fue actualizada correctamente!",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#28A745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iniciar sesion!",
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
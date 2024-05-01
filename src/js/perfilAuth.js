//!actualizar la contraseña para el usuario administrativo
import { BASE_URL } from './config.js';
const formPerfil = document.getElementById('formPerfil');

formPerfil.addEventListener('submit', validarDatos)

function validarDatos(e){
    e.preventDefault();

    const passActual = document.getElementById('passwordActual').value;
    const password = document.getElementById('password').value;
    const passConfirmation = document.getElementById('password_confirmation').value;

    if(passActual.trim() === ""){
        mostrarError('Define tu contraseña actual', 'resPasswordActual');
        return;
    }

    if(password.trim() === ""){
        mostrarError('Define tu nueva contraseña', 'resPassword');
        return;
    }

    if(passConfirmation.trim() === ""){
        mostrarError('Repite tu nueva contraseña', 'resPassword_confirmation');
        return;
    }

    if(password.trim() != passConfirmation.trim()){
        mostrarError('Las contraseñas no coinciden', 'resPassword_confirmation');
        return;
    }

    const datos = {
        passActual,
        password,
        passConfirmation
    }

    cambiarDatos(datos)
}

function cambiarDatos(datos){

    axios.post(BASE_URL + '/config/admin/updatePassword.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const respuesta = response.data;

            console.log(response);
            if (respuesta === 1) {

                formPerfil.reset();
                Swal.fire({
                    title: "Cambio realizado!",
                    text: "se actualizo correctamente la contraseña.",
                    icon: "success"
                });

            } else if (respuesta === 2) {

                Swal.fire({
                    title: "Hubo un error!",
                    text: "La contraseña actual no es valida!",
                    icon: "error"
                });

            } else {
                const { mensaje } = respuesta

                Swal.fire({
                    title: "Hubo un error!",
                    text: `${mensaje}`,
                    icon: "error"
                });
            }

        })
        .catch(function (error) {
            console.log(error);
        })
}

function mostrarError(mensaje, id) {

    const alerta = document.querySelector(`.${id}`);

    if (!alerta) {
        const alerta = document.createElement('div');
        const container = document.getElementById(id)

        alerta.innerHTML = `
            <span class="${id} block p-2 mt-2 text-sm font-semibold text-red-800 border-s-4 border-red-500 rounded bg-red-100">${mensaje}</span>
        `;

        container.appendChild(alerta);
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}
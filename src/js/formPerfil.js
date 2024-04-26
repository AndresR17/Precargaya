//*validacion y actualizacion de perfil del cliente
import { validarCampo, validarNumero, validarCorreo, obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL } from './config.js';

const formulario = document.getElementById('formPerfil');

formulario.addEventListener('submit', validarFormPerfil);

let datos = {};

//validacion del formulario
function validarFormPerfil(e) {
    e.preventDefault();

    const token = document.getElementById('csrf_token_perfil').value;
    const id = document.getElementById('idUser').value;
    const documento = document.getElementById('documento-perfil');
    const name = document.getElementById('name-perfil');
    const phone = document.getElementById('phone-perfil');
    const email = document.getElementById('email-perfil');
    const passwordPerfil = document.getElementById('password-perfil');
    const passwordNewPerfil = document.getElementById('password-perfil-new').value;
    const passwordConfirmPerfil = document.getElementById('confirm_password-perfil').value;

    if (!validarCampo(name,'El nombre es obligatorio', 'resPerfilName')) return;

    if (phone.value !== ""){
        if(!validarNumero(phone, 'Numero de contacto no valido', 'resPerfilPhone'))return       
    }
    if (!validarCampo(email,'Define tu correo', 'resPerfilEmail')) return;

    if (!validarCorreo(email)) {
        mostrarError('El formato del correo es inválido', 'resPerfilEmail');
        return;
    }
    if (!validarCampo(passwordPerfil, 'Ingresa tu contraseña para actualizar', 'resPerfilPassword'))return;

    //crear los datos
    datos = {
        token,
        id,
        documento: documento.value,
        name: name.value,
        email: email.value,
        phone: phone.value,
        password: passwordPerfil.value,
        updateAt: obtenerFecha()
    }

    if (passwordNewPerfil !== passwordConfirmPerfil) {
        mostrarError('Las contraseñas no coinciden', 'resPerfilPasswordNew')
        return
    }

    if (passwordNewPerfil !== "") {

        datos = {
            ...datos,
            passwordNew: passwordNewPerfil
        }
    }

    ActualizarPerfil(datos)

}


function ActualizarPerfil(datos) {

    spinner();

    axios.post( BASE_URL + '/config/updatePerfil.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {
            
            const respuestaPerfil = response.data;
            Swal.close();

            if (respuestaPerfil === 1) {

                document.getElementById('password-perfil').value = "";
                document.getElementById('password-perfil-new').value = "";
                document.getElementById('confirm_password-perfil').value = "";

                Swal.fire({
                    title: "Actualizacion exitosa!",
                    text: "Tus datos fueron actualizados.",
                    icon: "success"
                });

                return

            } else if (respuestaPerfil === 2) {

                Swal.fire({
                    title: "Password incorrecta!",
                    text: "Tu password no coincide!",
                    icon: "error"
                });
                return

            } else {

                Swal.fire({
                    title: "Hubo un error!",
                    text: `${respuestaPerfil }`,
                    icon: "error"
                });
            }

        })
        .catch(function (error) {
            console.log(error);
        })
}





//! Archivo donde se hace la validacion y registro para todos los usuarios
import { validarCampo, validarCorreo, obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL } from './config.js';

const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);


//validacion del formulario
function validarCampos(e) {
    e.preventDefault();

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const aceptoCheck = document.getElementById('acepto').value;
    const password = document.getElementById('password-register');
    const password_confirmation = document.getElementById('password_confirmation');
    const token = document.getElementById('csrf_token_registro').value;

    if (!validarCampo(name, 'Define tu nombre completo', 'resName')) return;
    if (!validarCampo(email, 'Define tu correo', 'resEmail')) return;

    if (!validarCorreo(email)) {
        mostrarError('El formato del correo es inválido', 'resEmail');
        return;
    }

    if (!validarCampo(password, 'El password es obligatorio', 'resPassword-register')) return;
    if (!validarCampo(password_confirmation, 'Confirma tu password', 'resPassword_confirmation')) return;

    if (password.value !== password_confirmation.value) {
        mostrarError('Las contraseñas no coinciden', 'resPassword-register')
        return
    }
    if (aceptoCheck.checked === false) {
        mostrarError('Debes aceptar los terminos y condiciones', 'resCheck');
        return
    }

    const createdAt = obtenerFecha();
    const estado = 'activo';
    const check = 'Acepto terminos';
    const rol = 'Cliente';


    //crear los datos
    const datos = {
        token,
        name: name.value,
        email: email.value,
        password: password.value,
        rol,
        check,
        estado,
        createdAt
    }

    guardarRegistro(datos)
    
}

function guardarRegistro(datos) {

    spinner();

    axios.post(BASE_URL + '/config/logout/registrarUsuarios.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const respuesta = response.data;
            Swal.close();

            if (respuesta === 1) {

                Swal.fire({
                    title: "Hubo un error!",
                    text: "Este correo ya fue usado anteriormente.",
                    icon: "error"
                });

            } else if (respuesta === 2) {

                formulario.reset();
                
                Swal.fire({
                    title: "Tu registro fue realizado con exito!",
                    text: "Recuerda completar la informacion en tu perfil!",
                    icon: "success"
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










//*validacion y actualizacion de perfil del cliente
import { validarCorreo, obtenerFecha, mostrarError } from './funciones.js'

const formulario = document.getElementById('formPerfil');

formulario.addEventListener('submit', validarFormPerfil);
let datos = {};

//validacion del formulario
function validarFormPerfil(e) {
    e.preventDefault();
    const id = document.getElementById('idPerfil').value;
    const documento = document.getElementById('documento-perfil').value;
    const name = document.getElementById('name-perfil').value;
    const phone = document.getElementById('phone-perfil').value;
    const email = document.getElementById('email-perfil').value;
    const passwordPerfil = document.getElementById('password-perfil').value;
    const passwordNewPerfil = document.getElementById('password-perfil-new').value;
    const passwordConfirmPerfil = document.getElementById('confirm_password-perfil').value;


    if (documento.trim() === '') {

        mostrarError('Define tu numero de documento', 'resPerfilDocumento');
        return;

    } else if (isNaN(documento)) {
        mostrarError('Este campo es numérico', 'resPerfilDocumento');
        return
    }

    if (name.trim() === "") {
        mostrarError('El nombre es obligatorio', 'resPerfilName')
        return
    }

    if (email.trim() === "") {
        mostrarError('Define tu correo', 'resPerfilEmail');
        return;

    } else if (!validarCorreo(email)) {
        mostrarError('El formato del correo es inválido', 'resPerfilEmail');
        return;
    }

    if (phone.trim() === '') {
        mostrarError('Define tu numero de contacto', 'resPerfilPhone');
        return;
    } else if (isNaN(phone)) {
        mostrarError('Este campo es numérico', 'resPerfilPhone');
        return
    }

    if (passwordPerfil .trim() === "") {
        mostrarError('Ingresa tu contraseña para actualizar tu informacion', 'resPerfilPassword')
        return
    }
    
    //crear los datos
    datos = {
        id,
        documento,
        name,
        email,
        phone,
        password:passwordPerfil,
        updatedAt: obtenerFecha()
    }
    
    if(passwordNewPerfil !== passwordConfirmPerfil){
        mostrarError('Las contraseñas no coinciden', 'resPerfilPasswordNew')
        return

    }
    
    if(passwordNewPerfil != ""){

        datos ={
            ...datos,
            passwordNew: passwordNewPerfil
        }
    }
    console.log(datos);

    // ActualizarPerfil(datos)

}

function ActualizarPerfil(datos) {

    axios.post('./config/registro.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const respuesta = response.data;

            if (respuesta === 1) {

                Swal.fire({
                    title: "Hubo un error!",
                    text: "Este correo ya fue usado anteriormente.",
                    icon: "error"
                });

            } else if (respuesta === 2) {

                formulario.reset();

                Swal.fire({
                    title: "Felicitaciones!",
                    text: "Tu registro fue realizado con exito!",
                    icon: "success"
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





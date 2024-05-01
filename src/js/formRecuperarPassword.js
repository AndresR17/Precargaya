//! FORMULARIO DE ENVIO DE EMAIL Y PETICION DE GENERAR EL TOKEN PARA RECUPERAR LA CUENTA
import { validarCampo, validarCorreo, obtenerFecha, mostrarError, spinner } from './funciones.js'
import { BASE_URL } from './config.js';

const formRecuperarPassword = document.getElementById('formRecuperarPassword');
formRecuperarPassword.addEventListener('submit', validarForm);

function validarForm(e){
    e.preventDefault();

    const emailRecuperar = document.getElementById('email-Recuperar');
    const tokenRecuperar = document.getElementById('csrf_Recuperar');

    if(!validarCampo(emailRecuperar,'Por favor ingrese su email de registro', 'resEmailRecuperar')) return;
    
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

function recuperarPassword(datos){

    spinner();

    axios.post(BASE_URL + '/config/solicitar/solicitudNewPassword.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

    .then(function (response) {
        const respuesta = response.data;
        Swal.close();
        
        if(respuesta == 1){
            formRecuperarPassword.reset();
                
            Swal.fire({
                title: "Solicitud enviada!",
                text: "Revisa tu email de registro y sigue las instrucciones",
                icon: "success"
            });

        }else{
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

//*VALIDACION DEL FORMULARIO PARA ENVIAR LAS NUEVAS PASSWORD A LA BASE DE DATOS Y ENVIAR LA PETICION
const formNewPassword = document.getElementById('formNewPassword');
formNewPassword.addEventListener('submit', validarFormulario);

function validarFormulario(e){
    e.preventDefault();

    const tokenCsrf = document.getElementById('csrf_rec');
    const userRec = document.getElementById('user_rec');
    const tokenAcceso = document.getElementById('token_user');
    const passwordNew = document.getElementById('newPassword');
    const passwordNewConfirmation = document.getElementById('newPassword_confirmation');


    if(!validarCampo(passwordNew,'Ingresa tu nueva contraseña','resNuevoPassword'))return;
    if(!validarCampo(passwordNewConfirmation,'Confirma tu nueva contraseña', 'resNuevoPassword_confirmation'))return;

    if(passwordNew.value !== passwordNewConfirmation.value){
        mostrarError('Las contraseñas no coinciden', 'resNuevoPassword');
        return;
    }

    const nuevosDatos = {
        csrf: tokenCsrf.value,
        user: userRec.value,
        token: tokenAcceso.value,
        password: passwordNew
    }

    enviarNuevaPassword(nuevosDatos)
}

function enviarNuevaPassword(datos){
    spinner();

    axios.post(BASE_URL + '/config/solicitar/recuperar-password.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

    .then(function (response) {
        const respuesta = response.data;
        Swal.close();
        
        if(respuesta == 1){
            formRecuperarPassword.reset();
                
            Swal.fire({
                title: "Solicitud enviada!",
                text: "Revisa tu email de registro y sigue las instrucciones",
                icon: "success"
            });

        }else{
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

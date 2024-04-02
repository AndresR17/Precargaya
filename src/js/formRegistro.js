//*Archivo donde se hace la validacion y registro para todos los usuarios
import { validarCorreo, obtenerFecha, mostrarError } from './funciones.js'

const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);


//validacion del formulario
function validarCampos(e) {
    e.preventDefault();

    const documento = document.getElementById('documento').value;
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const aceptoCheck = document.getElementById('acepto');
    const passwordRegister = document.getElementById('password-register').value;
    const password_confirmation = document.getElementById('password_confirmation').value;


    if (documento.trim() === '') {

        mostrarError('Define tu numero de documento', 'resDoc');
        return;

    } else if (isNaN(documento)) {
        mostrarError('Este campo es numérico', 'resDoc');
        return
    }

    if (name.trim() === "") {
        mostrarError('El nombre es obligatorio', 'resName')
        return
    }

    if (email.trim() === "") {
        mostrarError('Define tu correo', 'resEmail');
        return;

    } else if (!validarCorreo(email)) {
        mostrarError('El formato del correo es inválido', 'resEmail');
        return;
    }

    if (phone.trim() === '') {
        mostrarError('Define tu numero de contacto', 'resPhone');
        return;
    } else if (isNaN(phone)) {
        mostrarError('Este campo es numérico', 'resPhone');
        return
    }

    if (passwordRegister.trim() === "") {
        mostrarError('El password es obligatorio', 'resPassword-register')
        return
    }

    if (password_confirmation.trim() === "") {
        mostrarError('Confirma tu password', 'resPassword_confirmation')
        return
    }

    if(passwordRegister !== password_confirmation){
            mostrarError('Las contraseñas no coinciden', 'resPassword-register')
            return
    }

    if (aceptoCheck.checked === false) {
        mostrarError('Debes aceptar los terminos y condiciones', 'resCheck');
        return
    }

    const createdAt = obtenerFecha();
    const estado = 'activo';
    

    //crear los datos
    const datos = {
        documento,
        name,
        email,
        phone,
        password: passwordRegister,
        rol: 'cliente',
        check: 'Acepto terminos',
        estado,
        createdAt
    }

    guardarRegistro(datos)

}

function guardarRegistro(datos) {

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










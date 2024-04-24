//! VALIDACION Y ENVIO DE INFORMACION DE LOS FORMULARIOS Y FUNCIONALIDAD DE LOS BOTONES DE LA VISTA OPERACIONES 

import { BASE_URL } from "./config.js"
import { validarCampo, mostrarError, obtenerFecha, validarNumero } from "./funciones.js";

//Funcion y validacion de los botones que muestran los formularios de operaciones
const btnRetirar = document.getElementById('btn-retirar');
const btnRecargar = document.getElementById('btn-recargar');
const sectionRecargar = document.getElementById('section-recargar');
const sectionRetirar = document.getElementById('section-retirar');

btnRetirar.addEventListener('click', () => cambiarColor(btnRetirar, btnRecargar, sectionRetirar, sectionRecargar));
btnRecargar.addEventListener('click', () => cambiarColor(btnRecargar, btnRetirar, sectionRecargar, sectionRetirar));


//Se verifica si en la url trae algun parametro para desplegar el formulario
window.onload = function () {
    var parametro = obtenerParametroURL();

    if (parametro === 'recargar') {

        btnRecargar.classList.remove("bg-gray-800", "border-gray-600", "hover:bg-gray-700");
        btnRecargar.classList.add("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700", "focus:ring-4", "border-blue-600");
        sectionRecargar.classList.remove('hidden')

        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });

    }

    if (parametro === 'retirar') {

        btnRetirar.classList.remove("bg-gray-800", "border-gray-600", "hover:bg-gray-700");
        btnRetirar.classList.add("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700", "focus:ring-4", "border-blue-600");
        sectionRetirar.classList.remove('hidden')

        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });

    }
}

//funcionalidad de los botones de la pagina de operaciones
function cambiarColor(btnClick, btnActivo, sectionMostrar, sectionOcultar) {
    const botonClickGris = btnClick.classList.contains("bg-gray-800");
    const botonActivoAzul = btnActivo.classList.contains("bg-blue-700");

    // Cambiar clases del botón click
    btnClick.classList.toggle("bg-gray-800", !botonClickGris);
    btnClick.classList.toggle("bg-blue-700", botonClickGris);
    btnClick.classList.toggle("border-gray-600", !botonClickGris);
    btnClick.classList.toggle("border-blue-600", botonClickGris);
    btnClick.classList.toggle("hover:bg-gray-700", !botonClickGris);
    btnClick.classList.toggle("focus:ring-blue-700", botonClickGris);
    btnClick.classList.toggle("focus:ring-4", botonClickGris);

    // Alternar visibilidad de secciones
    sectionMostrar.classList.toggle('hidden', !botonClickGris);
    sectionOcultar.classList.toggle('hidden', botonClickGris);

    // Si ambos botones tienen color gris, cerrar ambas secciones
    if (!botonClickGris && !botonActivoAzul) {
        sectionMostrar.classList.add('hidden');
        sectionOcultar.classList.add('hidden');
    } else {
        // Si solo el botón activo tiene color azul, cerrar sección 2
        if (botonActivoAzul) {
            sectionOcultar.classList.add('hidden');
        }
    }

    // Cambiar clases del botón activo solo si no es el mismo que el botón click
    if (btnClick !== btnActivo && botonActivoAzul) {
        btnActivo.classList.remove("bg-blue-700", "hover:bg-blue-600", "focus:ring-blue-700", "focus:ring-4", "border-blue-600");
        btnActivo.classList.add("bg-gray-800", "hover:bg-gray-700", "border-gray-600", "hover:bg-gray-700");
    }
}

//constante para usar en los dos formularios
const createdAt = obtenerFecha();

//* validacion y envio para el formulario de recargar
const formRecargar = document.getElementById('formRecargar');
const valorMinimoRecargar = 30000;

formRecargar.addEventListener('submit', validarFormRecargar);

const tokenRecargar = document.getElementById('token_recargar');
const idRecargar = document.getElementById('idRecargar');
const nameRecargar = document.getElementById('name-recargar');
const docRecargar = document.getElementById('doc-recargar');
const contactoRecargar = document.getElementById('contacto-recargar');
const idJugadorRecargar = document.getElementById('idJugador-recargar');
const valorRecargar = document.getElementById('valor-recargar');
const comprobanteRecargar = document.getElementById('comprobante_recargar');
const casaApuestasRecargar = document.getElementById('casaApuestas-Recargar');

//se validacion cada campo del formulario
function validarFormRecargar(e) {
    e.preventDefault();

    if (!validarCampo(nameRecargar, 'Define tu nombre completo', 'resUserRecargar')) return;
    if (!validarCampo(docRecargar, 'Define tu documento', 'resDocRecargar')) return;
    if (!validarNumero(docRecargar, 'El documento no es valido!', 'resDocRecargar')) return;
    if (!validarCampo(contactoRecargar, 'Define numero de contacto', 'resContactoRecargar')) return;
    if (!validarNumero(contactoRecargar, 'El numero no es valido', 'resContactoRecargar')) return;
    if (!validarCampo(idJugadorRecargar, 'Define ID de jugador', 'resIDjugadorRecargar')) return;
    if (!validarCampo(casaApuestasRecargar, 'Selecciona una opcion valida!', 'resCasaApuestasRecargar')) return;
    if (!validarCampo(valorRecargar, 'Define el valor a recargar', 'resValorRecargar')) return;
    if (!validarNumero(valorRecargar, 'El valor no es valido!', 'resValorRecargar')) return;

    if (valorRecargar.value < valorMinimoRecargar) {
        mostrarError('El valor mínimo debe ser de $30.000', 'resValorRecargar');
        return;
    }

    if (!comprobanteRecargar.files[0]) {
        mostrarError('Sube tu comprobante de pago', 'resComprobanteRecargar');
        return;
    }

    if (!validarExtension(comprobanteRecargar.files[0])) {
        mostrarError('La extensión de la imagen no es válida.', 'resComprobanteRecargar');
        return;
    }

    const formData = new FormData();
    formData.append('imagen', comprobanteRecargar.files[0]);
    formData.append('token', tokenRecargar.value);
    formData.append('id', idRecargar.value);
    formData.append('name', nameRecargar.value);
    formData.append('documento', docRecargar.value);
    formData.append('contacto', contactoRecargar.value);
    formData.append('idJugador', idJugadorRecargar.value);
    formData.append('casaApuestas', casaApuestasRecargar.value);
    formData.append('valor', valorRecargar.value);
    formData.append('createdAt', createdAt);

    enviarRecarga(formData)
}

//Envio de formulario recargar
function enviarRecarga(datos) {

    spinner();

    // Realizar la solicitud POST usando Axios
    axios.post(BASE_URL + '/config/enviarRecargaTelegram.php', datos, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })

        .then(response => {

            const respuesta = response.data;
            Swal.close();

            if (respuesta === 1) {

                formRecargar.reset();
                Swal.fire({
                    title: "Se ha enviado su peticion!",
                    text: "Tu solicitud se puede tardar entre 15 a 20 minutos , si no se le ha hecho el envió DESPUES DE ESE TIEMPO comunícate via telegram.",
                    icon: "success"
                });

            } else if (respuesta === 2) {

                Swal.fire({
                    title: "Hubo en error!",
                    text: "Por favor intenta nuevamente!",
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
        .catch(error => {
            // Manejar errores
            console.error('Error al enviar', error);
        });
}

//* validacion y  envio para el formulario de retirar
const formRetirar = document.getElementById('formRetirar');
const valorMinimoRetirar = 100000;

formRetirar.addEventListener('submit', validarFormRetirar);

const tokenRetirar = document.getElementById('tokenRetirar');
const idRetirar = document.getElementById('idRetirar');
const nameRetirar = document.getElementById('nameRetirar');
const docRetirar = document.getElementById('doc-retirar');
const contactoRetirar = document.getElementById('contacto-retirar');
const idJugadorRetirar = document.getElementById('idJugador-retirar');
const casaApuestasRetirar = document.getElementById('casaApuestas-retirar');
const codigoRetiro = document.getElementById('cod-retirar');
const entidadRetiro = document.getElementById('ent-retirar');
const cuentaRetirar = document.getElementById('cuenta-retirar');
const valorRetirar = document.getElementById('valor-retirar');

function validarFormRetirar(e) {
    e.preventDefault();
    if (!validarCampo(nameRetirar, 'Define tu nombre completo', 'resUserRetirar')) return;
    if (!validarCampo(docRetirar, 'Define tu documento', 'resDocRetirar')) return;
    if (!validarNumero(docRetirar, 'El documento no es valido!', 'resDocRetirar')) return;
    if (!validarCampo(contactoRetirar, 'Define tu numero de contacto', 'resContactoRetirar')) return;
    if (!validarNumero(contactoRetirar, 'El contacto no es valido!', 'resContactoRetirar')) return;
    if (!validarCampo(idJugadorRetirar, 'Define ID de jugador', 'resIDjugadorRetirar')) return;
    if (!validarCampo(casaApuestasRetirar, 'Selecciona una opcion valida!', 'resCasaApuestasRetirar')) return;
    if (!validarCampo(codigoRetiro, 'Ingresa tu codigo de retiro', 'resCodigoRetirar')) return;
    if (!validarCampo(entidadRetiro, 'Selecciona una opcion valida!', 'resEntRetirar')) return;
    if (!validarCampo(cuentaRetirar, 'Define tu numero de cuenta', 'resEntRetirar')) return;
    if (!validarCampo(valorRetirar, 'Define el valor a recargar', 'resValorRetirar')) return;
    if (!validarNumero(valorRetirar, 'El valor no es valido!', 'resValorRetirar')) return;
    if (valorRetirar.value < valorMinimoRetirar) {
        mostrarError('El valor mínimo debe ser de $100.000', 'resValorRetirar');
        return;
    }

    const datos = {
        token: tokenRetirar.value,
        id: idRetirar.value,
        name: nameRetirar.value,
        documento: docRetirar.value,
        contacto: contactoRetirar.value,
        idJugador: idJugadorRetirar.value,
        casaApuestas: casaApuestasRetirar.value,
        codigo: codigoRetiro.value,
        entidad: entidadRetiro.value,
        cuenta: cuentaRetirar.value,
        valor: valorRetirar.value,
        createdAt
    };
    
    enviarRetiro(datos);

}

// envio de formulario para retirar
function enviarRetiro(datos) {

    spinner();

    // Realizar la solicitud POST usando Axios
    axios.post(BASE_URL + '/config/enviarRetiroTelegram.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

        .then(response => {

            const respuesta = response.data;
            Swal.close();

            if (respuesta === 1) {

                formRetirar.reset();
                Swal.fire({
                    title: "Se ha enviado su peticion!",
                    text: "Tu solicitud se puede tardar entre 15 a 20 minutos , si no se le ha hecho el envió DESPUES DE ESE TIEMPO comunícate via telegram.",
                    icon: "success"
                });

            } else if (respuesta === 2) {

                Swal.fire({
                    title: "Hubo en error!",
                    text: "Por favor intenta nuevamente!",
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
        .catch(error => {
            // Manejar errores
            console.error('Error al enviar la imagen:', error);
        });
}


function validarExtension(archivo) {
    const extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif']; // Lista de extensiones permitidas
    const extension = archivo.name.split('.').pop().toLowerCase(); // Obtener la extensión del archivo

    if (extensionesPermitidas.includes(extension)) {
        return true; // La extensión es válida
    } else {
        return false; // La extensión no es válida
    }
}

function spinner() {

    Swal.fire({
        title: "Cargando...",
        text: 'Permíteme por favor un momento mientras se realiza el proceso.',
        showCancelButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

}


function obtenerParametroURL() {
    const ruta = window.location.pathname;
    const parametros = ruta.split('/').filter(parametro => parametro !== ''); // Eliminar segmentos vacíos

    if (parametros.length > 0) {
        return parametros[parametros.length - 1];
    } else {
        return null;
    }
}

//! VALIDACION Y ENVIO DE INFORMACION DE LOS FORMULARIOS Y FUNCIONALIDAD DE LOS BOTONES DE LA VISTA OPERACIONES 

import { BASE_URL, PUBLIC_KEY_WOMPI, TEST_INTEGRITY } from "./config.js"
import { validarCampo, mostrarError, obtenerFecha, validarNumero, spinner } from "./funciones.js";

document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual
    var currentUrl = new URL(window.location.href);

    // Verificar si existe el parámetro "id"
    if (currentUrl.searchParams.has('id')) {
        // Eliminar el parámetro "id"
        currentUrl.searchParams.delete('id');

        // Actualizar la URL sin recargar la página
        history.replaceState(null, '', currentUrl.href);
    }
});


//Funcion y validacion de los botones que muestran los formularios de operaciones
const btnRetirar = document.getElementById('btn-retirar');
const btnRecargar = document.getElementById('btn-recargar');
const sectionRecargar = document.getElementById('section-recargar');
const sectionRetirar = document.getElementById('section-retirar');
//constante para usar en los dos formularios
const createdAt = obtenerFecha();

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

//* validacion y envio para el formulario de recargar
const formRecargar = document.getElementById('formRecargar');
const valorMinimoRecargar = 30000;
let metodoComprobante = false;

formRecargar.addEventListener('submit', submitFormRecargar);

const tokenRecargar = document.getElementById('token_recargar');
const idRecargar = document.getElementById('idRecargar');
const nameRecargar = document.getElementById('name-recargar');
const tipoDocRecargar = document.getElementById('tipoDocRecargar').value;
const docRecargar = document.getElementById('doc-recargar');
const prefijoRecargar = document.getElementById('Prefijo').value;
const contactoRecargar = document.getElementById('contacto-recargar');
const idJugadorRecargar = document.getElementById('idJugador-recargar');
const valorRecargar = document.getElementById('valor-recargar');
const comprobanteRecargar = document.getElementById('comprobante_recargar');
const casaApuestasRecargar = document.getElementById('casaApuestas-Recargar');
const checkWompi = document.getElementById('wompi');
const checkComprobante = document.getElementById('comprobante');
const divButtonWompi = document.getElementById('divWompi');
const divButtonSubmit = document.getElementById('btn-submit');
const emailRecargar = document.getElementById('emailRecargar');



//se agrega un evento a los check del formulario de recargas al momento de escojer el metodo de pago
checkWompi.addEventListener('change', comprobarChecks);
checkComprobante.addEventListener('change', comprobarChecks);

//funcion para validar el formulario y mostrar los div correspondientes dependiendo de check se escoja
function comprobarChecks() {

    if (checkWompi.checked) {
        divButtonSubmit.classList.toggle('hidden', !checkComprobante.checked);
        metodoComprobante = false;

        if (!validarFormRecargar()) {
            checkWompi.checked = false;
            divButtonWompi.classList.add('hidden');
            return

        } else {
            divButtonWompi.classList.toggle('hidden', !checkWompi.checked);
            divButtonSubmit.classList.toggle('hidden', !checkComprobante.checked);
        }
    }

    if (checkComprobante.checked) {
        divButtonWompi.classList.toggle('hidden', !checkWompi.checked);

        if (!validarFormRecargar()) {
            checkComprobante.checked = false;
            divButtonSubmit.classList.add('hidden');
            return

        } else {
            metodoComprobante = true;
            divButtonWompi.classList.toggle('hidden', !checkWompi.checked);
            divButtonSubmit.classList.toggle('hidden', !checkComprobante.checked);
        }
    }

}


const formButtonWompi = document.getElementById('formButtonWompi');

formButtonWompi.addEventListener('click', crearBotonWompi)


async function crearBotonWompi() {

    if (validarFormRecargar()) {

        let precioSentavos = formatoAPesos(valorRecargar.value);
        let referencia = generarReferencia();
        let fechaExpiracion = obtenerFechaExpiracion();

        const hashIntegridad = await crearHash(referencia, precioSentavos, fechaExpiracion);

        // Paso 2: Configura los datos de la transacción
        var checkout = new WidgetCheckout({
            currency: 'COP',
            amountInCents: precioSentavos,
            reference: referencia,
            publicKey: PUBLIC_KEY_WOMPI,
            signature: {
                integrity: hashIntegridad
            },
            redirectUrl: 'http://localhost/Precargaya/operaciones/recargar', // Opcional
            expirationTime: fechaExpiracion, // Opcional
            customerData: {
                email: emailRecargar.value, // Opcional // Aquí puedes poner un campo de entrada si lo deseas
                fullName: nameRecargar.value,
                phoneNumber: contactoRecargar.value,
                phoneNumberPrefix: prefijoRecargar,
                legalId: docRecargar.value,
                legalIdType: tipoDocRecargar
            }
        });


        guardarDatosStorage(referencia);
        openCheckout(checkout)
    }

}

function openCheckout(parametro) {
    parametro.open(function (result) {
        const { status, id, reference, paymentMethodType } = result.transaction;
        
        if (status === 'APPROVED') {
            if(paymentMethodType === 'BANCOLOMBIA_COLLECT'){
                Swal.fire({
                    title: "Transaccion en proceso!",
                    text: "Cuando realizes el pago emite tu recarga por la opcion subir comprobante de pago.",
                    icon: "success"
                });
                return
            }else{
                enviarRecarga(reference, id, paymentMethodType);
            }

        } else if (status === 'DECLINED') {
            Swal.fire({
                title: "Transacción RECHAZADA!",
                icon: "error"
            });

        }else{
            Swal.fire({
                title: "Hubo un error!",
                text: 'Por favor intenta nuevamente!',
                icon: "error"
            });
        }
    });
}

//funcion para colocar los valores por defecto de realizar una recarga y ocultar los div
function ocultarCampos() {
    divButtonSubmit.classList.add('hidden');
    divButtonWompi.classList.add('hidden');
    checkComprobante.checked = false
    checkWompi.checked = false;
    metodoComprobante = false;
}

function submitFormRecargar(e){
    e.preventDefault();
    enviarRecarga(null, null, null)
}

//se validacion cada campo del formulario
function validarFormRecargar() {

    if (!validarCampo(nameRecargar, 'Define tu nombre completo', 'resUserRecargar')) return false;
    if (!validarCampo(docRecargar, 'Define tu documento', 'resDocRecargar')) return false;
    if (!validarNumero(docRecargar, 'El documento no es válido', 'resDocRecargar')) return false;
    if (!validarCampo(contactoRecargar, 'Define número de contacto', 'resContactoRecargar')) return false;
    if (!validarNumero(contactoRecargar, 'El número no es válido', 'resContactoRecargar')) return false;
    if (!validarCampo(idJugadorRecargar, 'Define ID de jugador', 'resIDjugadorRecargar')) return false;
    if (!validarCampo(casaApuestasRecargar, 'Selecciona una opción válida', 'resCasaApuestasRecargar')) return false;
    if (!validarCampo(valorRecargar, 'Define el valor a recargar', 'resValorRecargar')) return false;
    if (!validarNumero(valorRecargar, 'El valor no es válido', 'resValorRecargar')) return false;
    if (!validarCampo(emailRecargar, 'Ha ocurrido un error, Recarga la pagina', 'RespSesion')) return false;
    if (!validarCampo(tokenRecargar, 'Ha ocurrido un error, Recarga la pagina', 'RespSesion')) return false;
    if (!validarCampo(idRecargar, 'Ha ocurrido un error, Recarga la pagina', 'RespSesion')) return false;

    if (valorRecargar.value < valorMinimoRecargar) {
        mostrarError('El valor mínimo debe ser de $30.000', 'resValorRecargar');
        return false;
    }

    if (metodoComprobante) {
        
        if (!comprobanteRecargar.files[0]) {
            mostrarError('Sube tu comprobante de pago', 'comprobantePago');
            return false;
        }

        if (!validarExtension(comprobanteRecargar.files[0])) {
            mostrarError('La extensión de la imagen no es válida', 'comprobantePago');
            return false;
        }
    }

    guardarDatosStorage()
    return true; // Si todas las validaciones fueron exitosas
}


function guardarDatosStorage(referencia) {

    const datos = {
        idJugador: idJugadorRecargar.value,
        casaApuestas: casaApuestasRecargar.value,
        valor: valorRecargar.value,
        referenciaStorage: referencia || ''
    }

    localStorage.setItem('RecargaYa', JSON.stringify(datos))

}

function sincronizarStorage(){
    const datosStorage = JSON.parse(localStorage.getItem('RecargaYa'));
    return datosStorage
}

//Envio de formulario recargar
function enviarRecarga(referencia, idPago, metodoPago) {


    const datosStorage = sincronizarStorage();
    
    if(datosStorage){

        const { idJugador, casaApuestas, valor } = datosStorage;
        idJugadorRecargar.value = idJugador;
        casaApuestasRecargar.value = casaApuestas;
        valorRecargar.value = valor;

    }

    const formData = new FormData();
    formData.append('token', tokenRecargar.value);
    formData.append('id', idRecargar.value);
    formData.append('name', nameRecargar.value);
    formData.append('documento', docRecargar.value);
    formData.append('contacto', contactoRecargar.value);
    formData.append('idJugador', idJugadorRecargar.value);
    formData.append('casaApuestas', casaApuestasRecargar.value);
    formData.append('valor', valorRecargar.value );
    formData.append('createdAt', createdAt);

    if (validarFormRecargar()) {

        if (idPago === null) {
            formData.append('imagen', comprobanteRecargar.files[0]);
        } else {
            
            const { referenciaStorage } = datosStorage
            formData.append('idPago', idPago);
            formData.append('referencia', referencia || referenciaStorage);
            formData.append('metodo', metodoPago || 'Wompi');
        }

        spinner();

        // Realizar la solicitud POST usando Axios
        axios.post(BASE_URL + '/config/operaciones/enviarRecargaTelegram.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })

            .then(response => {

                const respuesta = response.data;
                Swal.close();

                if (respuesta === 1) {
                    localStorage.removeItem('RecargaYa');
                    ocultarCampos();
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

                    Swal.fire({
                        title: "Hubo un error!",
                        text: `${respuesta}`,
                        icon: "error"
                    });
                }
            })
            .catch(error => {
                // Manejar errores
                console.error('Error al enviar', error);
            });
    }
}

//! -----------------------------------------------------------------------------------------------------------------------------------
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
    axios.post(BASE_URL + '/config/operaciones/enviarRetiroTelegram.php', datos, {
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

                Swal.fire({
                    title: "Hubo un error!",
                    text: `${respuesta}`,
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

function obtenerParametroURL() {
    const ruta = window.location.pathname;
    const parametros = ruta.split('/').filter(parametro => parametro !== ''); // Eliminar segmentos vacíos

    if (parametros.length > 0) {
        return parametros[parametros.length - 1];
    } else {
        return null;
    }
}
function generarReferencia() {

    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const longitud = 24;
    let referencia = '';
    for (let i = 0; i < longitud; i++) {
        referencia += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return referencia;
}


async function crearHash(referencia, valor, fecha) {
    const valorTexto = valor.toString();
    const cadenaConcatenada = referencia + valorTexto + "COP" + fecha + TEST_INTEGRITY;

    // Codificar la cadena concatenada a UTF-8
    const encondedText = new TextEncoder().encode(cadenaConcatenada);
    // Calcular el hash SHA-256
    const hashBuffer = await crypto.subtle.digest("SHA-256", encondedText);
    // Convertir el buffer de hash a un array de bytes
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    // Convertir el array de bytes a una cadena hexadecimal
    const hashHex = hashArray.map((b) => b.toString(16).padStart(2, "0")).join("");
    return hashHex;
}


function formatoAPesos(precio) {
    // Multiplicar el precio por 100 para convertirlo a centavos
    const precioEnCentavos = precio * 100;
    // Devolver el precio en centavos
    return precioEnCentavos;
}

function obtenerFechaExpiracion() {
    // Obtener la hora actual
    let horaActual = new Date();
    // Sumar 3 minutos
    horaActual.setMinutes(horaActual.getMinutes() + 5);
    // Formatear la hora en el formato ISO 8601
    let horaFormateada = horaActual.toISOString();
    return horaFormateada;
}

export {
    enviarRecarga
}

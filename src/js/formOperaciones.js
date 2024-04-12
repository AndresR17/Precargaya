import { BASE_URL } from "./config.js"
import { validarCampo, mostrarError, obtenerFecha } from "./funciones.js";


//Funcion y validacion de los botones que muestran los formularios de operaciones
const btnRetirar = document.getElementById('btn-retirar');
const btnRecargar = document.getElementById('btn-recargar');
const sectionRecargar = document.getElementById('section-recargar');
const sectionRetirar = document.getElementById('section-retirar');

btnRetirar.addEventListener('click', () => cambiarColor(btnRetirar, btnRecargar, sectionRetirar, sectionRecargar));
btnRecargar.addEventListener('click', () => cambiarColor(btnRecargar, btnRetirar, sectionRecargar, sectionRetirar));


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



// validacion para el formulario de recargar saldo en la vista operaciones
const formRetirar = document.getElementById('formRetirar');

const formRecargar = document.getElementById('formRecargar');
formRecargar.addEventListener('submit', validarFormRecargar);
const valorMinimo = 30000;

const tokenRecargar = document.getElementById('token_recargar');
const idRecargar = document.getElementById('idRecargar');
const nameRecargar = document.getElementById('name-recargar');
const docRecargar = document.getElementById('doc-recargar');
const idJugadorRecargar = document.getElementById('idJugador-recargar');
const valorRecargarInput = document.getElementById('valor-recargar');
const comprobanteRecargar = document.getElementById('comprobante_recargar');
const createdAt = obtenerFecha()

function validarFormRecargar(e) {
    e.preventDefault();

    const valorRecargar = Number(valorRecargarInput.value);
    if (!validarCampo(nameRecargar, 'Define tu nombre completo', 'resUserRecargar')) return;
    if (!validarCampo(docRecargar, 'Define tu documento', 'resDocRecargar')) return;
    if (!validarCampo(idJugadorRecargar, 'Define ID de jugador', 'resIDjugadorRecargar')) return;
    if (!validarCampo(valorRecargarInput, 'Define el valor a recargar', 'resValorRecargar')) return;
    if (valorRecargar < valorMinimo) {
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
    formData.append('idJugador', idJugadorRecargar.value);
    formData.append('valor', valorRecargar);
    formData.append('createdAt', createdAt);

    enviarMensaje(formData)
}

function enviarMensaje(datos) {

    spinner();

    // Realizar la solicitud POST usando Axios
    axios.post(BASE_URL + '/config/mensajeApiTelegram.php', datos, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })

        .then(response => {

            console.log('Respuesta del servidor:', response.data);
            const respuesta = response.data;

            if (respuesta === 1) {

                formRecargar.reset();
                Swal.fire({
                    title: "Se ha enviado su peticion!",
                    text: "Si en 15 minutos no se realiza la recarga por favor contactanos via telegram.",
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

    let timerInterval;
    Swal.fire({
        title: "Enviando peticion!",
        text: "Permíteme por favor un momento mientras realizo el proceso de deposito",
        timer: 5000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    })

}
//*funciones generales

function validarCorreo(email) {
    // Expresión regular para validar un correo electrónico
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexCorreo.test(email);
}


function obtenerFecha() {
    var fechaActual = new Date();

    var año = fechaActual.getFullYear();
    var mes = fechaActual.getMonth() + 1;
    var dia = fechaActual.getDate();

    // Formatear la fecha en un formato legible AAAA-MM-DD
    var fechaFormateada = año + "-" + (mes < 10 ? "0" + mes : mes) + "-" + (dia < 10 ? "0" + dia : dia);
    return fechaFormateada;
}

function mostrarError(mensaje, id) {

    const alerta = document.querySelector(`.${id}`);

    if (!alerta) {
        const alerta = document.createElement('div');
        const container = document.getElementById(id)

        alerta.innerHTML = `
            <span class="${id} block p-2 mt-2 text-sm text-red-800 border border-red-400 bg-red-200 rounded-lg">${mensaje}</span>
        `;

        container.appendChild(alerta);
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

function validarCampo(campo, mensaje, resultadoId) {
    if (campo.value === "") {
        mostrarError(mensaje, resultadoId);
        return false;
    }
    return true;
}


export {
    validarCorreo,
    obtenerFecha,
    mostrarError,
    validarCampo
}
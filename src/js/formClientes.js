const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);

function validarCampos(e) {
    e.preventDefault();

    const documento = document.getElementById('documento').value;
    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    const aceptoCheck = document.getElementById('acepto');


    if (documento.trim() === '' ) {
        
        mostrarError('Define tu numero de documento', 'resDoc');
        return;

    }else if(isNaN(documento)){
        mostrarError('Este campo es numérico', 'resDoc');
        return
    }

    if (name.trim() == "") {
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

    if (phone.trim() === '' ) {
        mostrarError('Define tu numero de contacto', 'resPhone');
        return;
    }else if(isNaN(phone)){
        mostrarError('Este campo es numérico', 'resPhone');
        return
    }

    if(aceptoCheck.checked === false){
        mostrarError('Debes aceptar los terminos y condiciones', 'resCheck');
        return
    }

    const datos = {
        documento,
        name,
        email,
        phone,
        message,
        check : 'Acepto terminos'
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
            console.log(response)

            if (respuesta === 1) {

                Swal.fire({
                    title: "Hubo un error!",
                    text: "Este correo ya fue usado anteriormente.",
                    icon: "error"
                });
            }

            if (respuesta === 2) {

                formulario.reset();

                Swal.fire({
                    title: "Registro exitoso!",
                    text: "Los datos se han guardado correctamente.",
                    icon: "success"
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
            <span class="${id} block p-2 mt-2 text-sm text-red-800 border border-red-600 rounded-lg bg-red-50">${mensaje}</span>
        `;

        container.appendChild(alerta);
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

function validarCorreo(email) {
    // Expresión regular para validar un correo electrónico
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexCorreo.test(email);
}


const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);

function validarCampos(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const date = document.getElementById('date').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const text = document.getElementById('text').value;

    if (name.trim() == "") {
        mostrarAlerta('El nombre es obligatorio', 'resName')
        return
    }


    if(date === ""){
        mostrarAlerta('Define una fecha de nacimiento', 'resDate')
        return
    }

    if (!validarFecha(date)) {
        mostrarAlerta('La fecha ingresada no es valida.','resDate');
        return
    } 

    if (email.trim() === "") {
        mostrarAlerta('Define tu correo', 'resEmail');
        return;

    } else if (!validarCorreo(email)) {
        mostrarAlerta('El formato del correo es inválido', 'resEmail');
        return;
    }

    if (phone.trim() === '' ) {
        mostrarAlerta('Define tu numero de contacto', 'resPhone');
        return;
    }else if(isNaN(phone)){
        mostrarAlerta('Este campo es numérico', 'resPhone');
        return
    }

    if (text.trim() === "") {
        mostrarAlerta('Dejanos tu comentario', 'resText')
        return
    }

    const datos = {
        name,
        lastname,
        date,
        email,
        phone,
        text
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




function mostrarAlerta(mensaje, id) {

    const alerta = document.querySelector(`.${id}`);

    if (!alerta) {
        const alerta = document.createElement('div');
        const container = document.getElementById(id)

        alerta.innerHTML = `
            <span class="${id} text-white bg-danger rounded p-2 mt-4">${mensaje}</span>
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

function validarFecha(fecha) {
    var fechaActual = new Date();

    var fechaIngresada = new Date(fecha);

    return fechaIngresada < fechaActual;
}
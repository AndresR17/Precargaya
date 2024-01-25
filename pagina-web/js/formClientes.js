const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);

function validarCampos(e) {

    const name = document.getElementById('name').value;
    const lastname = document.getElementById('lastname').value;
    const date = document.getElementById('date').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const text = document.getElementById('text').value;

    if (name == "") {
        e.preventDefault();
        mostrarAlerta('El nombre es obligatorio', 'resName')
        return
    }

    if (lastname == "") {
        e.preventDefault();
        mostrarAlerta('El apellido es obligatorio', 'resLastName')
        return
    }

    if (date == "") {
        e.preventDefault();
        mostrarAlerta('Seleccione una fecha', 'resDate')
        return
    }

    if (phone == "") {
        e.preventDefault();
        mostrarAlerta('Define un numero de contacto', 'resPhone')
        return
    }

    if (email == "") {
        e.preventDefault();
        mostrarAlerta('Define tu correo', 'resEmail')
        return
    }

    if (text == "") {
        e.preventDefault();
        mostrarAlerta('Dejanos tu comentario', 'resText')
        return
    }

}


function mostrarAlerta(mensaje, id) {

    const alerta = document.querySelector(`.${id}`);

    if (!alerta) {
        const alerta = document.createElement('div');
        const container = document.getElementById(id)

        alerta.innerHTML = `
            <span class="${id} text-white bg.danger">${mensaje}</span>
        `;

        container.appendChild(alerta);
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}
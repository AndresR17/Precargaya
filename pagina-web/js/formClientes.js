const formulario = document.getElementById('formClientes');

formulario.addEventListener('submit', validarCampos);

function validarCampos(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const lastname = document.getElementById('lastname').value;
    const date = document.getElementById('date').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const text = document.getElementById('text').value;

    if (name.trim() == "") {
        mostrarAlerta('El nombre es obligatorio', 'resName')
        return
    }

    if (lastname.trim() == "") {
        mostrarAlerta('El apellido es obligatorio', 'resLastName')
        return
    }

    if (date.trim() == "") {
        mostrarAlerta('Seleccione una fecha', 'resDate')
        return
    }

    if (email.trim() == "") {
        mostrarAlerta('Define tu correo', 'resEmail')
        return
    }

    if (phone.trim() !== '' && isNaN(phone)) {
        mostrarAlerta('Este campo es numérico', 'resPhone');
        return;
    }

    if (text.trim() == "") {
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

            if(respuesta === 1){

                Swal.fire({
                title: "Hubo un error!",
                text: "Este correo ya fue usado anteriormente.",
                icon: "error"
            });
        }

            if(respuesta === 2){

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
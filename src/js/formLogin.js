const formLogin = document.getElementById('formLogin')
const divAlerta = document.querySelector(`.mostrarAlerta`);

formLogin.addEventListener('submit', ValidarDatos)

function ValidarDatos(e) {
    e.preventDefault()

    const user = document.getElementById('user').value;
    const password = document.getElementById('password').value;

    if (user.trim() == "") {
        mostrarAlerta('El usuario es obligatorio')
        return
    }

    if (password.trim() == "") {
        mostrarAlerta('El password es obligatorio')
        return
    }

    const datos = {
        user,
        password
    }

    IniciarSesion(datos)

}

function IniciarSesion(datos) {

    axios.post('./config/login.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {

            const  respuesta  = response.data;

            if (respuesta === 1) {
                formLogin.reset();
                window.location.href = './auth/usuarios.php';
            }

            if (respuesta === 2) {
                mostrarAlerta('El usuario o password son incorrectos!')
                return
            }

        })
        .catch(function (error) {
            console.log(error);
        })
}

function mostrarAlerta(mensaje) {
    limpiarHTML(divAlerta)
    const alerta = document.querySelector(`.alerta`);

    if (!alerta) {
        
        const alerta = document.createElement('div');
        alerta.innerHTML = `
            <span class="alerta block text-center w-full text-sm text-red-800 border border-red-400 font-semibold rounded bg-red-200 px-4 py-2">${mensaje}</span>
        `;

        divAlerta.appendChild(alerta);
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

function limpiarHTML(container){
    while(container.firstChild) {
        container.removeChild(container.firstChild);
    }
}
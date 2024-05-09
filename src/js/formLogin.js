//!validacion e inicio de sesion
import { BASE_URL, currentPath } from './config.js';
import { validarCorreo, spinner } from './funciones.js';


const formLogin = document.getElementById('formLogin')
const divAlerta = document.querySelector(`.mostrarAlerta`);

formLogin.addEventListener('submit', ValidarDatos)

function ValidarDatos(e) {
    e.preventDefault()
    
    const token = document.getElementById('csrf_token').value;
    const user = document.getElementById('user');
    const password = document.getElementById('password').value;

    if (user.value.trim() == "") {
        mostrarAlerta('El Email es obligatorio')
        return
    }

    if(!validarCorreo(user)){
        mostrarAlerta('El formato del email es inválido!')
        return
    }

    if (password.trim() == "") {
        mostrarAlerta('El password es obligatorio')
        return
    }

    const datos = {
        token,
        user:user.value,
        password
    }
    
    IniciarSesion(datos)

}

function IniciarSesion(datos) {

    spinner()

    axios.post(BASE_URL + '/config/auth/login.php', datos, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function (response) {
            
            const  respuesta  = response.data;
            Swal.close();

            if (respuesta === 'admin') {
                formLogin.reset();
                window.location.href = BASE_URL + '/admin/dashboard.php';
                return
            }

            if (respuesta === 'Cliente') {
                formLogin.reset();
                window.location.href = currentPath;
                return
            }

            if (respuesta === 2) {
                mostrarAlerta('El usuario o password son incorrectos!')
                return

            }else{
                Swal.fire({
                    title: "Hubo un error!",
                    text: `${respuesta}`,
                    icon: "error"
                });
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
            <span class="alerta block text-center w-full text-sm text-red-800 border border-red-400 bg-red-200 font-semibold rounded px-4 py-2">${mensaje}</span>
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
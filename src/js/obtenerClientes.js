window.addEventListener('load', ()=> {

        axios.get('./config/obtenerClientes.php')
        
            .then(function (response) {
                // const respuesta = response.data;
                console.log(response)

            })
            .catch(function (error) {
                console.log(error);
            })
})
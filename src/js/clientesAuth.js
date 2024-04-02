//*funcion para mostrar un modal cuando se esta eliminando un usuario del panel administrativo

function mostrarAlerta(id, pagina) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Un cliente eliminado no se puede recuperar.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, Eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../config/eliminarCliente.php?pagina=${pagina}&idCliente=${id}`
        }
    });

}

//*funcion para mostrar un modal cuando se esta eliminando un cliente del panel administrativo
function mostrarAlerta(id, pagina, usuario) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: `Un ${usuario} eliminado no se puede recuperar.`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, Eliminar",
        cancelButtonText: "Cancelar"

    }).then((result) => {
        if (result.isConfirmed) {
            if(pagina === null){
                window.location.href = `../config/admin/eliminarUsuario.php?id=${id}`
            }else{
                window.location.href = `../config/admin/eliminarCliente.php?pagina=${pagina}&idCliente=${id}`
            }
        }
    });

}

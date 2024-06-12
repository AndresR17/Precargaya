<?php
//! FUNCIONES GENERALES PARA USAR EN LA VISTAS

//se usa para obtener todos los registros
function obtenerDatos($conexion, $tabla, $id)
{
    $sql = "SELECT * FROM $tabla";
    if (isset($id)) {
        $sql .= " WHERE rol != 'Cliente' AND id != $id AND estado != 'eliminado'";
    }
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    // mysqli_close($conexion);
    return $datos;
}

//se usa para mostrar el numero total de registros en la vista dashboard
function obtenerRegistros($conexion, $tabla, $operador, $id)
{
    $sql = "SELECT COUNT(id) FROM $tabla WHERE id != $id AND estado = 'activo'";

    if ($tabla == 'usuarios') {
        $sql .= " AND rol $operador 'cliente'";
    }
    $totalResultado = mysqli_query($conexion, $sql);
    $total = mysqli_fetch_array($totalResultado);
    $total = (int) $total[0];
    return $total;
}

//se usa para mostrar los ultimos registros en la vista dashboard
function obtenerUltimosRegistros($conexion)
{
    $sql = "SELECT * FROM usuarios WHERE estado = 'activo' ORDER BY id DESC LIMIT 0,3;";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $datos;
}

// obtener registros para las operaciones de cada usuario
function obtenerOperaciones($conexion, $id)
{
    $sql = "SELECT * FROM operaciones WHERE id_usuario = $id ORDER BY id DESC LIMIT 0,15;";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $datos;
}

function verificarUsuario($conexion, $idEncript)
{
    $datos = 0;
    $id = openssl_decrypt($idEncript, AES, KEY);
    if (is_numeric($id)) {
        $sql = "SELECT * FROM usuarios WHERE id = $id AND rol != 'Cliente' AND estado != 'eliminado'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0){
            $datos = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
    }
    return $datos;

}


function formatearFecha($fecha)
{
    // Crear un objeto DateTime a partir de la fecha proporcionada
    $fechaObjeto = new DateTime($fecha);

    // Obtener los nombres de los meses en español
    $mesesEspanol = [
        'January' => 'enero',
        'February' => 'febrero',
        'March' => 'marzo',
        'April' => 'abril',
        'May' => 'mayo',
        'June' => 'junio',
        'July' => 'julio',
        'August' => 'agosto',
        'September' => 'septiembre',
        'October' => 'octubre',
        'November' => 'noviembre',
        'December' => 'diciembre'
    ];

    // Formatear la fecha en inglés
    $fechaFormateada = $fechaObjeto->format('d \d\e F \d\e Y'); // "d" para día, "F" para mes y "Y" para año

    // Reemplazar el nombre del mes en inglés por el correspondiente en español
    $mesIngles = $fechaObjeto->format('F');
    $mesEspanol = $mesesEspanol[$mesIngles];
    $fechaFormateada = str_replace($mesIngles, $mesEspanol, $fechaFormateada);

    return $fechaFormateada;
}

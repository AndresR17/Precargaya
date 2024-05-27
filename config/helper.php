<?php
//! FUNCIONES GENERALES PARA USAR EN LA VISTAS
function obtenerDatos($conexion, $tabla, $id)
{
    $sql = "SELECT * FROM $tabla";
    if(isset($id)){
        $sql .= " WHERE rol != 'Cliente' AND id != $id";
    }
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $datos;
}

function obtenerRegistros($conexion, $tabla, $operador, $id){
    $sql = "SELECT COUNT(id) FROM $tabla WHERE id != $id AND estado = 'activo'";
        
        if($tabla == 'usuarios'){
            $sql .= " AND rol $operador 'cliente'";
        }
        $totalResultado = mysqli_query($conexion, $sql);
        $total = mysqli_fetch_array($totalResultado);
        $total = (int) $total[0];
        return $total;
}

function obtenerUltimosRegistros($conexion){
    $sql = "SELECT * FROM usuarios WHERE estado = 'activo' ORDER BY id DESC LIMIT 0,3;";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $datos;
}

// obtener registros para las operaciones de cada usuario
function obtenerOperaciones($conexion, $id){
    $sql = "SELECT * FROM operaciones WHERE id_usuario = $id ORDER BY id DESC LIMIT 0,15;";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_close($conexion);
    return $datos;
}

function formatearFecha($fecha) {
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

// Ejemplo de uso
echo formatearFecha('2024-05-26'); // "26 de mayo de 2024"

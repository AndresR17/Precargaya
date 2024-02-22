<?php

//verificamos si viene algun parametro de busqueda
$busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : '';

$sqlBase = "SELECT * FROM clientes";

if ($busqueda != '') {
    $sqlBase .= " WHERE documento LIKE '%$busqueda%' OR email LIKE '%$busqueda%'";
}

$resultadoBase = $conexion->query($sqlBase);
$total = (int) $resultadoBase->num_rows;

//numero de registros a obtener
$registros = 10;

//indicar desde que regitro queremos tomar 
$pagina = $_GET['pagina'];
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

//definir el contador para los registros
$contador = $inicio + 1;

//validar que aun queden registros en la consulta
$Npaginas = ceil($total / $registros);


// Obtener los registros según la página y el parámetro de búsqueda
if ($total >= 1 && $pagina <= $Npaginas) {

    $sql = "$sqlBase LIMIT $inicio, $registros";
    $clientes = $conexion->query($sql);
    $clientes = mysqli_fetch_all($clientes, MYSQLI_ASSOC);

} else {
    $clientes = [];
}

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>


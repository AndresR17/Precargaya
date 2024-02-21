<?php


function obtenerDatos($conexion, $tabla)
{
    $sql = "SELECT * FROM $tabla";
    $resultado = mysqli_query($conexion, $sql);
    
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($conexion);

    return $datos;
}

function obtenerClientes($conexion)
{
    $sql = "SELECT * FROM clientes LIMIT 0,10";
    $resultado = mysqli_query($conexion, $sql);
    
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($conexion);

    return $datos;
}

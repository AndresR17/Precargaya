<?php

function obtenerDatos($conexion, $tabla)
{
    $sql = "SELECT * FROM $tabla";
    $resultado = mysqli_query($conexion, $sql);
    
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($conexion);

    return $datos;
}


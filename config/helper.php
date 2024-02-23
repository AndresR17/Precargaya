<?php

function obtenerDatos($conexion, $tabla)
{
    $sql = "SELECT * FROM $tabla";
    $resultado = mysqli_query($conexion, $sql);
    
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($conexion);

    return $datos;
}

function BorrarErrores(){

	if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado']=null;
	}

    if(isset($_SESSION['error'])){
		$_SESSION['error']=null;
	}

}
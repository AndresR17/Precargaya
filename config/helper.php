<?php

function obtenerDatos($conexion, $tabla, $id)
{
    $sql = "SELECT * FROM $tabla";

    if(isset($id)){
        $sql .= " WHERE id = $id";
    }

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

function obtenerRegistros($conexion, $tabla, $id){

    $sql = "SELECT COUNT(id) FROM $tabla";
        
        if($tabla == 'usuarios'){
            $sql .= " WHERE id != $id";
        }

        if($tabla == 'clientes'){
            $sql .= " WHERE estado = 'activo' ";
        }


        $totalResultado = mysqli_query($conexion, $sql);

        $total = mysqli_fetch_array($totalResultado);
        $total = (int) $total[0];

        return $total;
}

function obtenerUltimosRegistros($conexion){
    $sql = "SELECT * FROM clientes WHERE estado = 'activo' ORDER BY id DESC LIMIT 0,2;";

    $resultado = mysqli_query($conexion, $sql);
    
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
    mysqli_close($conexion);

    return $datos;
}
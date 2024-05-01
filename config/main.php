<?php 
//!FUNCIONES GENERALES PARA USAR EN LOS ARCHIVOS QUE VALIDAN O REALIZAN LAS SOLICITUDES EN EL BACKEND
session_start();
session_regenerate_id(true);

function enviarRespuestaJSON($respuesta) {
    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit();
}

function limpiar_cadena($cadena){
    $cadena = trim($cadena);      // la funcion trim elimina espacios en blanco del inicio o al final de la cadena
    $cadena = stripcslashes($cadena);  //stripcslashes quita las barras de un string con comillas escapadas
    $cadena = str_ireplace("<script>", " " ,$cadena); //reemplaza un texto mediante una busqueda, esta version es incensible para mayusculas y minusculas
    //aqui esta reemplazando los primeros parametros por espacios vacios...Esto se usa para evitar inyeccion SQL
    $cadena = str_ireplace("</script>", " " ,$cadena); 
    $cadena = str_ireplace("<script src", "", $cadena);
    $cadena = str_ireplace("<script type=", "", $cadena);
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("DROP DATABASE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES;", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);
    return $cadena;
}

function generarToken() {
    return bin2hex(random_bytes(32));
}

?>
<?php 

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base = "ganaderia";

$conexion =mysqli_connect($servidor,$usuario,$contrasena,$base) or die ("Error al conectarse a la base de datos");
?>
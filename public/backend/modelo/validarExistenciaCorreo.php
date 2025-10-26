<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Formato de Correo No Valido')</script>";
        return;
    }

    if(empty($correo)){
        echo "<script>alert('La celda del correo no tiene que estar vacia')</script>";
        return;
    }

    existenciaCorreo($conexion, $correo);
}

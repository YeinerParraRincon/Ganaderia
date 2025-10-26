<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"] ?? "";
    $codigo = $_POST["codigo"] ?? "";


    if (!ctype_digit($codigo)) {
        echo "<script>alert('Solo Se permite numeros en el campo de codigo')</script>";
        return;
    }

    if (empty($codigo)) {
        echo "<script>alert('No se permite la celda del codigo vacio')</script>";
        return;
    }

    
    verificarCodigos($conexion, $correo, $codigo);
}

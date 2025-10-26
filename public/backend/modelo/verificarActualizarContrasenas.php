<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contraseñaPrincipal = $_POST["contra"];
    $repeticionContraseña = $_POST["contra1"];
    $correo  = $_POST["correo"];

    if ($contraseñaPrincipal != $repeticionContraseña) {
        echo "<script>alert('Las Contraseñas No Coinciden')</script>";
        return;
    }

    
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $contraseñaPrincipal)) {
    echo "<script>alert('La contraseña debe tener mínimo 8 caracteres, incluir mayúscula, minúscula y número, y no contener símbolos.')</script>";
    return;
}

if(empty($contraseñaPrincipal) && empty($repeticionContraseña)){
    echo "<script>alert('No se permite campos vacios')</script>";
    return;
}

    actualizarContraseñas($conexion, $contraseñaPrincipal, $correo);
}

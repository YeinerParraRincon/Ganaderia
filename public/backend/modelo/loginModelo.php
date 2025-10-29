<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"] ?? "";
    $passwornd = $_POST["contraseña"] ?? "";


    if (empty($correo) && empty($passwornd)) {
        echo "<script>alert('No se permite campos vacios');
        window.location.href = '/ganaderia/public/view/login.php'
        </script>";
        return;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Formato de Correo no Valido')</script>";
        return;
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $passwornd)) {
        echo "<script>alert('La contraseña debe tener mínimo 8 caracteres, incluir mayúscula, minúscula y número, y no contener símbolos.');
        window.history.back();
        </script>";
        return;
    }


    validarUsuario($conexion, $correo, $passwornd);
}

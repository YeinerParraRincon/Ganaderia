<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST["id_usuario"];
    $nombre = $_POST["nombre"];
    $tipo_documneto = $_POST["tipo_documento"];
    $numero_documento = $_POST["documento"];
    $rol = $_POST["rol"];
    $fecha_nacimiento = $_POST["fecha"];
    $telefono = $_POST["telefono"];
    $nombre_finca = $_POST["finca"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contra"];

    if (empty($nombre) && empty($numero_documento) && empty($fecha_nacimiento) && empty($telefono) && empty($nombre_finca) && empty($correo) && empty($contrasena)) {
        echo "<script>alert('No se permite campos vacios')</script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        echo "<script>alert('El campo de nombre tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }


    if (!ctype_digit($numero_documento)) {
        echo "<script>alert('El campo de documento tiene un formato invalido no se permite letras o simbolos')</script>";
        return;
    }

    $fecha_actual = date("Y-m-d");
    if ($fecha_nacimiento > $fecha_actual) {
        echo "<script>alert('La fecha de nacimiento no puede ser mayor a la fecha actual')</script>";
        return;
    }

    if (!preg_match("/^3[0-9]{9}$/", $telefono)) {
        echo "<script>alert('El número de teléfono no es válido. Debe comenzar con 3 y tener 10 dígitos (ejemplo: 3101234567).')</script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre_finca)) {
        echo "<script>alert('El campo de nombre tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Formato de correo no valido porfavor validar ese campo')</script>";
        return;
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $contrasena)) {
        echo "<script>alert('La contraseña debe tener mínimo 8 caracteres, incluir mayúscula, minúscula y número, y no contener símbolos.')</script>";
        return;
    }

    actualizarUsuario($conexion,$id_usuario,$nombre,$tipo_documneto,$numero_documento,$rol,$fecha_nacimiento,$telefono,$nombre_finca,$correo,$contrasena);
}

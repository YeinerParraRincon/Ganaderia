<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? "";
    $tipo_documento = $_POST["tipo_documento"] ?? "";
    $documento = $_POST["documento"] ?? "";
    $rol = $_POST["rol"] ?? "";
    $fecha_nacimiento = $_POST["fecha"] ?? "";
    $fecha_registro = date('Y-m-d') ?? "";
    $telefono = $_POST["telefono"] ?? "";
    $finca = $_POST["finca"] ?? "";
    $correo = $_POST["correo"] ?? "";
    $confirmacion_correo = $_POST["correo2"];
    $contra = $_POST["contra"] ?? "";
    $imagen = $_FILES["imagen"]["name"];

    $tipos_permitidos = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/webp"];
    if (!in_array($_FILES["imagen"]["type"], $tipos_permitidos)) {
        echo "<script>alert('Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF, WEBP).');
        window.history.back();
        </script>";
        return;
    }

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img-archivos/" . $_FILES["imagen"]["name"]);

    if (
        empty($nombre) && empty($documento) && empty($fecha_nacimiento) && empty($telefono) && empty($finca) && empty($correo) && empty($confirmacion_correo)
        && empty($contran)
    ) {
        echo "<script>alert('No se permite campos vacios');
        window.history.back();
        </script>";
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        echo "<script>alert('El campo de nombre tiene un formato invalido no se permite numeros o simbolos porfavor verificar');
        window.history.back();
        </script>";
        return;
    }


    if (!ctype_digit($documento)) {
        echo "<script>alert('El campo de documento tiene un formato invalido no se permite letras o simbolos');
        window.history.back();
        </script>";
        return;
    }

    if (!preg_match("/^[0-9]{10}$/", $documento)) {
        echo "<script>alert('El documento debe tener exactamente 10 dígitos numéricos.');
        window.history.back();
        </script>";
        return;
    }

    $fecha_actual = new DateTime();
    $fecha_minima = $fecha_actual->modify("-18 years");
    $fecha_nac = new DateTime($fecha_nacimiento);

    if ($fecha_nac > $fecha_minima) {
        echo "<script>alert('Solo pueden registrarse mayores de 18 años.');
        window.history.back();
        </script>";
        return;
    }


    if (!preg_match("/^3[0-9]{9}$/", $telefono)) {
        echo "<script>alert('El número de teléfono no es válido. Debe comenzar con 3 y tener 10 dígitos (ejemplo: 3101234567).');
        window.history.back();
        </script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $finca)) {
        echo "<script>alert('El campo de nombre tiene un formato invalido no se permite numeros o simbolos porfavor verificar');
        window.history.back();
        </script>";
        return;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Formato de correo no valido porfavor validar ese campo');
        window.history.back();
        </script>";
        return;
    }

    $dominio = substr(strrchr($correo, "@"), 1);
    if (!checkdnsrr($dominio, "MX")) {
        echo "<script>
        alert('El dominio del correo no existe o no puede recibir correos. Intente con otro.');
        window.history.back();
    </script>";
        return;
    }

    if ($correo != $confirmacion_correo) {
        echo "<script>alert('Los Correos Tienen que ser iguales');
        window.history.back();
        </script>";
        return;
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $contra)) {
        echo "<script>alert('La contraseña debe tener mínimo 8 caracteres, incluir mayúscula, minúscula y número, y no contener símbolos.');
        window.history.back();
        </script>";
        return;
    }

    insertarUsuario($conexion, $nombre, $tipo_documento, $documento, $rol, $fecha_nacimiento, $fecha_registro, $telefono, $finca, $correo, $contra, $imagen);
}

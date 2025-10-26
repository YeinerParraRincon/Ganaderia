<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $nombre_animal = $_POST["nombre"];
    $numero_chip = $_POST["numero"];
    $fecha_nacimiento = $_POST["fecha"];
    $genero = $_POST["sexo"];
    $raza_animal = $_POST["raza"];
    $color = $_POST["color"];
    $imagen = $_FILES["imagen"]["name"];

    $tipos_permitidos = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/webp"];
    if (!in_array($_FILES["imagen"]["type"], $tipos_permitidos)) {
        echo "<script>alert('Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF, WEBP).');</script>";
        return;
    }

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img-archivos/" . $_FILES["imagen"]["name"]);

    if (empty($codigo) && empty($nombre_animal) && empty($numero_chip) && empty($fecha_nacimiento) && empty($genero) && empty($raza_animal) && empty($color) && empty($imagen)) {
        echo "<script>alert('No se permiten campos vacios por favor volver intentarlo')</script>";
        return;
    }

    if (!ctype_digit($codigo)) {
        echo "<script>alert('Solo se permite numeros en el campo de codigo')</script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre_animal)) {
        echo "<script>alert('El campo de nombre del animal tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }


    if (!ctype_digit($numero_chip)) {
        echo "<script>alert('Solo se permite numeros en el campo de numero chip')</script>";
        return;
    }

    $fecha_actual = date("Y-m-d");
    if ($fecha_nacimiento > $fecha_actual) {
        echo "<script>alert('La fecha de nacimiento no puede ser mayor a la fecha actual')</script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $raza_animal)) {
        echo "<script>alert('El campo de raza del animal tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }


    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $color)) {
        echo "<script>alert('El campo de raza del animal tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }

    insertarAnimal($conexion,$codigo,$nombre_animal,$numero_chip,$fecha_nacimiento,$genero,$raza_animal,$color,$imagen);
}

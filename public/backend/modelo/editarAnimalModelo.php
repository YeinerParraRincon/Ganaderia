<?php 
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_animal = $_POST["id_animal"];
    $codigo_animal = $_POST["codigo"];
    $nombre_animal = $_POST["nombre"];
    $numero_animal = $_POST["numero"];
    $fecha_nacimiento = $_POST["fecha"];
    $sexo_animal = $_POST["sexo"];
    $raza_animal = $_POST["raza"];
    $color_animal = $_POST["color"];
    $imagen_animal = $_FILES["imagen"]["name"];

    $tipos_permitidos = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/webp"];
    if (!in_array($_FILES["imagen"]["type"], $tipos_permitidos)) {
        echo "<script>alert('Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF, WEBP).');</script>";
        return;
    }

    move_uploaded_file($_FILES["imagen"]["tmp_name"],"../img-archivos/".$_FILES["imagen"]["name"]);

    if (empty($codigo_animal) && empty($nombre_animal) && empty($numero_animal) && empty($fecha_nacimiento) && empty($sexo_animal) && empty($raza_animal) && empty($color_animal) && empty($imagen_animal)) {
        echo "<script>alert('No se permiten campos vacios por favor volver intentarlo')</script>";
        return;
    }

    if (!ctype_digit($codigo_animal)) {
        echo "<script>alert('Solo se permite numeros en el campo de codigo')</script>";
        return;
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre_animal)) {
        echo "<script>alert('El campo de nombre del animal tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }


    if (!ctype_digit($numero_animal)) {
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


    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $color_animal)) {
        echo "<script>alert('El campo de raza del animal tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }

    editarUsuario($conexion,$codigo_animal,$nombre_animal,$numero_animal,$fecha_nacimiento,$sexo_animal,$raza_animal,$color_animal,$imagen_animal,$id_animal);

}

?>
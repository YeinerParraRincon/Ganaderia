<?php
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagen = $_FILES["imagen"]["name"];
    $nombre = $_POST["nombre"];
    $id_usuario = $_POST["id_usuario"];

    $tipos_permitidos = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/webp"];
    if (!in_array($_FILES["imagen"]["type"], $tipos_permitidos)) {
        echo "<script>alert('Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF, WEBP).');
        window.history.back();
        </script>";
        return;
    }

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img-archivos/" . $_FILES["imagen"]["name"]);

    if (empty($nombre)) {
        echo "<script>alert('No se permite campos vacios');
        window.history.back();
        </script>";
        return;
    }

    actualizarPerfil($conexion,$imagen,$nombre,$id_usuario);
}

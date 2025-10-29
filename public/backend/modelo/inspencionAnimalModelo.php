<?php 
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_usuario = $_POST["id_usuario"];
    $id_animal = $_POST["id_animal"];
    $estado = $_POST["estado"];
    $descripcion = $_POST["descripcion"];
    $finca = $_POST["finca"];

     if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $descripcion)) {
        echo "<script>alert('El campo de descripcion tiene un formato invalido no se permite numeros o simbolos porfavor verificar')</script>";
        return;
    }

    insertarInsepcionAnimal($conexion,$id_usuario,$id_animal,$estado,$descripcion,$finca);
}
?>
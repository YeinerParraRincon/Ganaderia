<?php 
require_once("../conexion/conexion.php");
require_once("../funciones/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_usuario = $_POST["id_usuario"];
    $id_animal = $_POST["id_animal"];
    $estado = $_POST["estado"];
    $descripcion = $_POST["descripcion"];
    $finca = $_POST["finca"];

    insertarInsepcionAnimal($conexion,$id_usuario,$id_animal,$estado,$descripcion,$finca);
}
?>
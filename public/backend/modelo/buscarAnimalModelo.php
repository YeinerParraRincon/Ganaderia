<?php 
require_once("../conexion/conexion.php");
require_once("../../view/vistaAnimalesBuscados.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $finca = $_POST["finca"];
    $codigo = $_POST["codigo"];

    if(!ctype_digit($codigo)){
        echo "<script>El campo de codigo no se pemrite letras o simbolos</script>";
        return;
    }

    buscarAnimal($conexion,$finca,$codigo);
}

?>
<?php
require_once("../backend/conexion/conexion.php");

$id_usuario = $_GET["id_usuario"];

$sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
$stmt = mysqli_prepare($conexion, $sql);
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Fue exitoso al eliminar');
    window.location.href = '/ganaderia/public/view/vistaPropietario.php'
    </script>";
} else {
    echo "<script>alert('Error al eliminar')</script>";
}

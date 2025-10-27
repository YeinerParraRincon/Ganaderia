<?php
require_once("../backend/conexion/conexion.php");

$id_animal = $_GET["id_animal"];

$sql = "DELETE FROM animal WHERE id_animal = $id_animal";
$stmt = mysqli_prepare($conexion, $sql);
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Fue exitoso al eliminar');
    window.location.href = '/ganaderia/public/view/vistaPropietario.php'
    </script>";
} else {
    echo "<script>alert('Error al eliminar')</script>";
}

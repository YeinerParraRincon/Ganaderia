<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once("../conexion/conexion.php");

use Dompdf\Dompdf;
use Dompdf\Options;


if (!isset($_POST["codigo"]) || !isset($_POST["finca"])) {
    die("Datos insuficientes para generar el PDF.");
}

$codigo = $_POST["codigo"];
$finca = $_POST["finca"];

$sql = "SELECT * FROM animal WHERE finca = '$finca' AND codigo = $codigo";
$stmt = mysqli_query($conexion, $sql);

if (!mysqli_num_rows($stmt)) {
    die("No se encontró el animal.");
}

$row = mysqli_fetch_assoc($stmt);
$imagenRuta = __DIR__ . "/../img-archivos/" . $row["imagen"]; 


if (file_exists($imagenRuta)) {
    $imagenBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($imagenRuta));
} else {
    $imagenBase64 = '';
}

$html = '
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ficha del Animal</title>
<style>
    body { font-family: Arial, sans-serif; margin: 40px; }
    h1 { text-align: center; color: #2F855A; }
    .contenedor { border: 1px solid #ccc; border-radius: 10px; padding: 20px; }
    .info { margin-top: 10px; font-size: 14px; }
    img { width: 250px; height: auto; border-radius: 10px; margin-bottom: 20px; }
</style>
</head>
<body>
    <h1>Ficha del Animal</h1>
    <div class="contenedor">
        <div style="text-align:center;">
            <img src="' . $imagenBase64 . '" alt="Imagen del animal">
        </div>
        <div class="info">
            <p><strong>Nombre:</strong> ' . htmlspecialchars($row["nombre"]) . '</p>
            <p><strong>Código:</strong> ' . htmlspecialchars($row["codigo"]) . '</p>
            <p><strong>Finca:</strong> ' . htmlspecialchars($row["finca"]) . '</p>
            <p><strong>Fecha de Nacimiento:</strong> ' . htmlspecialchars($row["fecha"]) . '</p>
            <p><strong>Número de chip:</strong> ' . htmlspecialchars($row["numero"]) . '</p>
        </div>
    </div>
</body>
</html>
';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$nombreArchivo = 'animal_' . $row["codigo"] . '.pdf';
$dompdf->stream($nombreArchivo, ["Attachment" => true]);
?>

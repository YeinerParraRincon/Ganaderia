<?php
$finca = $_GET["finca"];

require_once("../backend/conexion/conexion.php");

$sql = "SELECT * FROM animal WHERE finca = '$finca' ";
$stmt = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <h1 class="text-3xl font-bold text-center text-green-800 mb-8">🐄 Gestion de Animales de la finca <?php echo $finca ?></h1>
    <?php
    if (mysqli_num_rows($stmt)) {
        while ($row = mysqli_fetch_assoc($stmt)) {
            $imagenRuta = "/ganaderia/public/backend/img-archivos/" . $row["imagen"];

            echo '
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition-all mb-6">
                    <div class="flex flex-col md:flex-row">
                        <img src="' . $imagenRuta . '" alt="Imagen del animal" 
                            class="w-full md:w-1/3 object-cover h-64">
                        <div class="p-6 flex-1">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-2">' . htmlspecialchars($row["nombre"]) . '</h2>
                            <p class="text-gray-600 mb-2"><span class="font-medium">Código:</span> ' . htmlspecialchars($row["codigo"]) . '</p>
                            <p class="text-gray-600 mb-2"><span class="font-medium">Finca:</span> ' . htmlspecialchars($row["finca"]) . '</p>
                            <p class="text-gray-600 mb-2"><span class="font-medium">Fecha Nacimiento:</span> ' . htmlspecialchars($row["fecha"]) . '</p>
                            <p class="text-gray-600 mb-4"><span class="font-medium">Número de chip:</span> ' . htmlspecialchars($row["numero"]) . '</p>

                            
                            <form action="/ganaderia/public/backend/modelo/generarPDF.php" method="POST" target="_blank">
                                <input type="hidden" name="codigo" value="' . htmlspecialchars($row["codigo"]) . '">
                                <input type="hidden" name="finca" value="' . htmlspecialchars($row["finca"]) . '">
                                <button type="submit" 
                                    class="bg-green-700 text-white px-5 py-2 rounded-lg shadow hover:bg-green-800 transition">
                                    📄 Descargar PDF
                                </button>
                            </form>
                            <button" 
                         class="bg-gray-500 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                            <a href = "/ganaderia/public/view/editarAnimal.php?id_animal='.$row["id_animal"].'">Editar</a>
                             </button>
                             <button" 
                         class="bg-gray-500 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                            <a href = "/ganaderia/public/view/vistaPropietario.php">Eliminar</a>
                             </button>
                            <button" 
                         class="bg-gray-500 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                            <a href = "/ganaderia/public/view/vistaPropietario.php">Volver</a>
                             </button>
                        </div>
                    </div>
                </div>';
        }
    }
    ?>
</body>

</html>
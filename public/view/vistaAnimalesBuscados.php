<?php
function buscarAnimal($conexion, $finca, $codigo)
{
    $sql = "SELECT * FROM animal WHERE finca = '$finca' AND codigo = $codigo";
    $stmt = mysqli_query($conexion, $sql);
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Animal Encontrado</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    </head>

    <body class="min-h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex flex-col items-center justify-start p-8"
        style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">


        <div class="text-center text-white mb-10 mt-6">
            <img src="../backend/img/descargar-removebg-preview.png" width="120" alt="Logo Ganadería" class="mx-auto mb-3">
            <h1 class="text-3xl font-bold">🐄 Resultado de la búsqueda</h1>
            <p class="text-gray-300 mt-1">Finca: <span class="text-yellow-400 font-semibold"><?php echo htmlspecialchars($finca); ?></span></p>
        </div>

        <div class="w-full max-w-3xl bg-gray-800 bg-opacity-70 rounded-3xl shadow-2xl backdrop-blur-md p-8">
            <?php
            if (mysqli_num_rows($stmt)) {
                while ($row = mysqli_fetch_assoc($stmt)) {
                    $imagenRuta = "/ganaderia/public/backend/img-archivos/" . $row["imagen"];

                    echo '
                    <div class="bg-gray-900/70 border border-yellow-400/40 rounded-3xl shadow-xl hover:shadow-2xl transition-all overflow-hidden">
                        <img src="' . $imagenRuta . '" alt="Imagen del animal"
                            class="w-full h-72 object-cover rounded-t-3xl border-b border-yellow-400/40">

                        <div class="p-6 text-white">
                            <h2 class="text-2xl font-bold text-yellow-400 mb-2">' . htmlspecialchars($row["nombre"]) . '</h2>
                            <p class="text-gray-300"><span class="font-semibold">Código:</span> ' . htmlspecialchars($row["codigo"]) . '</p>
                            <p class="text-gray-300"><span class="font-semibold">Número:</span> ' . htmlspecialchars($row["numero"]) . '</p>
                            <p class="text-gray-300"><span class="font-semibold">Raza:</span> ' . htmlspecialchars($row["raza"]) . '</p>
                            <p class="text-gray-300"><span class="font-semibold">Sexo:</span> ' . htmlspecialchars($row["id_sexo"]) . '</p>
                            <p class="text-gray-300"><span class="font-semibold">Fecha de Nacimiento:</span> ' . htmlspecialchars($row["fecha"]) . '</p>
                            <p class="text-gray-300 mb-5"><span class="font-semibold">Características:</span> ' . htmlspecialchars($row["caracteristicas"]) . '</p>

                            <div class="flex flex-wrap gap-4">
                                <form action="/ganaderia/public/backend/modelo/generarPDF.php" method="POST" target="_blank">
                                    <input type="hidden" name="codigo" value="' . htmlspecialchars($row["codigo"]) . '">
                                    <input type="hidden" name="finca" value="' . htmlspecialchars($row["finca"]) . '">
                                    <button type="submit"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-xl font-semibold shadow-md transition">
                                        📄 Descargar PDF
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '
                <div class="text-center text-gray-200 text-lg">
                    <p class="mb-4">🚫 No se encontró ningún animal con ese código en esta finca.</p>
                    <a href="/ganaderia/public/view/registroAnimal.php?finca=' . urlencode($finca) . '" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
                        ➕ Registrar Nuevo Animal
                    </a>
                </div>';
            }
            ?>
        </div>

        <div class="mt-10">
            <a href="/ganaderia/public/view/vistaPropietario.php"
                class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
                ⬅️ Volver al Panel
            </a>
        </div>

    </body>

    </html>

<?php
}
?>
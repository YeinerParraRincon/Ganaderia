<?php 
$id_animal = $_GET["id_animal"];
$id_usuario = $_GET["id_usuario"];
$finca = $_GET["finca"];
require_once("../backend/conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspección Animal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex flex-col items-center justify-start p-8"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    
    <div class="text-center text-white mb-10 mt-6">
        <img src="../backend/img/descargar-removebg-preview.png" width="120" alt="Logo Ganadería" class="mx-auto mb-3">
        <h1 class="text-3xl font-bold">🐄 Inspección de Salud Animal</h1>
        <p class="text-gray-300 mt-1">Finca: <span class="text-yellow-400 font-semibold"><?php echo htmlspecialchars($finca); ?></span></p>
    </div>

   
    <div class="bg-gray-900/80 border border-yellow-400/40 rounded-3xl shadow-2xl p-8 w-full max-w-lg text-white">
        <h2 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Registrar Estado de Salud</h2>

        <form action="../backend/modelo/inspencionAnimalModelo.php" method="POST" class="space-y-6">
            <input type="hidden" name="id_usuario" value="<?php echo htmlentities($id_usuario) ?>">
            <input type="hidden" name="id_animal" value="<?php echo htmlentities($id_animal) ?>">
            <input type="hidden" name="finca" value="<?php echo htmlentities($finca) ?>">

            
            <div>
                <label for="estado" class="block mb-2 text-sm font-semibold text-gray-300">Estado del Animal</label>
                <select name="estado" id="estado" required
                    class="w-full p-3 rounded-xl bg-gray-800 text-white border border-yellow-400/40 focus:ring-2 focus:ring-yellow-400 outline-none">
                    <option value="">Seleccione un estado...</option>
                    <?php 
                    $sql = "SELECT * FROM estado";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($stmt)) {
                        echo "<option value='".$row["id_estado"]."'>".$row["estado"]."</option>";
                    }
                    ?>
                </select>
            </div>

            
            <div>
                <label for="descripcion" class="block mb-2 text-sm font-semibold text-gray-300">Descripción de la Enfermedad</label>
                <textarea name="descripcion" id="descripcion" placeholder="Escriba una breve descripción..."
                    class="w-full p-3 rounded-xl bg-gray-800 text-white border border-yellow-400/40 focus:ring-2 focus:ring-yellow-400 outline-none resize-none"
                    rows="4" required></textarea>
            </div>

            
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center mt-6">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition">
                    ✅ Registrar Salud
                </button>

                <a href="/ganaderia/public/view/gestionSalud.php?finca=<?php echo urlencode($finca); ?>&id_usuario=<?php echo urlencode($id_usuario); ?>"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition">
                    ⬅️ Volver
                </a>
            </div>
        </form>
    </div>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION["rol"]) || !isset($_SESSION["id_usuario"])) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}

if ($_SESSION["rol"] != 4) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}

if ($_SESSION["id_usuario"] != $_GET["id_usuario"]) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
require_once("../backend/conexion/conexion.php");

$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$stmt = mysqli_query($conexion, $sql);
$Resultado = mysqli_fetch_assoc($stmt);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen relative"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80'); background-size:cover; background-position:center;">

    <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>

    <div class="relative bg-white/90 shadow-2xl rounded-3xl p-8 w-full max-w-lg transition-transform duration-300 hover:scale-[1.02] border border-gray-200">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-6 tracking-tight">Editar Perfil</h1>

        <div class="flex flex-col items-center mb-6">
            <div class="relative group">
                <img id="preview"
                    src="<?php echo !empty($Resultado['imagen']) ? '/ganaderia/public/backend/img-archivos/' . $Resultado['imagen'] : 'https://via.placeholder.com/150'; ?>"
                    alt="Foto de perfil"
                    class="w-32 h-32 rounded-full object-cover border-4 border-teal-500 shadow-lg transition-transform duration-300 group-hover:scale-105">
                <label for="imagen"
                    class="absolute bottom-1 right-1 bg-teal-600 text-white p-2 rounded-full cursor-pointer shadow-md transition hover:bg-teal-700 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536M9 13l3-3m0 0l6-6M12 10V3m0 7v7m-9 4h18" />
                    </svg>
                </label>
            </div>
        </div>

        <form action="../backend/modelo/edicionPerfilVeterinario.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <input type="hidden" name="id_usuario" value="<?php echo htmlentities($id_usuario) ?>">

            <input type="file" id="imagen" name="imagen" class="hidden" accept="image/*" onchange="previewImage(event)">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nombre de Usuario</label>
                <input type="text" name="nombre"
                    value="<?php echo htmlspecialchars($Resultado['nombre']); ?>"
                    required
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition">
            </div>

            <div class="flex justify-between mt-8">
                <button type="button" onclick="window.history.back()"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-5 py-2 rounded-lg shadow-sm transition transform hover:scale-105">
                    ← Volver
                </button>

                <button type="submit"
                    class="bg-teal-600 hover:bg-teal-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition transform hover:scale-105">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    preview.src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
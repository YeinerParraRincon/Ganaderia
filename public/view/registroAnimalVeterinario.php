<?php
session_start();
if (!isset($_SESSION["rol"]) || !isset($_SESSION["id_usuario"])) {
    header("location:/ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 4) {
    header("location:/ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["id_usuario"] != $_GET["id_usuario"]) {
    header("location:/ganaderia/public/view/login.php");
    exit();
}
$finca = $_GET["finca"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Animal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex items-center justify-center"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    <div class="bg-gray-800 bg-opacity-70 px-10 py-10 rounded-3xl shadow-2xl backdrop-blur-md w-full max-w-2xl mx-4">
        <div class="flex flex-col items-center text-white mb-8">
            <img src="../backend/img/descargar-removebg-preview.png" width="130" alt="Logo Ganadería" />
            <h1 class="text-3xl font-bold mt-3">Registro Animal 🐄</h1>
            <p class="text-gray-300 mt-1">Ingrese los datos del nuevo animal en la finca</p>
        </div>

        <form action="../backend/modelo/registroAnimalVeterinarioModelo.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <input type="hidden" name="finca" value="<?php echo htmlentities($finca) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-200 mb-1">Código</label>
                    <input type="text" name="codigo"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Código del animal" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Nombre del Animal</label>
                    <input type="text" name="nombre"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Nombre" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Número de Animal</label>
                    <input type="text" name="numero"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Número" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Fecha de Nacimiento</label>
                    <input type="date" name="fecha"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-300" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Sexo</label>
                    <select name="sexo"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-300">
                        <?php
                        require_once("../backend/conexion/conexion.php");
                        $sql = "SELECT * FROM sexo";
                        $stmt = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_assoc($stmt)) {
                            echo "<option value='" . $row["id_sexo"] . "'>" . $row["genero"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Raza del Animal</label>
                    <input type="text" name="raza"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Raza" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Características</label>
                    <input type="text" name="color"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Color / características" />
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Imagen</label>
                    <input type="file" name="imagen"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 cursor-pointer" />
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit"
                    class="rounded-3xl bg-yellow-500 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-yellow-600 transition-colors duration-300">
                    🐮 Insertar Animal
                </button>
            </div>
            
                <a href="/ganaderia/public/view/vistaVeterinario.php"
                    class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">
                    ← Volver al inicio
                </a>
        </form>
    </div>

</body>

</html>
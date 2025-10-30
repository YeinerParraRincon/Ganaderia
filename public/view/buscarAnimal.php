<?php
session_start();

if (!isset($_SESSION["rol"]) || !isset($_SESSION["id_usuario"])) {
    header("location:/ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 2) {
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
    <title>Buscar Animal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex items-center justify-center"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    <div class="bg-gray-800 bg-opacity-70 px-10 py-10 rounded-3xl shadow-2xl backdrop-blur-md w-full max-w-md mx-4">
        <div class="flex flex-col items-center text-white mb-8">
            <img src="../backend/img/descargar-removebg-preview.png" width="130" alt="Logo Ganadería" />
            <h1 class="text-3xl font-bold mt-3">Buscar Animal 🐄</h1>
            <p class="text-gray-300 mt-1">Ingrese el código del animal para buscarlo</p>
        </div>

        <form action="../backend/modelo/buscarAnimalModelo.php" method="post" class="space-y-6">
            <input type="hidden" value="<?php echo htmlentities($finca) ?>" name="finca">

            <div>
                <label class="block text-gray-200 mb-1 text-lg font-medium">Código del Animal</label>
                <input type="text" name="codigo" required
                    class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                    placeholder="Ingrese el código aquí" />
            </div>

            <div class="mt-6 flex flex-col gap-3">
                <button type="submit"
                    class="rounded-3xl bg-yellow-500 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-yellow-600 transition-colors duration-300">
                    🔍 Buscar Animal
                </button>

                <a href="/ganaderia/public/view/vistaPropietario.php"
                    class="text-center rounded-3xl bg-gray-700 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-gray-800 transition-colors duration-300">
                    ⬅️ Volver al Panel
                </a>
            </div>
        </form>
    </div>

</body>

</html>
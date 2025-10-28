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
        <h1 class="text-3xl font-bold">🐄 Analizar Cambios</h1>
    </div>

    
    <div class="bg-gray-900/80 border border-yellow-400/40 rounded-3xl shadow-2xl p-8 w-full max-w-lg text-white">
        <h2 class="text-2xl font-bold text-yellow-400 mb-6 text-center">Registrar Estado de Salud</h2>

        <form action="../view/vistaCambios.php" method="POST" class="space-y-6">

            
            <div>
                <label for="descripcion" class="block mb-2 text-sm font-semibold text-gray-300">Nombre de la finca</label>
                <textarea name="finca" id="descripcion" placeholder="Escriba el nombre de la finca..."
                    class="w-full p-3 rounded-xl bg-gray-800 text-white border border-yellow-400/40 focus:ring-2 focus:ring-yellow-400 outline-none resize-none"
                    rows="4" required></textarea>
            </div>


            
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center mt-6">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition">
                    ✅ Buscar Cambios 
                </button>

                <a href="/ganaderia/public/view/vistaAdministrador.php"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition">
                    ⬅️ Volver
                </a>
            </div>
        </form>
    </div>

</body>
</html>
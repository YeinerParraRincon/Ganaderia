<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 2) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganadero</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-green-50 flex flex-col items-center min-h-screen">

    <div class="flex items-center justify-between bg-slate-800 text-white rounded-3xl shadow-lg p-6 w-full max-w-6xl mx-auto mt-8">
    <div class="flex items-center space-x-5">
        <img 
            src="/ganaderia/public/backend/img-archivos/<?php echo $_SESSION['imagen'] ?>" 
            alt="Foto de perfil"
            class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md">

        <div>
            <h2 class="text-2xl font-bold tracking-wide"><?php echo $_SESSION['nombre'] ?></h2>
            <p class="text-sm text-gray-300 font-medium">Propietario</p>
        </div>
    </div>

    <button
        class="p-3 rounded-full bg-slate-700 hover:bg-slate-600 transition-all duration-200 shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>
    <header class="text-center mt-6">
        <h1 class="text-4xl font-extrabold text-green-800">🐄 Ganadero</h1>
        <h2 class="text-xl text-green-700 mt-2">Bienvenido a la Finca <span class="font-semibold"><?php echo $_SESSION["finca"] ?></span></h2>
    </header>

    <div id="default-carousel" class="relative w-full max-w-4xl mt-10 rounded-2xl overflow-hidden shadow-lg" data-carousel="slide">
        <div class="relative h-72 md:h-[28rem]">
            <div class="duration-700 ease-in-out" data-carousel-item="active">
                <img src="../backend/img/vaca.png" class="absolute block w-full h-full object-cover" alt="Vaca 1">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../backend/img/vaca-1.png" class="absolute block w-full h-full object-cover" alt="Vaca 2">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../backend/img/vaca-2.png" class="absolute block w-full h-full object-cover" alt="Vaca 3">
            </div>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3">
            <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-white/70 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-white/70 hover:bg-white" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>

        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/40 group-hover:bg-black/60">
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/40 group-hover:bg-black/60">
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
            </span>
        </button>
    </div>

    <div class="mt-8 flex space-x-6">
        <a href="../view/registroAnimal.php" class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md transition">Registro Animal</a>
        <a href="../backend/modelo/logout.php" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg shadow-md transition">Cerrar Sesión</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
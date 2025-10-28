<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 1) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-900 bg-cover bg-no-repeat"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="bg-gray-800 bg-opacity-60 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-5xl">

            <div class="flex items-center justify-between mb-6 text-white">
                <div class="flex items-center space-x-5">
                    <img src="/ganaderia/public/backend/img-archivos/<?php echo $_SESSION['imagen'] ?>"
                        alt="Foto de perfil"
                        class="w-20 h-20 rounded-full object-cover border-2 border-yellow-400 shadow-md">
                    <div>
                        <h2 class="text-2xl font-bold tracking-wide"><?php echo $_SESSION['nombre'] ?></h2>
                        <p class="text-sm text-gray-300 font-medium">Administrador</p>
                    </div>
                </div>

                <button id="menuButton"
                    class="p-3 rounded-full bg-yellow-500 bg-opacity-40 hover:bg-yellow-600 transition-all duration-200 shadow-md focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div id="dropdownMenu"
                    class="hidden absolute top-24 right-10 bg-gray-900 bg-opacity-80 text-white rounded-xl shadow-lg w-56 border border-yellow-500 z-50">
                    <ul class="flex flex-col text-left">
                        <li>
                            <a href="/ganaderia/public/view/registro.php"
                                class="block px-5 py-3 hover:bg-yellow-600 transition rounded-t-xl">
                                🧑 Registro Usuario
                            </a>
                        </li>
                        <li>
                            <a href="/ganaderia/public/view/gestionUsuario.php"
                                class="block px-5 py-3 hover:bg-yellow-600 transition">
                                🖊️ Gestionar Usuario
                            </a>
                        </li>
                        <li>
                            <a href="/ganaderia/public/view/gestionarCambios.php"
                                class="block px-5 py-3 hover:bg-yellow-600 transition">
                                🖊️ Gestionar Cambios
                            </a>
                        </li>
                        <li>
                            <a href="../backend/modelo/logout.php"
                                class="block px-5 py-3 hover:bg-red-600 transition rounded-b-xl">
                                🚪 Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <header class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-yellow-400 drop-shadow-lg">🐄 Panel Ganadero</h1>
            </header>

            <div id="default-carousel"
                class="relative w-full rounded-2xl overflow-hidden shadow-lg border border-yellow-500"
                data-carousel="slide">

                <div class="relative h-72 md:h-[28rem]">
                    <div class="duration-700 ease-in-out" data-carousel-item="active">
                        <img src="../backend/img/vaca.png"
                            class="absolute block w-full h-full object-cover" alt="Vaca 1">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="../backend/img/vaca-1.png"
                            class="absolute block w-full h-full object-cover" alt="Vaca 2">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="../backend/img/vaca-2.png"
                            class="absolute block w-full h-full object-cover" alt="Vaca 3">
                    </div>
                </div>

                <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3">
                    <button type="button" class="w-3 h-3 rounded-full bg-yellow-400" aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/60 hover:bg-yellow-400"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/60 hover:bg-yellow-400"
                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const menuButton = document.getElementById('menuButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        menuButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', (e) => {
            if (!menuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
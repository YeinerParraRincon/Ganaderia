<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
         <a href="/ganaderia/public/view/login.php" 
           class="absolute top-6 left-6 flex items-center space-x-2 rounded-full bg-yellow-400 bg-opacity-60 px-4 py-2 text-white shadow-md backdrop-blur-sm transition duration-300 hover:bg-yellow-500 hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Volver</span>
        </a>
        <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
            <div class="text-white">
                <div class="mb-8 flex flex-col items-center">
                    <img src="../backend/img/descargar-removebg-preview.png" width="150" alt="" srcset="" />
                    <h1 class="mb-2 text-2xl">Ganaderia</h1>
                    <span class="text-gray-300">Enter Correo details</span>
                </div>
                <form action="../backend/modelo/validarExistenciaCorreo.php" method="post">
                    <div class="mb-4 text-lg">
                        <input class="rounded-3xl border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="email" name="correo" placeholder="id@email.com" />
                    </div>
                    <div class="mt-8 flex justify-center text-lg text-black">
                        <button type="submit" class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600">Recuperar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();

if(!isset($_SESSION["rol"])){
    header("location: /ganaderia/public/view/login.php");
    exit();
}

if($_SESSION["rol"] != 1){
    header("location: /ganaderia/public/view/login.php");
    exit();
}
?>
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
    <div class="vista">
        <div class="titulo">
              <div class="flex items-center justify-between bg-slate-800 text-white rounded-3xl shadow-lg p-6 w-full max-w-6xl mx-auto mt-8">
    <div class="flex items-center space-x-5">
        <img 
            src="/ganaderia/public/backend/img-archivos/<?php echo $_SESSION['imagen'] ?>" 
            alt="Foto de perfil"
            class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md">

        <div>
            <h2 class="text-2xl font-bold tracking-wide"><?php echo $_SESSION['nombre'] ?></h2>
            <p class="text-sm text-gray-300 font-medium">Adminsitrador</p>
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
        <button>
            <a href="/ganaderia/public/view/registro.php">Registro</a>
        </button>
        <button>
            <a href="/ganaderia/public/view/gestionUsuario.php">Gestion de Usuarios</a>
        </button>
        </div>
    </div>
    <button>
        <a href="../backend/modelo/logout.php">Cerrar Sesion</a>
    </button>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
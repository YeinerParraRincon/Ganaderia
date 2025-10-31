<?php
require_once("../ganaderia/public/backend/conexion/conexion.php");

$sql_animales_registrados = "SELECT COUNT(*) as total_animales FROM animal";
$stmt_animales_registrados = mysqli_query($conexion, $sql_animales_registrados);
$row_animales = mysqli_fetch_assoc($stmt_animales_registrados);
$total_animales = $row_animales['total_animales'];

$sql_usuarios_registrados = "SELECT COUNT(*) as total_usuarios FROM usuario";
$stmt_usuarios_registrados = mysqli_query($conexion, $sql_usuarios_registrados);
$row_usuarios = mysqli_fetch_assoc($stmt_usuarios_registrados);
$total_usuarios = $row_usuarios['total_usuarios'];

$sql_animales_monitoriados = "SELECT COUNT(*) as total_monitoriados FROM salud_usuario";
$stmt_animales_monitoriados = mysqli_query($conexion, $sql_animales_monitoriados);
$row_monitoriados = mysqli_fetch_assoc($stmt_animales_monitoriados);
$total_monitoriados = $row_monitoriados['total_monitoriados'];


$max = max($total_animales, $total_usuarios, $total_monitoriados, 1);
$porcentaje_usuarios = ($total_usuarios / $max) * 100;
$porcentaje_animales = ($total_animales / $max) * 100;
$porcentaje_monitoriados = ($total_monitoriados / $max) * 100;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundo Ganadería - Gestión Inteligente</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes float {

      0%,
      100% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes shimmer {
      0% {
        background-position: -1000px 0;
      }

      100% {
        background-position: 1000px 0;
      }
    }

    .animate-float {
      animation: float 3s ease-in-out infinite;
    }

    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }

    .shimmer {
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      background-size: 1000px 100%;
      animation: shimmer 2s infinite;
    }

    .gradient-text {
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .glass-effect {
      background: rgba(31, 41, 55, 0.7);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(251, 191, 36, 0.2);
    }

    .hero-overlay {
      background: linear-gradient(135deg, rgba(17, 24, 39, 0.95) 0%, rgba(31, 41, 55, 0.85) 100%);
    }
  </style>
</head>

<body class="bg-gray-900 text-white">
  <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-cover bg-center"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">
    <div class="absolute inset-0 hero-overlay"></div>

    <div class="absolute top-20 left-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20 blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-20 w-32 h-32 bg-green-400 rounded-full opacity-20 blur-3xl animate-float" style="animation-delay: 1s;"></div>
    <div class="absolute top-40 right-40 w-24 h-24 bg-blue-400 rounded-full opacity-20 blur-3xl animate-float" style="animation-delay: 2s;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 animate-fadeInUp">
      <div class="glass-effect rounded-3xl px-12 py-16 shadow-2xl max-sm:px-6 max-sm:py-10">
        <div class="text-center">
          <h1 class="mb-4 text-5xl md:text-6xl font-black gradient-text tracking-tight">
            🐮 Mundo Ganadería
          </h1>
          <p class="text-xl md:text-2xl text-yellow-300 font-light tracking-wide">
            El futuro de la gestión ganadera inteligente
          </p>

          <p class="text-gray-200 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
            Revoluciona la administración de tu finca con tecnología de punta. Control total de animales, salud, y personal en una plataforma moderna y fácil de usar.
          </p>


          <a href="../ganaderia/public/view/login.php"
            class="mt-6 inline-block rounded-full bg-yellow-400 text-gray-900 font-bold px-10 py-4 text-lg shadow-xl transition-all duration-300 hover:bg-yellow-300 hover:scale-110">
            Iniciar Sesión
          </a>


        </div>
      </div>
    </div>

    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-yellow-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
      </svg>
    </div>
  </div>

  <section id="estadisticas" class="bg-gray-900 py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-4xl font-black gradient-text mb-10">Estadísticas en Tiempo Real</h2>

      <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl">
        <div class="mb-6">
          <div class="flex justify-between mb-2 text-sm text-gray-300">
            <span>🧍 Usuarios Registrados (<?php echo $total_usuarios; ?>)</span>
            <span><?php echo round($porcentaje_usuarios); ?>%</span>
          </div>
          <div class="w-full bg-gray-700 rounded-full h-3">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-3 rounded-full" style="width: <?php echo $porcentaje_usuarios; ?>%"></div>
          </div>
        </div>

        <div class="mb-6">
          <div class="flex justify-between mb-2 text-sm text-gray-300">
            <span>🐄 Animales Registrados (<?php echo $total_animales; ?>)</span>
            <span><?php echo round($porcentaje_animales); ?>%</span>
          </div>
          <div class="w-full bg-gray-700 rounded-full h-3">
            <div class="bg-gradient-to-r from-green-400 to-green-500 h-3 rounded-full" style="width: <?php echo $porcentaje_animales; ?>%"></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between mb-2 text-sm text-gray-300">
            <span>❤️ Animales Monitoreados (<?php echo $total_monitoriados; ?>)</span>
            <span><?php echo round($porcentaje_monitoriados); ?>%</span>
          </div>
          <div class="w-full bg-gray-700 rounded-full h-3">
            <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-3 rounded-full" style="width: <?php echo $porcentaje_monitoriados; ?>%"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-gray-950 py-8 text-center text-gray-500">
    <p>&copy; 2025 Mundo Ganadería. Todos los derechos reservados.</p>
    <p class="text-sm mt-2">Desarrollado con 💛 para el sector ganadero</p>
  </footer>
</body>

</html>
<?php 
require_once("../ganaderia/public/backend/conexion/conexion.php");

$sql_animales_registrados = "SELECT COUNT(*) as id_animal FROM animal";
$stmt_animales_registrados = mysqli_query($conexion,$sql_animales_registrados);
$sql_usuarios_registrados = "SELECT * FROM usuario";
$stmt_usuarios_registrados = mysqli_query($conexion,$sql_usuarios_registrados);
$sql_animales_monitoriados = "SELECT * FROM salud_usuario";
$stmt_animales_monitoriados = mysqli_query($conexion,$sql_animales_monitoriados);
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
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
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
      0% { background-position: -1000px 0; }
      100% { background-position: 1000px 0; }
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
          <div class="mb-10 flex flex-col items-center">
            <div class="relative mb-6">
              <div class="absolute -inset-4 bg-yellow-400 rounded-full opacity-20 blur-2xl"></div>
            </div>
            <h1 class="mb-4 text-5xl md:text-6xl font-black gradient-text tracking-tight">
              🐮 Mundo Ganadería
            </h1>
            <p class="text-xl md:text-2xl text-yellow-300 font-light tracking-wide">
              El futuro de la gestión ganadera inteligente
            </p>
          </div>
          
          <p class="text-gray-200 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
            Revoluciona la administración de tu finca con tecnología de punta. Control total de animales, alimentación, salud, potreros y personal en una plataforma moderna y fácil de usar.
          </p>
          
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10 max-w-3xl mx-auto">
            <div class="bg-gray-800 bg-opacity-50 rounded-xl p-4 border border-yellow-400 border-opacity-30 hover:border-opacity-100 transition-all hover:scale-105">
              <div class="text-3xl mb-2">📊</div>
              <p class="text-sm font-semibold text-yellow-300">Análisis en Tiempo Real</p>
            </div>
            <div class="bg-gray-800 bg-opacity-50 rounded-xl p-4 border border-green-400 border-opacity-30 hover:border-opacity-100 transition-all hover:scale-105">
              <div class="text-3xl mb-2">🏥</div>
              <p class="text-sm font-semibold text-green-300">Control Sanitario</p>
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
            <a href="/public/view/login.php"
              class="group relative rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 px-10 py-4 text-lg font-bold text-gray-900 shadow-2xl transition-all duration-300 hover:scale-110 hover:shadow-yellow-500/50 overflow-hidden">
              <span class="relative z-10 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                Iniciar Sesión
              </span>
              <div class="absolute inset-0 shimmer"></div>
            </a>
            <a href="#info"
              class="rounded-full border-2 border-yellow-400 px-10 py-4 text-lg font-bold text-yellow-400 shadow-xl backdrop-blur-md transition-all duration-300 hover:bg-yellow-400 hover:text-gray-900 hover:scale-110 hover:shadow-yellow-400/50">
              Conoce Más
            </a>
          </div>
          
          <div class="flex flex-wrap justify-center gap-8 text-center">
            <div>
              <p class="text-3xl font-bold text-yellow-400">500+</p>
              <p class="text-sm text-gray-400">Fincas Registradas</p>
            </div>
            <?php if(mysqli_num_rows($stmt_animales_registrados) > 0){ 
              while($rowAnimal = mysqli_fetch_assoc($stmt_animales_registrados)){
              ?>
            <div>
              <p class="text-3xl font-bold text-green-400"><?php echo $rowAnimal["id_animal"] ?></p>
              <p class="text-sm text-gray-400">Animales Monitoreados</p>
            </div>
            <?php }?>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-yellow-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
      </svg>
    </div>
  </div>
  
  <section id="info" class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-5xl font-black gradient-text mb-4">Todo lo que tu finca necesita</h2>
        <p class="text-xl text-gray-400 max-w-2xl mx-auto">Herramientas profesionales para una gestión ganadera moderna y eficiente</p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="group glass-effect rounded-2xl p-8 shadow-2xl hover:shadow-yellow-500/20 transform transition-all duration-300 hover:-translate-y-2 hover:scale-105">
          <div class="bg-yellow-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-yellow-300 mb-4">Control del Ganado</h3>
          <p class="text-gray-300 mb-6 leading-relaxed">Registra cada animal con precisión: raza, peso, edad, genealogía, estado de salud, vacunas, tratamientos y producción lechera o cárnica.</p>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Historial médico completo
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Control de reproducción
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Alertas de vacunación
            </li>
          </ul>
        </div>
        
        <div class="group glass-effect rounded-2xl p-8 shadow-2xl hover:shadow-green-500/20 transform transition-all duration-300 hover:-translate-y-2 hover:scale-105">
          <div class="bg-green-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-green-300 mb-4">Gestión de la Finca</h3>
          <p class="text-gray-300 mb-6 leading-relaxed">Administra potreros, rotaciones de pastoreo, alimentación, inventario de recursos, personal, equipos y mantenimiento de infraestructura.</p>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Mapeo de potreros
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Control de alimentación
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Gestión de personal
            </li>
          </ul>
        </div>
        
        <div class="group glass-effect rounded-2xl p-8 shadow-2xl hover:shadow-blue-500/20 transform transition-all duration-300 hover:-translate-y-2 hover:scale-105">
          <div class="bg-blue-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-900">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-blue-300 mb-4">Reportes y Análisis</h3>
          <p class="text-gray-300 mb-6 leading-relaxed">Genera reportes detallados de producción, gastos, salud animal, rentabilidad y tendencias. Visualiza el progreso con gráficos interactivos.</p>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Dashboards en tiempo real
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Exportación de datos
            </li>
            <li class="flex items-center gap-2">
              <span class="text-green-400">✓</span> Análisis predictivo
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <section class="bg-gray-900 py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-4xl font-black gradient-text mb-6">¿Por qué elegir Mundo Ganadería?</h2>
          <div class="space-y-6">
            <div class="flex gap-4">
              <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-xl bg-yellow-500 bg-opacity-20 flex items-center justify-center">
                  <span class="text-2xl">🚀</span>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white mb-2">Fácil de usar</h3>
                <p class="text-gray-400">Interfaz intuitiva diseñada pensando en ganaderos, sin complicaciones técnicas.</p>
              </div>
            </div>
            
            <div class="flex gap-4">
              <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-xl bg-green-500 bg-opacity-20 flex items-center justify-center">
                  <span class="text-2xl">💰</span>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white mb-2">Ahorra tiempo y dinero</h3>
                <p class="text-gray-400">Automatiza tareas repetitivas y optimiza recursos para mejorar la rentabilidad.</p>
              </div>
            </div>
            
            <div class="flex gap-4">
              <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-xl bg-blue-500 bg-opacity-20 flex items-center justify-center">
                  <span class="text-2xl">🔒</span>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white mb-2">Seguro y confiable</h3>
                <p class="text-gray-400">Tus datos protegidos con encriptación de nivel bancario y copias de seguridad automáticas.</p>
              </div>
            </div>
            
            <div class="flex gap-4">
              <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-xl bg-purple-500 bg-opacity-20 flex items-center justify-center">
                  <span class="text-2xl">📈</span>
                </div>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white mb-2">Decisiones basadas en datos</h3>
                <p class="text-gray-400">Análisis profundos que te ayudan a tomar mejores decisiones para tu finca.</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="relative">
          <div class="glass-effect rounded-3xl p-8 shadow-2xl">
            <div class="bg-gray-900 rounded-2xl p-6 mb-4">
              <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-bold text-yellow-400">Producción Mensual</h4>
                <span class="text-green-400 text-sm font-semibold">+24%</span>
              </div>
              <div class="space-y-3">
                <div>
                  <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-400">Leche</span>
                    <span class="text-white">15,420 L</span>
                  </div>
                  <div class="w-full bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-2 rounded-full" style="width: 85%"></div>
                  </div>
                </div>
                <div>
                  <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-400">Carne</span>
                    <span class="text-white">3,200 kg</span>
                  </div>
                  <div class="w-full bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full" style="width: 65%"></div>
                  </div>
                </div>
                <div>
                  <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-400">Crías</span>
                    <span class="text-white">28 unidades</span>
                  </div>
                  <div class="w-full bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full" style="width: 75%"></div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="grid grid-cols-3 gap-4">
              <div class="bg-gray-900 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-yellow-400">247</p>
                <p class="text-xs text-gray-400">Animales</p>
              </div>
              <div class="bg-gray-900 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-400">12</p>
                <p class="text-xs text-gray-400">Potreros</p>
              </div>
              <div class="bg-gray-900 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-blue-400">8</p>
                <p class="text-xs text-gray-400">Personal</p>
              </div>
            </div>
          </div>
          
          <div class="absolute -top-6 -right-6 w-24 h-24 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
          <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-green-400 rounded-full opacity-20 blur-3xl"></div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-500 py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
        Comienza a transformar tu finca hoy
      </h2>
      <p class="text-xl text-gray-800 mb-8">
        Únete a cientos de ganaderos que ya están mejorando su productividad
      </p>
      <a href="/ganaderia/public/view/login.php"
        class="inline-block rounded-full bg-gray-900 px-12 py-5 text-xl font-bold text-yellow-400 shadow-2xl transition-all duration-300 hover:scale-110 hover:shadow-gray-900/50">
        Empezar Ahora
      </a>
    </div>
  </section>
  
  <footer class="bg-gray-950 py-8 text-center text-gray-500">
    <p>&copy; 2025 Mundo Ganadería. Todos los derechos reservados.</p>
    <p class="text-sm mt-2">Desarrollado con 💛 para el sector ganadero</p>
  </footer>
</body>
</html>
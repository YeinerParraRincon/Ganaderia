<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema Ganadero</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex items-center justify-center"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    <div class="bg-gray-800 bg-opacity-80 px-10 py-10 rounded-3xl shadow-2xl backdrop-blur-md w-full max-w-2xl mx-4">
        <div class="flex flex-col items-center text-white mb-8">
            <img src="../backend/img/descargar-removebg-preview.png" width="130" alt="Logo Ganadero" />
            <h1 class="text-3xl font-bold mt-3 text-yellow-400">🐄 Registro de Usuario Ganadero</h1>
            <p class="text-gray-300 mt-1">Conecta tu finca con el campo digital</p>
        </div>

        <form action="../backend/modelo/registroModelo.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-gray-200 mb-1">Nombre de Usuario</label>
                    <input type="text" name="nombre" placeholder="Nombre completo"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Tipo de Documento</label>
                    <select name="tipo_documento"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                        <option value="0">Seleccionar...</option>
                        <?php
                        require_once("../backend/conexion/conexion.php");
                        $sql = "SELECT * FROM tipo_documento";
                        $stmt = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($stmt)) {
                            echo "<option value='" . $row["id_tipo_documento"] . "'>" . $row["tipo"] . "</option>";
                        }
                        ?>
                    </select>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Número de Documento</label>
                    <input type="number" name="documento" placeholder="Ej: 1234567890"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Rol del Usuario</label>
                    <select name="rol"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                        <option value="0">Seleccionar rol</option>
                        <?php
                        require_once("../backend/conexion/conexion.php");
                        $sql = "SELECT * FROM rol";
                        $stmt = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($stmt)) {
                            echo "<option value='" . $row["id_rol"] . "'>" . $row["rol"] . "</option>";
                        }
                        ?>
                    </select>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Fecha de Nacimiento</label>
                    <input type="date" name="fecha"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Teléfono</label>
                    <input type="number" name="telefono" placeholder="Número de teléfono"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Nombre de la Finca</label>
                    <input type="text" name="finca" placeholder="Ej: La Esperanza"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Correo Electrónico</label>
                    <input type="email" name="correo" placeholder="usuario@correo.com"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Confirmar Correo</label>
                    <input type="email" name="correo2" placeholder="Repite tu correo"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Contraseña</label>
                    <input type="password" name="contra" placeholder="********"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-400"
                        required>
                </div>


                <div>
                    <label class="block text-gray-200 mb-1">Imagen de Perfil</label>
                    <input type="file" name="imagen"
                        class="w-full rounded-2xl border-none bg-yellow-400/40 px-5 py-2 text-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 cursor-pointer"
                        required>
                </div>
            </div>

            <div class="mt-8 flex flex-col items-center gap-4">
                <button type="submit"
                    class="rounded-3xl bg-yellow-500 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-yellow-600 transition-colors duration-300">
                    🐮 Registrarme
                </button>

                <a href="/ganaderia/public/view/vistaAdministrador.php"
                    class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">
                    ← Volver al inicio
                </a>
            </div>
        </form>
    </div>

</body>

</html>
<?php
session_start();

if (!isset($_SESSION["rol"]) || !isset($_SESSION["id_usuario"])) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 1) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

require_once("../backend/conexion/conexion.php");

$id_usuario = $_GET["id_usuario"];
$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$stmt = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($stmt);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✏️ Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex flex-col items-center justify-start p-8"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    
    <div class="text-center text-white mb-10 mt-6">
        <img src="../backend/img/descargar-removebg-preview.png" width="120" alt="Logo Ganadería" class="mx-auto mb-3">
        <h1 class="text-3xl font-bold text-green-400">🐮 Editar Usuario</h1>
        <p class="text-gray-300 mt-1">Modifica los datos del usuario seleccionado</p>
    </div>

    
    <div class="w-full max-w-3xl bg-gray-800 bg-opacity-70 rounded-3xl shadow-2xl backdrop-blur-md p-8 text-white">
        <form action="../backend/modelo/updateEditarUsuario.php" method="post" class="space-y-5">
            <input type="hidden" name="id_usuario" value="<?php echo htmlentities($id_usuario) ?>">

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Nombre</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($row["nombre"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Tipo de Documento</label>
                <select name="tipo_documento"
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <?php
                    $id_tipo_documento = $row["id_tipo_documento"];
                    $sql = "SELECT * FROM tipo_documento";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($ro = mysqli_fetch_array($stmt)) {
                        $selected = ($ro["id_tipo_documento"] == $id_tipo_documento) ? "selected" : "";
                        echo "<option value='{$ro["id_tipo_documento"]}' $selected>{$ro["tipo"]}</option>";
                    }
                    ?>
                </select>
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Número de Documento</label>
                <input type="number" name="documento" value="<?php echo htmlspecialchars($row["numero_documento"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Rol</label>
                <select name="rol"
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
                    <?php
                    $id_rol = $row["id_rol"];
                    $sql = "SELECT * FROM rol";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($ro = mysqli_fetch_array($stmt)) {
                        $selected = ($ro["id_rol"] == $id_rol) ? "selected" : "";
                        echo "<option value='{$ro["id_rol"]}' $selected>{$ro["rol"]}</option>";
                    }
                    ?>
                </select>
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Fecha de Nacimiento</label>
                <input type="date" name="fecha" value="<?php echo htmlspecialchars($row["fecha_nacimiento"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Teléfono</label>
                <input type="number" name="telefono" value="<?php echo htmlspecialchars($row["telefono"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Finca</label>
                <input type="text" name="finca" value="<?php echo htmlspecialchars($row["finca"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Correo Electrónico</label>
                <input type="email" name="correo" value="<?php echo htmlspecialchars($row["correo"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div>
                <label class="block text-sm font-semibold text-green-400 mb-1">Contraseña</label>
                <input type="password" name="contra" value="<?php echo htmlspecialchars($row["contrasena"]) ?>" required
                    class="w-full p-3 rounded-xl bg-gray-900 border border-green-400/40 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            
            <div class="flex justify-between items-center mt-8">
                <a href="/ganaderia/public/view/vistaAdministrador.php"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
                    ⬅️ Volver
                </a>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg transition">
                    💾 Actualizar
                </button>
            </div>
        </form>
    </div>
</body>

</html>

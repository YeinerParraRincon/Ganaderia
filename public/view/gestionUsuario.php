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

if($_SESSION["id_usuario"] != $_GET["id_usuario"]){
    header("location:/ganaderia/public/view/login.php");
    exit();
}

require_once("../backend/conexion/conexion.php");
$sql = "SELECT * FROM usuario";
$stmt = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex flex-col items-center justify-start p-8"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

   
    <div class="text-center text-white mb-10 mt-6">
        <img src="../backend/img/descargar-removebg-preview.png" width="120" alt="Logo Ganadería" class="mx-auto mb-3">
        <h1 class="text-3xl font-bold">🐮 Gestión de Usuarios</h1>
        <p class="text-gray-300 mt-1">Panel administrativo de gestión del sistema</p>
    </div>

    <div class="w-full max-w-6xl bg-gray-800 bg-opacity-70 rounded-3xl shadow-2xl backdrop-blur-md p-8">
        <?php
        if (mysqli_num_rows($stmt) > 0) {
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">';
            while ($row = mysqli_fetch_assoc($stmt)) {
                $imagenRuta = !empty($row["imagen"])
                    ? "/ganaderia/public/backend/img-archivos/" . $row["imagen"]
                    : "https://cdn-icons-png.flaticon.com/512/9131/9131529.png";

                echo '
    <div class="bg-gray-900/70 border border-green-400/40 rounded-3xl shadow-xl hover:shadow-2xl transition-all overflow-hidden">
        <img src="' . $imagenRuta . '" alt="Foto de usuario"
            class="w-full h-56 object-cover rounded-t-3xl border-b border-green-400/40">

        <div class="p-5 text-white">
            <h2 class="text-2xl font-bold text-green-400 mb-2">' . htmlspecialchars($row["nombre"]) . '</h2>
            <p class="text-gray-300"><span class="font-semibold">Documento:</span> ' . htmlspecialchars($row["numero_documento"]) . '</p>
            <p class="text-gray-300"><span class="font-semibold">Finca:</span> ' . htmlspecialchars($row["finca"]) . '</p>
            <p class="text-gray-300"><span class="font-semibold">Correo:</span> ' . htmlspecialchars($row["correo"]) . '</p>
            <p class="text-gray-300"><span class="font-semibold">Teléfono:</span> ' . htmlspecialchars($row["telefono"]) . '</p>
            <p class="text-gray-300 mb-3"><span class="font-semibold">Fecha Nacimiento:</span> ' . htmlspecialchars($row["fecha_nacimiento"]) . '</p>
            <p class="text-yellow-300 mb-5"><span class="font-semibold">Contraseña:</span> ' . htmlspecialchars($row["contrasena"]) . '</p>

            <div class="flex flex-wrap gap-3">
                <a href="/ganaderia/public/view/editarUsuarios.php?id_usuario=' . $row["id_usuario"] . '" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl font-semibold shadow-md transition">
                    ✏️ Editar
                </a>';

                
                if ($_SESSION["id_usuario"] != $row["id_usuario"]) {
                    echo '
                <a href="/ganaderia/public/view/eliminarUsuario.php?id_usuario=' . $row["id_usuario"] . '"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl font-semibold shadow-md transition"
                    onclick="return confirm(\'¿Seguro que deseas eliminar este usuario?\')">
                    🗑️ Eliminar
                </a>';
                }

                echo '
            </div>
        </div>
    </div>';
            }

            echo '</div>';
        } else {
            echo '
            <div class="text-center text-gray-200 text-lg">
                <p class="mb-4">🚫 No hay usuarios registrados en el sistema.</p>
                <a href="/ganaderia/public/view/registroUsuario.php"
                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
                    ➕ Registrar Nuevo Usuario
                </a>
            </div>';
        }
        ?>
    </div>

    <div class="mt-10">
        <a href="/ganaderia/public/view/vistaAdministrador.php"
            class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
            ⬅️ Volver al Panel Principal
        </a>
    </div>

</body>

</html>
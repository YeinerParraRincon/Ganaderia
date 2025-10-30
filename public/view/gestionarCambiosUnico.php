<?php
session_start();

if (!isset($_SESSION["rol"]) || !isset($_SESSION["id_usuario"])) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}

if ($_SESSION["rol"] != 2) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}

if ($_SESSION["id_usuario"] != $_GET["id_usuario"]) {
    header("location: /ganaderia/public/view/login.php");
    exit;
}
$finca = $_GET["finca"];
require_once("../backend/conexion/conexion.php");

$sql = "SELECT 
            t.tipo,
            u.nombre AS nombre_usuario,
            u.telefono,
            u.correo,
            e.estado,
            s.descripcion,
            a.nombre AS nombre_animal,
            a.codigo,
            a.imagen,
            a.raza,
            su.fecha 
        FROM animal AS a 
        INNER JOIN salud AS s ON s.id_animal = a.id_animal 
        INNER JOIN estado AS e ON e.id_estado = s.id_estado 
        INNER JOIN salud_usuario AS su ON su.id_salud = s.id_salud 
        INNER JOIN usuario AS u ON u.id_usuario = su.id_usuario 
        INNER JOIN notificaciones AS nt ON nt.id_salud_usuario = su.id_salud_usuario 
        INNER JOIN notification_tipo AS t ON t.id_notification_tipo = nt.id_notification_type 
        WHERE nt.finca = '$finca'";
$stmt = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Inspecciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex flex-col items-center justify-start p-8"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">


    <div class="text-center text-white mb-10 mt-6">
        <img src="../backend/img/descargar-removebg-preview.png" width="120" alt="Logo Ganadería" class="mx-auto mb-3">
        <h1 class="text-3xl font-bold">📋 Historial de Inspecciones</h1>
        <p class="text-gray-300 mt-1">Finca:
            <span class="text-yellow-400 font-semibold"><?php echo htmlspecialchars($finca); ?></span>
        </p>
    </div>


    <div class="w-full max-w-6xl bg-gray-800 bg-opacity-70 rounded-3xl shadow-2xl backdrop-blur-md p-8">
        <?php
        if (mysqli_num_rows($stmt) > 0) {
            echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">';

            while ($row = mysqli_fetch_assoc($stmt)) {
                $imagenRuta = "/ganaderia/public/backend/img-archivos/" . $row["imagen"];
        ?>

                <div class="bg-gray-900/70 border border-yellow-400/40 rounded-3xl shadow-xl hover:shadow-2xl transition-all overflow-hidden">
                    <img src="<?php echo $imagenRuta; ?>"
                        alt="Imagen del animal"
                        class="w-full h-48 object-cover rounded-t-3xl border-b border-yellow-400/40">

                    <div class="p-5 text-white">
                        <h2 class="text-2xl font-bold text-yellow-400 mb-2">
                            <?php echo htmlspecialchars($row["nombre_animal"]); ?>
                        </h2>
                        <p class="text-gray-300"><span class="font-semibold">Código:</span> <?php echo htmlspecialchars($row["codigo"]); ?></p>
                        <p class="text-gray-300"><span class="font-semibold">Raza:</span> <?php echo htmlspecialchars($row["raza"]); ?></p>
                        <p class="text-gray-300"><span class="font-semibold">Estado:</span> <?php echo htmlspecialchars($row["estado"]); ?></p>
                        <p class="text-gray-300"><span class="font-semibold">Descripción:</span> <?php echo htmlspecialchars($row["descripcion"]); ?></p>
                        <p class="text-gray-300"><span class="font-semibold">Fecha:</span> <?php echo htmlspecialchars($row["fecha"]); ?></p>

                        <div class="border-t border-yellow-500/30 mt-4 pt-3">
                            <h3 class="text-yellow-400 font-semibold mb-1">👨‍🌾 Vetirinario</h3>
                            <p class="text-gray-300"><span class="font-semibold">Nombre:</span> <?php echo htmlspecialchars($row["nombre_usuario"]); ?></p>
                            <p class="text-gray-300"><span class="font-semibold">Teléfono:</span> <?php echo htmlspecialchars($row["telefono"]); ?></p>
                            <p class="text-gray-300"><span class="font-semibold">Correo:</span> <?php echo htmlspecialchars($row["correo"]); ?></p>
                            <p class="text-gray-300"><span class="font-semibold">Tipo Notificación:</span> <?php echo htmlspecialchars($row["tipo"]); ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }

            echo '</div>';
        } else {
            echo '
            <div class="text-center text-gray-200 text-lg">
                <p class="mb-4">🚫 No se encontraron inspecciones registradas para esta finca.</p>
                <a href="/ganaderia/public/view/vistaPropietario.php" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition">
                   ⬅️ Volver al Panel
                </a>
            </div>';
        }
        ?>
    </div>

</body>

</html>
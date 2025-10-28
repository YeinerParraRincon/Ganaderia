<?php
require_once("../backend/conexion/conexion.php");
$id_usuario = $_GET["id_animal"];

$sql = "SELECT * FROM animal WHERE id_animal = $id_usuario";
$stmt = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($stmt);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="h-screen w-full bg-gray-900 bg-cover bg-no-repeat flex items-center justify-center"
    style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1748&q=80')">

    <div class="bg-gray-800 bg-opacity-70 px-10 py-10 rounded-3xl shadow-2xl backdrop-blur-md w-full max-w-2xl mx-4">
        <div class="flex flex-col items-center text-white mb-8">
            <img src="../backend/img/descargar-removebg-preview.png" width="130" alt="Logo Ganadería" />
            <h1 class="text-3xl font-bold mt-3">Editar Animal 🐄</h1>
            <p class="text-gray-300 mt-1">Modifique los datos del animal registrado</p>
        </div>

        <form action="../backend/modelo/editarAnimalModelo.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <input type="hidden" name="id_animal" value="<?php echo htmlentities($id_usuario) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-200 mb-1">Código</label>
                    <input type="number" name="codigo" value="<?php echo $row["codigo"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Código del animal" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $row["nombre"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Nombre del animal" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Número del Animal</label>
                    <input type="text" name="numero" value="<?php echo $row["numero"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Número de identificación" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Fecha de Nacimiento</label>
                    <input type="date" name="fecha" value="<?php echo $row["fecha"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-300" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Sexo</label>
                    <select name="sexo"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white shadow-lg outline-none focus:ring-2 focus:ring-yellow-300">
                        <?php
                        $sexo_actual = $row["id_sexo"];
                        $sql = "SELECT * FROM sexo";
                        $stmt = mysqli_query($conexion, $sql);
                        while ($ro = mysqli_fetch_assoc($stmt)) {
                            $selected = ($ro["id_sexo"] == $sexo_actual) ? "selected" : "";
                            echo "<option value='" . $ro["id_sexo"] . "' $selected>" . $ro["genero"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Raza</label>
                    <input type="text" name="raza" value="<?php echo $row["raza"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Raza del animal" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Características</label>
                    <input type="text" name="color" value="<?php echo $row["caracteristicas"] ?>"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white placeholder-slate-200 shadow-lg outline-none focus:ring-2 focus:ring-yellow-300"
                        placeholder="Color / características" required>
                </div>

                <div>
                    <label class="block text-gray-200 mb-1">Imagen</label>
                    <input type="file" name="imagen"
                        class="w-full rounded-2xl border-none bg-yellow-400/50 px-5 py-2 text-white file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 cursor-pointer" />
                    <p class="text-gray-300 text-sm mt-2">Imagen actual:
                        <span class="text-yellow-400 font-semibold"><?php echo $row["imagen"] ?></span>
                    </p>
                </div>
            </div>

            <div class="mt-8 flex justify-center gap-5">
                <button type="submit"
                    class="rounded-3xl bg-yellow-500 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-yellow-600 transition-colors duration-300">
                    💾 Guardar Cambios
                </button>

                <a href="javascript:history.back()"
                    class="rounded-3xl bg-gray-600 px-10 py-3 text-lg font-semibold text-white shadow-xl hover:bg-gray-700 transition-colors duration-300">
                    ⬅ Volver
                </a>
            </div>
        </form>
    </div>

</body>
</html>

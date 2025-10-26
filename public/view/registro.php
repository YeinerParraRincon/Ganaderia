<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema Ganadero</title>
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4" rel="stylesheet">

</head>

<body>
    <div class="fondo">
        <div class="overlay"></div>

        <div class="contenedor-form">
            <h1 class="titulo">🐄 Registro de Usuario Ganadero</h1>
            <p class="subtitulo">Conecta tu finca con el campo digital</p>

            <form action="../backend/modelo/registroModelo.php" method="post" enctype="multipart/form-data">

                <input type="text" class="input" placeholder="Nombre de Usuario" name="nombre" required>

                <select name="tipo_documento" class="input">
                    <option value="0">Tipo de Documento</option>
                    <?php
                    require_once("../backend/conexion/conexion.php");
                    $sql = "SELECT * FROM tipo_documento";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($stmt)) {
                        echo "<option value='" . $row["id_tipo_documento"] . "'>" . $row["tipo"] . "</option>";
                    }
                    ?>
                </select>

                <input type="number" class="input" placeholder="Número de Documento" name="documento" required>

                <select name="rol" class="input">
                    <option value="0">Seleccionar Rol</option>
                    <?php
                    require_once("../backend/conexion/conexion.php");
                    $sql = "SELECT * FROM rol";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($stmt)) {
                        echo "<option value='" . $row["id_rol"] . "'>" . $row["rol"] . "</option>";
                    }
                    ?>
                </select>

                <input type="date" class="input" name="fecha" required>
                <input type="number" class="input" name="telefono" placeholder="Número de Teléfono" required>
                <input type="text" class="input" name="finca" placeholder="Nombre de la Finca" required>
                <input type="email" class="input" name="correo" placeholder="Correo de Usuario" required>
                <input type="email" class="input" name="correo2" placeholder="Confirmación del Correo" required>
                <input type="password" class="input" name="contra" placeholder="Contraseña de Usuario" required>
                <input type="file" name="imagen" required>
                <button type="submit" class="btn">Registrarme</button>
                <a href="/ganaderia/public/view/vistaAdministrador.php" class="volver">← Volver al inicio</a>

            </form>
        </div>
    </div>
    <script src="../js/registro.js"></script>
</body>

</html>
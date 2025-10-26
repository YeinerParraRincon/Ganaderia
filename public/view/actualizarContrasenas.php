<?php
$correo = $_GET["correo"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../backend/modelo/verificarActualizarContrasenas.php" method="post">
        <input type="hidden" name="correo" value="<?php echo htmlentities($correo)?>">
        <input type="password" name="contra" placeholder="Nueva Contraseña" required>
        <input type="password" name="contra1" placeholder="Repeticion de Contraseña" required>
        <button type="submit" class="btn">Actualizar Contraseña</button>
    </form>
</body>
</html>
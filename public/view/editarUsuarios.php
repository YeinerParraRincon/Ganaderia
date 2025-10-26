<?php 

$id_usuario = $_GET["id_usuario"];

require_once("../backend/conexion/conexion.php");

$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$stmt = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($stmt);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="vista">
        <form action="../backend/modelo/updateEditarUsuario.php" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo htmlentities($id_usuario) ?>">

            <input type="text" name="nombre" value="<?php echo $row["nombre"] ?>" required>

                <select name="tipo_documento" class="input">
                    <?php
                    require_once("../backend/conexion/conexion.php");
                    $id_tipo_documento = $row["id_tipo_documento"];
                    $sql = "SELECT * FROM tipo_documento WHERE id_tipo_documento = $id_tipo_documento";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($ro = mysqli_fetch_array($stmt)) {
                        echo "<option value='" . $ro["id_tipo_documento"] . "'>" . $ro["tipo"] . "</option>";
                    }
                    ?>
                </select>

                <input type="number" class="input" value= "<?php echo $row["numero_documento"] ?>" name="documento" required>

                <select name="rol" class="input">
                    <?php
                    require_once("../backend/conexion/conexion.php");
                    $id_rol = $row["id_rol"];
                    $sql = "SELECT * FROM  rol WHERE id_rol = $id_rol";
                    $stmt = mysqli_query($conexion, $sql);
                    while ($ro = mysqli_fetch_array($stmt)) {   
                        echo "<option value='" . $ro["id_rol"] . "'>" . $ro["rol"] . "</option>";
                    }
                    ?>
                </select>

                <input type="date" class="input" name="fecha" value="<?php echo $row["fecha_nacimiento"] ?>" required>
                <input type="number" class="input" name="telefono" value="<?php echo $row["telefono"] ?>" required>
                <input type="text" class="input" name="finca" value="<?php echo $row["finca"] ?>" required>
                <input type="email" class="input" name="correo" value="<?php echo $row["correo"] ?>" required>
                <input type="password" class="input" name="contra" value="<?php echo $row["contrasena"] ?>" required>

                <button type="submit" class="btn">Actaulizar</button>
        </form>
    </div>
</body>
</html>
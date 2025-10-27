<?php
require_once("../backend/conexion/conexion.php");
$id_usuario = $_GET["id_animal"];

$sql = "SELECT * FROM animal WHERE id_animal = $id_usuario";
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
    <form action="" method="" enctype="multipart/form-data">
        <input type="number" value="<?php echo $row["codigo"] ?>" name="codigo" required>

        <input type="text" value="<?php echo $row["nombre"] ?>" name="nombre" required>

        <input type="text" value="<?php echo $row["numero"] ?>" name="numero" required>

        <input type="date" value="<?php echo $row["fecha"] ?>" name="fecha" required>

        <select name="sexo">
            <?php
            require_once("../backend/conexion/conexion.php");
            $sexo = $row["id_sexo"];
            $sql = "SELECT * FROM sexo WHERE id_sexo = $sexo";
            $stmt = mysqli_query($conexion, $sql);

            while ($ro = mysqli_fetch_assoc($stmt)) {
                echo "<option value = '" . $ro["id_sexo"] . "'>" . $ro["genero"] . "</option>";
            }

            ?>
        </select>

        <input type="text" name="raza" value = "<?php echo $row["raza"]?>" required>

        <input type="text" name="color" value="<?php echo $row["caracteristicas"] ?>" required>

        <input type="file" name="imagen" required>

        <button type="submit">Registrar Animal</button>
    </form>
</body>

</html>
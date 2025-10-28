<?php 
$id_animal = $_GET["id_animal"];
$id_usuario = $_GET["id_usuario"];
$finca = $_GET["finca"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../backend/modelo/inspencionAnimalModelo.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo htmlentities($id_usuario) ?>">
        <input type="hidden" name="id_animal" value="<?php echo htmlentities($id_animal) ?>">
        <input type="hidden" name="finca" value="<?php echo htmlentities($finca) ?>">
        <select name="estado">
        <?php 
        require_once("../backend/conexion/conexion.php");
        $sql = "SELECT * FROM estado";
        $stmt = mysqli_query($conexion,$sql);

        while($row = mysqli_fetch_assoc($stmt)){
            echo "<option value = '".$row["id_estado"]."'>".$row["estado"]."</option>";
        }
        ?>
    </select>
    <input type="text" name="descripcion" placeholder="Descripcion de Enfermedad">

    <button type="submit">Registrar Salud Animal</button>
    </form>
</body>
</html>
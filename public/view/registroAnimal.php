<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro Animal</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="number" placeholder="Codigo o Arete" name="codigo" required>
        
        <input type="text" placeholder="Nombre de Animal" name="nombre" required>

        <input type="text" placeholder="Numero de microship o Tatuaje" name="numero" required>

        <input type="date" name="fecha" required>

        <select name="sexo">
            <?php 
            require_once("../backend/conexion/conexion.php");

            $sql = "SELECT * FROM sexo";
            $stmt = mysqli_query($conexion,$sql);

            while($row = mysqli_fetch_assoc($stmt)){
                echo "<option value = '".$row["id_sexo"]."'>".$row["genero"]."</option>";
            }
            
            ?>
        </select>

        <input type="text" name="raza" placeholder="Raza del Animal" required>

        <input type="text" name="color" placeholder="Rasgos fisicos del animal" required>

        <input type="file" name="imagen" required>

        <button type="submit">Registrar Animal</button>

    </form>
</body>
</html>
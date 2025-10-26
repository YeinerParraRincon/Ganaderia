<?php 
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
    <form action="../backend/modelo/buscarAnimalModelo.php" method="post">
        <input type="hidden" value="<?php echo htmlentities($finca) ?>" name="finca" >
        <input type="number" placeholder="Codigo del animal" name="codigo">
        <button type="submit">Buscar Animal</button>
    </form>
</body>

</html>
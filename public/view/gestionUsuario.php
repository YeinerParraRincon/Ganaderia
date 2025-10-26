<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

if ($_SESSION["rol"] != 1) {
    header("location: /ganaderia/public/view/login.php");
    exit();
}

require_once("../backend/conexion/conexion.php");

$sql = "SELECT * FROM usuario";
$stmt = mysqli_query($conexion, $sql);
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

        <button>
            <a href="/ganaderia/public/view/vistaAdministrador.php">Volver</a>
        </button>

        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero Documento</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Nombre Finca</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($stmt) > 0) {
                    while ($row = mysqli_fetch_assoc($stmt)) {
                        echo "<tr>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["numero_documento"] . "</td>";
                        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["finca"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["contrasena"] . "</td>";
                        echo "<td>"."<button><a href = /ganaderia/public/view/editarUsuarios.php?id_usuario=".$row["id_usuario"].">Editar</a></button>"."</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
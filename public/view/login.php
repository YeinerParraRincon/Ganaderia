<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <form action="../backend/modelo/loginModelo.php" method="post">
            <h1 class="titulo">Login de Usuario</h1>
            <div class="inputs">
                <input type="email" name="correo" class="correo" required>
                <input type="password" name="contraseña" class="contraseña" required>
            </div>
            <div class="boton">
                <button type="submit" class="btn">Iniciar</button>
            </div>
            <div class="registar">
                <button >
                    <a href="../view/recuperacionContrasena.php">¿Se te olvido la Contraseña?</a>
                </button>
            </div>
        </form>
    </div>
</body>

</html>
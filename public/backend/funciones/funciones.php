<?php
require_once("../conexion/conexion.php");
require_once("../modelo/enviarCorreo.php");

function insertarUsuario($conexion, $nombre, $tipo_documento, $documento, $rol, $fecha_nacimiento, $fecha_registro, $telefono, $finca, $correo, $contra, $imagen)
{
    $sql_check = "SELECT COUNT(*) FROM usuario WHERE correo = ?";
    $stmt_check = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $correo);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $existe);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($existe > 0) {
        echo "<script>
            alert('Ya existe un usuario con ese correo');
            window.history.back();
        </script>";
        return;
    }

    $sql_check = "SELECT COUNT(*) FROM usuario WHERE telefono = ?";
    $stmt_check = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "i", $telefono);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $existe);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($existe > 0) {
        echo "<script>
            alert('Ya existe un usuario con ese numero de telefono');
            window.history.back();
        </script>";
        return;
    }

    $sql_check = "SELECT COUNT(*) FROM usuario WHERE numero_documento = ?";
    $stmt_check = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "i", $documento);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $existe);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($existe > 0) {
        echo "<script>
            alert('Ya existe un usuario con ese numero de documento');
            window.history.back();
        </script>";
        return;
    }


    $sql = "INSERT INTO usuario(nombre,id_tipo_documento,numero_documento,id_rol,fecha_nacimiento,fecha_registro,telefono,finca,correo,contrasena,imagen)values(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "siiississss", $nombre, $tipo_documento, $documento, $rol, $fecha_nacimiento, $fecha_registro, $telefono, $finca, $correo, $contra, $imagen);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Fue exitoso');
        window.location.href = '/ganaderia/public/view/vistaAdministrador.php'
        </script>";
    } else {
        echo "<script>alert('Error al registrar el usuario');
        window.history.back();
        </script>";
        return;
    }
}


function validarUsuario($conexion, $correo, $passwornd)
{
    session_start();

    $sql = "SELECT * FROM usuario WHERE correo = ? AND contrasena = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $correo, $passwornd);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        $rol = $usuario["id_rol"];
        $finca = $usuario["finca"];
        $id = $usuario["id_usuario"];
        $imagen = $usuario["imagen"];
        $nombre = $usuario["nombre"];


        $_SESSION["id_usuario"] = $id;
        $_SESSION["correo"] = $correo;
        $_SESSION["contra"] = $passwornd;
        $_SESSION["rol"] = $rol;
        $_SESSION["finca"] = $finca;
        $_SESSION["imagen"] = $imagen;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["SESSION"] = $_SESSION;

        if ($rol == 1) {
            echo "<script>alert('Bienvenido Administrador');
            window.location.href = '/ganaderia/public/view/vistaAdministrador.php'
            </script>";
        } else if ($rol == 2) {
            echo "<script>alert('Bienvenido Propietario');
            window.location.href = '/ganaderia/public/view/vistaPropietario.php'
            </script>";
        } else if ($rol == 4) {
            echo "<script>alert('Bienvenido Veterinario');
            window.location.href = '/ganaderia/public/view/vistaVeterinario.php'
            </script>";
        } else {
            echo "<script>alert('Este Usuario No tiene rol Asignado')</script>";
        }
    } else {
        echo "<script>alert('No existe ese Usuario');
        window.history.back();
        </script>";
    }
}

function existenciaCorreo($conexion, $correo)
{
    $sql = "SELECT * FROM usuario WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        $codigo = rand(100000, 999999);

        $update = "UPDATE usuario SET codigo_recuperacion = ?,fecha_codigo = NOW() WHERE CORREO =  ?";
        $stmt2 = mysqli_prepare($conexion, $update);
        mysqli_stmt_bind_param($stmt2, "is", $codigo, $correo);
        mysqli_stmt_execute($stmt2);

        if (enviarCorreoRecuperacion($correo, $codigo)) {
            echo "<script>
                alert('Se envió un código a tu correo.');
                window.location.href = '/ganaderia/public/view/vistaIngresarCodigo.php?correo=$correo';
            </script>";
        } else {
            echo "<script>alert('No se pudo enviar el correo.')</script>";
        }
    } else {
        echo "<script>alert('No existe ese Correo Por favor verificar')</script>";
    }
}

function verificarCodigos($conexion, $correo, $codigo)
{
    $sql = "SELECT * FROM usuario WHERE codigo_recuperacion = ? AND correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "is", $codigo, $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Fue exitoso el codigo');
            window.location.href = '/ganaderia/public/view/actualizarContrasenas.php?correo=$correo';
            </script>";
    } else {
        echo "<script>alert('El Codigo No es valido por favor verificar')</script>";
    }
}


function actualizarContraseñas($conexion, $contraseñaPrincipal, $correo)
{
    $sql = "UPDATE usuario SET contrasena = ? WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $contraseñaPrincipal, $correo);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Fue exitoso el cambio de la contraseña');
        window.location.href = '/ganaderia/public/view/login.php'
        </script>";
    } else {
        echo "<script>alert('Error actualizar la contraseña')</script>";
    }
}


function actualizarUsuario($conexion, $id_usuario, $nombre, $tipo_documneto, $numero_documento, $rol, $fecha_nacimiento, $telefono, $nombre_finca, $correo, $contrasena)
{
    $sql_check = "SELECT COUNT(*) FROM usuario WHERE telefono = ? ";
    $stmt = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt, "i", $telefono);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $exito);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($exito > 0) {
        echo "<script>alert('Ese numero de telefono ya existe');
        window.history.back();
        </script>";
    }

    $sql_check = "SELECT COUNT(*) FROM usuario WHERE correo = ? ";
    $stmt = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $exito);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($exito > 0) {

        echo "<script>alert('Ese correo ya existe');
        window.history.back();
        </script>";
    }

    $sql_check = "SELECT COUNT(*) FROM usuario WHERE documento = ? ";
    $stmt = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt, "i", $numero_documento);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $exito);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($exito > 0) {
        echo "<script>alert('Ese numero de documento ya existe');
        window.history.back();
        </script>";
    }

    $sql = "UPDATE usuario SET nombre = ?,id_tipo_documento = ?,numero_documento = ?,id_rol = ?,fecha_nacimiento = ?,telefono = ?,finca = ?,correo = ?,contrasena = ? WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "siiisisssi", $nombre, $tipo_documneto, $numero_documento, $rol, $fecha_nacimiento, $telefono, $nombre_finca, $correo, $contrasena, $id_usuario);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Fue exitoso la actualizacion de datos');
        window.location.href = '/ganaderia/public/view/gestionUsuario.php'
        </script>";
    } else {
        echo "<script>alert('Error al actualizar el Usuario')</script>";
    }
}


function insertarAnimal($conexion, $codigo, $nombre_animal, $numero_chip, $fecha_nacimiento, $genero, $raza_animal, $color, $imagen, $finca)
{
    $sql_check = "SELECT COUNT(*) FROM animal WHERE codigo = ?";
    $stmt_check = mysqli_prepare($conexion, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "i", $codigo);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $existe);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($existe > 0) {
        echo "<script>
            alert('Ya existe un animal con ese código');
            window.history.back();
        </script>";
        return;
    }

    $sql = "INSERT INTO animal(codigo,nombre,numero,fecha,id_sexo,raza,caracteristicas,imagen,finca)VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "isisissss", $codigo, $nombre_animal, $numero_chip, $fecha_nacimiento, $genero, $raza_animal, $color, $imagen, $finca);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Fue exitoso el registro del animal');
    window.location.href = '/ganaderia/public/view/vistaPropietario.php'
    </script>";
    } else {
        echo "<script>alert('Error el insertar el animal')</script>";
    }
}

function  editarUsuario($conexion, $codigo_animal, $nombre_animal, $numero_animal, $fecha_nacimiento, $sexo_animal, $raza_animal, $color_animal, $imagen_animal, $id_animal)
{
    $sql = "UPDATE animal SET codigo = ?,nombre = ?,numero = ?,fecha = ?,id_sexo = ?,raza = ?,caracteristicas = ?,imagen = ? WHERE id_animal =  ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "isisisssi", $codigo_animal, $nombre_animal, $numero_animal, $fecha_nacimiento, $sexo_animal, $raza_animal, $color_animal, $imagen_animal, $id_animal);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Fue exitoso la edicion del animal');
        window.location.href = '/ganaderia/public/view/vistaPropietario.php'
        </script>";
    } else {
        echo "<script>alert('Error al editar el animal')</script>";
    }
}

function insertarInsepcionAnimal($conexion, $id_usuario, $id_animal, $estado, $descripcion, $finca)
{
    mysqli_begin_transaction($conexion);

    try {

        $sql = "INSERT INTO salud(id_animal, id_estado, descripcion) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "iis", $id_animal, $estado, $descripcion);
        mysqli_stmt_execute($stmt);
        $id_salud = mysqli_insert_id($conexion);


        $sql = "INSERT INTO salud_usuario(id_salud, id_usuario) VALUES (?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $id_salud, $id_usuario);
        mysqli_stmt_execute($stmt);
        $id_salud_usuario = mysqli_insert_id($conexion);


        $sql = "INSERT INTO notificaciones(id_salud_usuario, id_notification_type, finca) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        $id_notification_type = 3;
        mysqli_stmt_bind_param($stmt, "iis", $id_salud_usuario, $id_notification_type, $finca);
        mysqli_stmt_execute($stmt);

        mysqli_commit($conexion);
        echo "<script>
        alert('Fue exitosa la inspección del animal');
        window.location.href = '/ganaderia/public/view/vistaVeterinario.php';
    </script>";
    } catch (Exception $e) {
        mysqli_rollback($conexion);
        die("Error en transacción: " . mysqli_error($conexion));
    }
}

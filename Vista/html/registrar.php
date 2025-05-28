<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
    <br><br><br>
<div class="contenedorLogin">
    <div class="contenedorLogin2">
        Iniciar Sesión
    </div>
    <br>
    <form action="index.php?accion=nuevoUsuario" method="post" class="form">
        Seleccione el rol a Ocupar:<br>
        <select name="rol" id="rol" required>
            <option value="">--seleccione--</option>
            <option value="paciente">Paciente</option>
            <option value="medico">medico</option>
            <option value="administrador">Administrador</option>
        </select><br>
        Ingrese el correo:<br>
        <input type="email" name="correo" id="correo" required placeholder="ejemplo@gmail.com"><br>

        Cree la contraseña:<br>
        <input type="password" name="contrasena" id="contrasena" required placeholder="**********"><br>
        Confirme la contraseña:<br>
        <input type="password" name="confirmarContrasena" id="confirmarContrasena" required placeholder="**********"><br>
        <br><input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>
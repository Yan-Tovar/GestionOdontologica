<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
<div class="contenedorLogin">
    <div class="contenedorLogin2">
        Iniciar Sesión
    </div>
    <form action="index.php?accion=iniciarSesion" method="post" class="form">
        Ingrese su correo:<br>
        <input type="email" name="correo" id="correo" required><br>

        Ingrese su contraseña:<br>
        <input type="password" name="contrasena" id="contrasena" required><br>

        Seleccione su rol:<br>
        <select name="rol" id="rol" required>
            <option value="">--seleccione--</option>
            <option value="paciente">Paciente</option>
            <option value="medico">medico</option>
            <option value="administrador">Administrador</option>
        </select><br><br><input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>
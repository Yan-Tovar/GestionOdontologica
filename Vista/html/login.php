<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body class="body2">
    <br><br><br>
    <br>
    <form action="index.php?accion=iniciarSesion" method="post" class="form">
        <label for="correo">Ingrese su correo:</label><br>
        <input type="email" name="correo" id="correo" required placeholder="ejemplo@gmail.com"><br>

        <label for="contraseña">Ingrese su contraseña:</label><br>
        <input type="password" name="contrasena" id="contrasena" required placeholder="**********"><br>

        <label for="rol">Seleccione su rol:</label><br>
        <select name="rol" id="rol" required>
            <option value="">--seleccione--</option>
            <option value="paciente">Paciente</option>
            <option value="medico">medico</option>
            <option value="administrador">Administrador</option>
        </select><br><br>
        <input type="submit" class="btn-verde" value="Enviar">
    </form>
</body>
</html>
<?php
$value=$_SESSION['us_id'];
if(isset($value)){
?>
<!DOCTYPE html>
<html>
<head>
<title>Infomación General</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
    <div id="contenedor">
    <div id="encabezado">
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="index.php?accion=inicio" class="activa">inicio</a> </li>
        <li><a href="index.php?accion=asignar">Asignar</a> </li>
        <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
        <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
        <li><a href="index.php?accion=listarConsultorio">Consultorio</a></li>
        <li><a href="index.php?accion=AasignarTratamientos">Tratamientos</a></li>
        <li><a href="index.php?accion=listarMedicos">Medicos</a></li>        
        <li><a href="index.php?accion=listarAdministradores">Administradores</a></li>
        <li><a href="index.php?accion=descargarCitas">Excel Citas</a></li>
    </ul>
    </ul>
    <div id="contenido">
        <h3>Registrar Funcionario</h3>
        <br>
        <form action="index.php?accion=nuevoFuncionario" method="post" class="form">
            Seleccione el rol a Ocupar:<br>
            <select name="rol" id="rol" required>
                <option value="">--seleccione--</option>
                <option value="medico">medico</option>
                <option value="administrador">Administrador</option>
            </select><br>
            Ingrese el correo:<br>
            <input type="email" name="correo" id="correo" required placeholder="ejemplo@gmail.com"><br>

            Cree la contraseña:<br>
            <input type="password" name="contrasena" id="contrasena" required placeholder="**********"><br>
            Confirme la contraseña:<br>
            <input type="password" name="confirmarContrasena" id="confirmarContrasena" required placeholder="**********"><br>
            <hr>Ingrese el Documento:<br>
            <input type="number" name="documento" id="documento" required placeholder="Documento"><br>
            Ingrese los Nombres:<br>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre"><br>
            Ingrese los Apellidos:<br>
            <input type="text" name="apellidos" id="apellidos" required placeholder="Apellidos"><br>
            <br><input type="submit" value="Enviar">
        
        </form>
    </div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
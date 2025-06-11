<?php
$value=$_SESSION['us_id'];
if(isset($value)){
?>
<!DOCTYPE html>
<html>
<head>
<title>Infomación General</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="vista/jquery/jquery.js" ></script>
    <script src="Vista/js/script.js" type="text/javascript"></script>
    <script src="Vista/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
</head>
<body>
    <div id="contenedor">
    <div id="encabezado">
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="inicio" class="activa"><i class="material-icons-outlined">home</i> inicio</a> </li>
        <li><a href="asignar"><i class="material-icons-outlined">assignment</i>Asignar</a> </li>
        <li><a href="consultar"><i class="material-icons-outlined">search</i>Consultar Cita</a> </li>
        <li><a href="cancelar"><i class="material-icons-outlined">cancel</i>Cancelar Cita</a> </li>
        <li><a href="listarConsultorio"><i class="material-icons-outlined">apartment</i>Consultorio</a> </li>
        <li><a href="listarMedicos"><i class="material-icons-outlined">group</i>Medicos</a> </li>        
        <li><a href="listarAdministradores"><i class="material-icons-outlined">group_add</i>Administradores</a> </li>
        <li><a href="descargarCitas"><i class="material-icons-outlined">table_view</i>Excel Citas</a></li>
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
            <br>
            <input type="submit" class="btn-verde" value="Enviar">
        
        </form>
    </div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
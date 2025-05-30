<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Paciente'){
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
        <li><a href="index.php?accion=Pinicio" class="activa">inicio</a> </li>
        <li><a href="index.php?accion=verCitas">Citas</a> </li>
        <li><a href="index.php?accion=verTratamientos">Tratamientos</a></li>
    </ul>
    <div id="contenido">
        <h2>Información General</h2>
        <p>El Sistema de Gestión Odontológica permite Ver la información de los
    pacientes,
                tratamientos y citas a través de una interfaz web.</p>
        <p>El sistema cuenta con las siguientes secciones:
        <ul>
            <li>Consultar citas</li>
            <li>Consultar Tratamientos</li>
        </ul>
        </p>
        <a href="index.php?accion=cerrarSesion"> 
        <button>Cerrar Sesion</button>
    </a>
    </div>
    </div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
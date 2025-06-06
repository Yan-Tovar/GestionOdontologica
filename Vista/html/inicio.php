<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador'){
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
        <li><a href="inicio" class="activa">inicio</a> </li>
        <li><a href="asignar">Asignar</a> </li>
        <li><a href="consultar">Consultar Cita</a> </li>
        <li><a href="cancelar">Cancelar Cita</a> </li>
        <li><a href="listarConsultorio">Consultorio</a></li>
        <li><a href="listarMedicos">Medicos</a></li>        
        <li><a href="listarAdministradores">Administradores</a></li>
        <li><a href="descargarCitas">Excel Citas</a></li>
    </ul>
    <div id="contenido">
        <h2>Información General</h2>
        <p>El Sistema de Gestión Odontológica permite administrar la información de los
    pacientes,
                tratamientos y citas a través de una interfaz web.</p>
        <p>El sistema cuenta con las siguientes secciones:
        <ul>
            <li>Asignar cita</li>
            <li>Consultar cita</li>
            <li>Cancelar cita</li>
            <li>Administrar Consultorios</li>
            <li>Administrar Tratamientos</li>
        </ul>
        </p>
        <table>
            <tr>
                <td>
                     <a href="registrarFuncionario">
            <button>Registrar Funcionario</button>
        </a>
                </td>
            </tr>
            </tr>
                <tr><td colspan="2">
                    <div id="paciente"></div>
                </td>
                </tr>
        </table>
        <a href="cerrarSesion"> 
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
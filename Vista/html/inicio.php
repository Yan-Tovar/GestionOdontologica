<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador'){
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
        <div class="contenedorSesion">
            <a href="cerrarSesion"> 
                <button class="btn-rojo">Cerrar Sesion<i class="material-icons">logout</i></button>
            </a>
        </div>
    <div id="encabezado">
        <br>
        <h3 id="bienvenida">Bienvenido <?php echo $_SESSION["us_nom"]; ?></h3>
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
    <div class="contenido">
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
        <div class="botonesAccion">
            <table>
                <tr>
                    <td>
                        <a href="registrarFuncionario">
                            <button class="btn-normal">
                                Registrar Funcionario<i class="material-icons">person_add</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="paciente"></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador'){
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Cita</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
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
        <li><a href="inicio">inicio</a> </li>
        <li><a href="asignar">Asignar</a> </li>
        <li><a href="consultar" class="activa">Consultar Cita</a> </li>
        <li><a href="cancelar">Cancelar Cita</a> </li>
        <li><a href="listarConsultorio">Consultorio</a></li>
        <li><a href="listarMedicos">Medicos</a></li>        
        <li><a href="listarAdministradores">Administradores</a></li>
        <li><a href="descargarCitas">Excel Citas</a></li>
    </ul>
    </ul>
    <div id="contenido">
        <div id="contenido">
            <h2>Consultar Cita</h2>
            <form action="#"  id="frmconsultar">
                <table>
                    <tr>
                        <td>Documento del Paciente</td>
                        <td><input type="text" name="consultarDocumento"
                        id="consultarDocumento" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" name="consultarConsultar"
                        value="Consultar" id="consultarConsultar" onclick="consultarCitaA()"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div id="paciente2"></div></td>
                    </tr>
                </table>
            </form>
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
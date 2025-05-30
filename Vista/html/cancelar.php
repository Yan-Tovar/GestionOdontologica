<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador'){
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gestión Odontológica</title>
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
        <h1>Cancelar Cita</h1>
    </div>
    <ul id="menu">
        <li><a href="index.php?accion=inicio">inicio</a> </li>
        <li><a href="index.php?accion=asignar">Asignar</a> </li>
        <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
        <li><a href="index.php?accion=cancelar" class="activa">Cancelar Cita</a> </li>
        <li><a href="index.php?accion=listarConsultorio">Consultorio</a></li>
        <li><a href="index.php?accion=AasignarTratamientos">Tratamientos</a></li>
        <li><a href="index.php?accion=listarMedicos">Medicos</a></li>        
        <li><a href="index.php?accion=listarAdministradores">Administradores</a></li>
        <li><a href="index.php?accion=descargarCitas">Excel Citas</a></li>
    </ul>
    </ul>
    <div id="contenido">
        <div id="contenido">
            <h2>Cancelar Cita</h2>
            <form action="index.php?accion=cancelarCita" method="post"
                id="frmcancelar">
                <table>
                    <tr>
                        <td>Documento del Paciente </td>

                        <td><input type="text" name="cancelarDocumento"

                        id="cancelarDocumento"required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="Consultar" 
                        onclick="cancelarCita()"></td>
                        </tr>
                    <tr>
                        <td colspan="2"><div id="paciente3"></div></td>
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
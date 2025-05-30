<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Paciente'){
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
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="index.php?accion=Pinicio">inicio</a> </li>
        <li><a href="index.php?accion=verCitas" class="activa">Citas</a> </li>
        <li><a href="index.php?accion=verTratamientos">Tratamientos</a> </li>
    </ul>
    <div id="contenido">
        <h2>Consultar Cita</h2>
        <form action="#"  id="frmconsultar">
            <table>
                <tr>
                    <td><input type="hidden" name="consultarDocumento"
                    id="consultarDocumento" value="<?php echo $_SESSION['us_id'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" name="consultarConsultar"
                    value="Consultar" id="consultarConsultar" onclick="consultarCita()"></td>
                </tr>
                <tr>
                    <td colspan="2"><div id="paciente2"></div></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
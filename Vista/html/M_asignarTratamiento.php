<?php
$value=$_SESSION['us_id'];
if (isset($value) && $_SESSION['rol'] == 'Medico'){
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
        <li><a href="Minicio">inicio</a> </li>
        <li><a href="MverCitas">Citas</a> </li>
    </ul>
    <div id="contenido">
        <h2>Asignar Tratamiento</h2>
        <form id="frmasignar" action="index.php?accion=guardarTratamiento" method="post">
            <table>
                <tr>
                    <td>Documento del paciente</td>
                    <td><input type="text" name="asignarDocumento" id="asignarDocumento" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" value="Consultar" name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()"></td>
                </tr>
                <tr><td colspan="2">
                    <div id="paciente"></div>
                </td>
                </tr>
                <tr>
                    <td>Fecha de Asignacion</td>
                    <td>
                        <input type="date" id="fechaAsignacion" name="fechaAsignacion" required>
                    </td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td>
                        <input type="text" id="descripcion" name="descripcion">
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Inicio</td>
                    <td>
                        <input type="date" id="fechaInicio" name="fechaInicio" required>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Fin</td>
                    <td>
                        <input type="date" id="fechaFin" name="fechaFin" required>
                    </td>
                </tr>
                <tr>
                    <td>Observaciones</td>
                    <td>
                        <input type="text" id="observaciones" name="observaciones">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="asignarEnviar" value="Enviar"
                        id="asignarEnviar">
                    </td>
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
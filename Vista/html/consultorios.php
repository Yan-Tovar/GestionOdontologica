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
        <li><a href="index.php">inicio</a> </li>
        <li><a href="index.php?accion=asignar">Asignar</a> </li>
        <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
        <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
        <li><a href="index.php?accion=consultorio">Consultorios</a></li>
    </ul>
    <div id="contenido">
        <div id="contenido">
            <h2>Consultorios</h2>
            <table>
                <tr>
                    <td>
                        <input type="submit" value="Listar" name="listarConsultorio"id="listarConsultorio" onclick="listarConsultorio()">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="listado"></div>
                    </td>
                </tr>
            </table>
            <br><br><br>
        </div>
    </div>
    </div>
</body>
</html>
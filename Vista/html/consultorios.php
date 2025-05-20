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
        <li><a href="index.php?accion=consultorio"><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
        <li onclick="listarConsultorio()"><a href="index.php?accion=consultorio"></a>Consultorios</li>
    </ul>
    <div id="contenido">
        <div id="contenido">
            <h2>Consultorios</h2>
            <table>
                <tr>
                    <td>
                        <input type="submit" value="Agregar" name="agregarConsultorio"id="agregarConsultorio" onclick="agregarConsultorio()">
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
<!-- Este es el formulario que se oculta -->
<div id="frmConsultorio" title="Agregar Nuevo Consultorio">
    <form id="agregarConsultorios">
        <table>
            <tr>
                <td>Numero</td>
                <td><input type="number" name="ConNumero" id="ConNumero" required></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="ConNombre" id="ConNombre" required></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
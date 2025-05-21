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
        <li><a href="index.php?accion=listarConsultorio"></a>Consultorios</li>
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
            <?php
                if($result->num_rows > 0){
            ?>
            <table>
                <tr>
                    <th>ConNumero |</th><th>ConNombre |</th><th>Acciones |</th>
                </tr>
                <?php
                    while($fila=$result->fetch_object()){
                ?>
                <tr>
                    <td id="asignarDocumento"><?php echo $fila->ConNumero; $numero= $fila->ConNumero;?></td>
                    <td><?php echo $fila->ConNombre; $nombre= $fila->ConNombre;?></td>
                    <td>
                        <!-- Editar Consultorio -->
                        <input type="button" value="Editar" name="editarConsultorio" id="editarConsultorio"
                        onclick="mostrarFormularioE('<?php echo $fila->ConNumero; ?>', '<?php echo $fila->ConNombre; ?>')">

                        <!-- Eliminar Consultorio -->
                        <input type="button" value="Eliminar" name="eliminarConsultorio" id="eliminarConsultorio"
                        onclick="eliminarC('<?php echo $fila->ConNumero; ?>')">
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <?php
                }
                else {
            ?>
            <p>Aún no hay Consultorios.</p>
            <?php
            }
            ?>
        </div>
    </div>
<!-- Este es el formulario que se oculta de agregarConsultorio -->
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
<!-- Este es el formulario que se oculta de editarConsultorio -->
<div id="frmEditar" title="Editar un consultorio">
    <form id="editarConsultorio">
        <table>
            <tr>
                <td>Numero</td>
                <td><input type="text" name="inputNumero" id="inputNumero" disabled></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="inputNombre" id="inputNombre" required></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
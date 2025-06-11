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
    <div id="encabezado">
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="inicio"><i class="material-icons-outlined">home</i> inicio</a> </li>
        <li><a href="asignar"><i class="material-icons-outlined">assignment</i>Asignar</a> </li>
        <li><a href="consultar"><i class="material-icons-outlined">search</i>Consultar Cita</a> </li>
        <li><a href="cancelar"><i class="material-icons-outlined">cancel</i>Cancelar Cita</a> </li>
        <li><a href="listarConsultorio" class="activa"><i class="material-icons-outlined">apartment</i>Consultorio</a> </li>
        <li><a href="listarMedicos"><i class="material-icons-outlined">group</i>Medicos</a> </li>        
        <li><a href="listarAdministradores"><i class="material-icons-outlined">group_add</i>Administradores</a> </li>
        <li><a href="descargarCitas"><i class="material-icons-outlined">table_view</i>Excel Citas</a></li>
    </ul>       
        <div class="contenido">
            <h2>Consultorios</h2>
            <table>
                <tr>
                    <td>
                        <input type="submit" class="btn-verde" value="Agregar" name="agregarConsultorio"id="agregarConsultorio" onclick="agregarConsultorio()">
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
            <table class="table">
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
                        <input type="button" class="btn-normal" value="Editar" name="editarConsultorio" id="editarConsultorio"
                        onclick="mostrarFormularioE('<?php echo $fila->ConNumero; ?>', '<?php echo $fila->ConNombre; ?>')">

                        <!-- Eliminar Consultorio -->
                        <input type="button" class="btn-rojo" value="Eliminar" name="eliminarConsultorio" id="eliminarConsultorio"
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
<?php
}else{
    header("Location: index.php");
}
?>
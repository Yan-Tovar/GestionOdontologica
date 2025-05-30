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
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="index.php?accion=inicio">inicio</a> </li>
        <li><a href="index.php?accion=asignar">Asignar</a> </li>
        <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
        <li><a href="index.php?accion=cancelar">Cancelar Cita</a></li>
        <li><a href="index.php?accion=listarConsultorio"></a>Consultorios</li>
        <li><a href="index.php?accion=AasignarTratamientos">Tratamientos</a></li>
        <li><a href="index.php?accion=listarMedicos" class="activa">Medicos</a></li>        
        <li><a href="index.php?accion=listarAdministradores">Administradores</a></li>
        <li><a href="index.php?accion=descargarCitas">Excel Citas</a></li>
    </ul>
    </ul>
    <div id="contenido">        
        <div id="contenido">
            <h2>Medicos</h2>
            <table>
                <tr>
                    <td>
                        <a href="index.php?accion=registrarFuncionario">Agregar</a>
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
                    <th>Identificacion |</th><th>Correo |</th><th>Nombre |</th>
                    <th>Apellidos |</th>
                </tr>
                <?php
                    while($fila=$result->fetch_object()){
                ?>
                <tr>
                    <td id="asignarDocumento"><?php echo $fila->MedIdentificacion; $doc= $fila->MedIdentificacion;?></td>
                    <td><?php echo $fila->MedCorreo; $cor= $fila->MedCorreo;?></td>
                    <td><?php echo $fila->MedNombres; $nom= $fila->MedNombres;?></td>
                    <td><?php echo $fila->MedApellidos; $ape= $fila->MedApellidos;?></td>
                    <td>
                        <!-- Editar Consultorio -->
                        <input type="button" value="Editar" name="editarMedico" id="editarMedico"
                        onclick="mostrarFormularioM('<?php echo $fila->MedIdentificacion; ?>', '<?php echo $fila->MedCorreo; ?>', '<?php echo $fila->MedNombres; ?>', '<?php echo $fila->MedApellidos; ?>')">

                        <!-- Eliminar Consultorio -->
                        <input type="button" value="Eliminar" name="eliminarMedico" id="eliminarMedico"
                        onclick="eliminarM('<?php echo $fila->MedIdentificacion; ?>')">
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
            <p>Aún no hay Medicos.</p>
            <?php
            }
            ?>
        </div>
    </div>
<!-- Este es el formulario que se oculta de editarMedico -->
<div id="frmEditaM" title="Editar un Medico">
    <form id="editarMedico">
        <table>
            <tr>
                <td>Documento</td>
                <td><input type="text" name="inputDocumento" id="inputDocumento" disabled></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="email" name="inputCorreo" id="inputCorreo" required></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type="text" name="inputNombres" id="inputNombres" required></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="inputApellidos" id="inputApellidos" required></td>
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
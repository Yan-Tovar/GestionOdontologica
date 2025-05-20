<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
         <link href="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="vista/jquery/jquery.js" ></script>
        <script src="Vista/js/script.js" type="text/javascript"></script>
        <script src="Vista/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
    </head>
    <body>
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
        <td><input type="button" value="Editar" name="editarConsultorio" id="editarConsultorio"
        onclick="mostrarFormularioE('<?php echo $fila->ConNumero; ?>', '<?php echo $fila->ConNombre; ?>')">
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
<!-- Este es el formulario que se oculta -->
<div id="frmEditar" title="Agregar Nuevo Paciente">
    <form id="agregarPaciente">
        <table>
            <tr>
                <td>Numero</td>

                <td><input type="text" name="inputNumero"

                id="inputNumero"></td>
            </tr>
            <tr>

                <td>Nombres</td>

                <td><input type="text" name="inputNombre"

                id="inputNombre"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
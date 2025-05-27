<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li onclick="history.back()">Volver atrás</li>
        </ul>
        <div id="contenido">
            <?php $fila = $result->fetch_object();?>
            <h2>Información Tratamiento</h2>
            <table>
                <tr>
                    <th colspan="2">Datos del Paciente</th>
                </tr>
                <tr>
                    <td>Documento</td>
                    <td><?php echo $fila->PacIdentificacion;?></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $fila->PacNombres . " " . $fila->PacApellidos;?></td>
                </tr>
                <tr>
                    <th colspan="2">Datos del Tratamiento</th>
                </tr>
                <tr>
                    <td>Numero</td>
                    <td><?php echo $fila->TraNumero;?></td>
                </tr>
                <tr>
                    <td>Fecha de Asignacion</td>
                    <td><?php echo $fila->TraFechaAsignado;?></td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><?php echo $fila->TraDescripcion;?></td>
                </tr>
                <tr>
                    <td>Fecha Inicio</td>
                    <td><?php echo $fila->TraFechaInicio;?></td>
                </tr>
                <tr>
                    <td>Fecha Fin</td>
                    <td><?php echo $fila->TraFechaFin;?></td>
                </tr>
                <tr>
                    <td>Observaciones</td>
                    <td><?php echo $fila->TraObservaciones;?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
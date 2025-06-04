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
        <?php
        if($_SESSION["rol"] == "Paciente"){
            echo "
            <ul id='menu'>
                <li><a href='index.php?accion=Pinicio' class='activa'>inicio</a> </li>
                <li><a href='index.php?accion=verCitas'>Citas</a></li>
                <li><a href='index.php?accion=verTratamientos'>Tratamientos</a></li>
            </ul> ";
        }elseif($_SESSION["rol"] == "Medico"){
            echo "
            <ul id='menu'>
                <li><a href='index.php?accion=Minicio' class='activa'>inicio</a> </li>
                <li><a href='index.php?accion=MverCitas'>Citas</a></li>
                <li><a href='index.php?accion=asignarTratamientos'>Tratamientos</a></li>
            </ul> ";
        }else{
            echo "
            <ul id='menu'>
                <li><a href='index.php?accion=inicio' class='activa'>inicio</a> </li>
                <li><a href='index.php?accion=asignar'>Asignar</a> </li>
                <li><a href='index.php?accion=consultar'>Consultar Cita</a> </li>
                <li><a href='index.php?accion=cancelar'>Cancelar Cita</a> </li>
                <li><a href='index.php?accion=listarConsultorio'>Consultorio</a></li>
                <li><a href='index.php?accion=listarMedicos'>Medicos</a></li>        
                <li><a href='index.php?accion=listarAdministradores'>Administradores</a></li>
                <li><a href='index.php?accion=descargarCitas'>Excel Citas</a></li>
            </ul> ";
        }
        ?>
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
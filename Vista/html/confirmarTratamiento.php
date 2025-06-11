<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/GestionOdontologica/Vista/css/estilos.css">
    <link href="/GestionOdontologica/Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/GestionOdontologica/vista/jquery/jquery.js" ></script>
    <script src="/GestionOdontologica/Vista/js/script.js" type="text/javascript"></script>
    <script src="/GestionOdontologica/Vista/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/GestionOdontologica/Vista/jquery/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
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
                <li><a href='Pinicio'><i class='material-icons-outlined'>home</i> inicio</a> </li>
                <li><a href='verCitas'><i class='material-icons-outlined'>plagiarism</i> Citas</a> </li>
                <li><a href='PcancelarCita'><i class='material-icons-outlined'>cancel</i> Cancelar Cita</a> </li>
                <li><a href='verTratamientos' class='activa'><i class='material-icons-outlined'>assignment</i> Tratamientos</a></li>
            </ul> ";
        }elseif($_SESSION["rol"] == "Medico"){
            echo "
            <ul id='menu'>
                <li><a href='Minicio'><i class='material-icons-outlined'>home</i>inicio</a> </li>
                <li><a href='MverCitas' class='activa'><i class='material-icons-outlined'>assignment</i>Citas</a> </li>
            </ul> ";
        }else{
            echo "
            <ul id='menu'>
                <li><a href='inicio'><i class='material-icons-outlined'>home</i> inicio</a> </li>
                <li><a href='asignar' class='activa'><i class='material-icons-outlined'>assignment</i>Asignar</a> </li>
                <li><a href='consultar'><i class='material-icons-outlined'>search</i>Consultar Cita</a> </li>
                <li><a href='cancelar'><i class='material-icons-outlined'>cancel</i>Cancelar Cita</a> </li>
                <li><a href='listarConsultorio'><i class='material-icons-outlined'>apartment</i>Consultorio</a> </li>
                <li><a href='listarMedicos'><i class='material-icons-outlined'>group</i>Medicos</a> </li>        
                <li><a href='listarAdministradores'><i class='material-icons-outlined'>group_add</i>Administradores</a> </li>
                <li><a href='descargarCitas'><i class='material-icons-outlined'>table_view</i>Excel Citas</a></li>
            </ul> ";
        }
        ?>
        <div class="contenido">
            <?php $fila = $result->fetch_object();?>
            <h2>Información Tratamiento</h2>
            <table class="table">
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
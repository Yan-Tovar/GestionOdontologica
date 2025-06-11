<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Paciente' || $_SESSION['rol'] == 'Medico'){
?>

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
    <?php 
        $fila = $result->fetch_object();

        $pacDocumento = $fila->PacIdentificacion;
        $pacNombre = $fila->PacNombres . " " . $fila->PacApellidos;
        $medDocumento = $fila->MedIdentificacion;
        $medNombre = $fila->MedNombres . " " . $fila->MedApellidos;
        $citaNumero = $fila->CitNumero;
        $citaFecha = $fila->CitFecha;
        $citaHora = $fila->CitHora;
        $consultorio = $fila->ConNombre;
        $estadoCita = $fila->CitEstado;
        $observaciones = $fila->CitObservaciones;
    ?>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <?php
        if($_SESSION["rol"] == "Paciente"){
            echo "
            <ul id='menu'>
                <li><a href='/GestionOdontologica/Pinicio'><i class='material-icons-outlined'>home</i> inicio</a> </li>
                <li><a href='/GestionOdontologica/verCitas' class='activa'><i class='material-icons-outlined'>plagiarism</i> Citas</a> </li>
                <li><a href='/GestionOdontologica/PcancelarCita'><i class='material-icons-outlined'>cancel</i> Cancelar Cita</a> </li>
                <li><a href='/GestionOdontologica/verTratamientos'><i class='material-icons-outlined'>assignment</i> Tratamientos</a></li>
            </ul> ";
        }elseif($_SESSION["rol"] == "Medico"){
            echo "
            <ul id='menu'>
                <li><a href='/GestionOdontologica/Minicio'><i class='material-icons-outlined'>home</i>inicio</a> </li>
                <li><a href='/GestionOdontologica/MverCitas' class='activa'><i class='material-icons-outlined'>assignment</i>Citas</a> </li>
            </ul> ";
        }else{
            echo "
            <ul id='menu'>
                <li><a href='/GestionOdontologica/inicio'><i class='material-icons-outlined'>home</i> inicio</a> </li>
                <li><a href='/GestionOdontologica/asignar' class='activa'><i class='material-icons-outlined'>assignment</i>Asignar</a> </li>
                <li><a href='/GestionOdontologica/consultar'><i class='material-icons-outlined'>search</i>Consultar Cita</a> </li>
                <li><a href='/GestionOdontologica/cancelar'><i class='material-icons-outlined'>cancel</i>Cancelar Cita</a> </li>
                <li><a href='/GestionOdontologica/listarConsultorio'><i class='material-icons-outlined'>apartment</i>Consultorio</a> </li>
                <li><a href='/GestionOdontologica/listarMedicos'><i class='material-icons-outlined'>group</i>Medicos</a> </li>        
                <li><a href='/GestionOdontologica/listarAdministradores'><i class='material-icons-outlined'>group_add</i>Administradores</a> </li>
                <li><a href='/GestionOdontologica/descargarCitas'><i class='material-icons-outlined'>table_view</i>Excel Citas</a></li>
            </ul> ";
        }
        ?>
        <div class="contenido">
                <h2>Información Cita</h2>
                <?php
                if($_SESSION['rol']=="Administrador" || $_SESSION['rol']=="Medico"){
                    ?>
                    <form action='/GestionOdontologica/asignarTratamientos' method='post'>
                        <input type='hidden' value='<?php echo $pacDocumento; ?>' id='pacienteDoc' name='pacienteDoc'>
                        <input type='hidden' value='<?php echo $citaNumero; ?>' id='citaNumero' name='citaNumero'>
                        <input type='submit' class="btn-verde" value='Asignar Tratamiento'>
                    </form>
                    <?php
                }
                ?>
                <table class="table">
                    <tr>
                        <th colspan="2">Datos del Paciente</th>
                    </tr>
                    <tr>
                        <td>Documento</td>
                        <td><?php echo $pacDocumento;?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $pacNombre;?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Datos del Médico</th>
                    </tr>
                    <tr>
                        <td>Documento</td>
                        <td><?php echo $medDocumento;?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $medNombre;?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Datos de la Cita</th>
                    </tr>
                    <tr>
                        <td>Número</td>
                        <td><?php echo $citaNumero;?></td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td><?php echo $citaFecha;?></td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td><?php echo $citaHora;?></td>
                    </tr>
                    <tr>
                        <td>Número de Consultorio</td>
                        <td><?php echo $consultorio;?></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td><?php echo $estadoCita;?></td>
                    </tr>
                    <tr>
                        <td>Observaciones</td>
                        <td><?php echo $observaciones;?></td>
                    
                </table>
                <?php
                if($_SESSION["rol"] != "Paciente"){
                    ?>
                    <div id='contenido'>
                    
                        <h2>Historial de Tratamientos</h2>
                        <table>
                            <tr>
                                <td><input type='hidden' name='consultarDocumento'
                                id='consultarDocumento' value='<?php echo $pacDocumento;?>'></td>
                            </tr>
                            <tr> 
                                <input type='button' class="btn-normal" name='consultarConsultar' value='Ver Historial' id='consultarConsultar' onclick='consultarTratamientos()'>
                            </tr>
                            <tr>
                                <td colspan='2'><div id='paciente2'></div></td>
                            </tr>
                        </table>
                    </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>
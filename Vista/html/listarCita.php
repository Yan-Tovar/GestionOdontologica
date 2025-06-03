<!DOCTYPE html>
<html>
<head>
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
                <li><a href='index.php?accion=Pinicio'>inicio</a> </li>
                <li><a href='index.php?accion=verCitas' class='activa'>Citas</a></li>
                <li><a href='index.php?accion=verTratamientos'>Tratamientos</a></li>
            </ul> ";
        }elseif($_SESSION["rol"] == "Medico"){
            echo "
            <ul id='menu'>
                <li><a href='index.php?accion=Minicio'>inicio</a> </li>
                <li><a href='index.php?accion=MverCitas' class='activa'>Citas</a></li>
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
                <li><a href='index.php?accion=AasignarTratamientos'>Tratamientos</a></li>
                <li><a href='index.php?accion=listarMedicos'>Medicos</a></li>        
                <li><a href='index.php?accion=listarAdministradores'>Administradores</a></li>
                <li><a href='index.php?accion=descargarCitas'>Excel Citas</a></li>
            </ul> ";
        }
        ?>
        <div id="contenido">
                <h2>Información Cita</h2>
                <table>
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
                    </tr>
                    
                </table>
            </div>
        <div class="contenedor_v2">
            <div id="contenido">
                <input type="button" name="consultarConsultar" value="Ver Historial" id="consultarConsultar" onclick="consultarTratamientos()">
                <h2>Historial de Tratamientos</h2>
                <table>
                    <tr>
                        <td><input type="hidden" name="consultarDocumento"
                        id="consultarDocumento" value="<?php echo $pacDocumento;?>"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><div id="paciente2"></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
?>
  
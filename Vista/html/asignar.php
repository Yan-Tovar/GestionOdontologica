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
        <li><a href="asignar" class="activa"><i class="material-icons-outlined">assignment</i>Asignar</a> </li>
        <li><a href="consultar"><i class="material-icons-outlined">search</i>Consultar Cita</a> </li>
        <li><a href="cancelar"><i class="material-icons-outlined">cancel</i>Cancelar Cita</a> </li>
        <li><a href="listarConsultorio"><i class="material-icons-outlined">apartment</i>Consultorio</a> </li>
        <li><a href="listarMedicos"><i class="material-icons-outlined">group</i>Medicos</a> </li>        
        <li><a href="listarAdministradores"><i class="material-icons-outlined">group_add</i>Administradores</a> </li>
        <li><a href="descargarCitas"><i class="material-icons-outlined">table_view</i>Excel Citas</a></li>
    </ul>
    <div class="contenido">
        <h2>Título de página</h2>
        <p>Contenido de la página</p>
        <form id="frmasignar" action="guardarCita" method="post">
            <table >
                <tr>
                    <td>Documento del paciente</td>
                    <td><input type="text" name="asignarDocumento" id="asignarDocumento" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                            <button type="button" class="btn-normal" name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()"><i class="material-icons">search</i>Consultar</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="paciente"></div>
                    </td>
                </tr>
                <tr>
                    <td>Médico</td>
                    <td>
                        <select id="medico" name="medico" onchange="cargarHoras()" required>
                            <option value="-1" selected="selected">---Selecione el
                            Médico</option>
                            <?php

                            while( $fila = $result->fetch_object())

                            {
                            ?>

                            <option value = <?php echo $fila->MedIdentificacion; ?> >
                            <?php echo $fila->MedIdentificacion . " " . $fila->MedNombres ." ". $fila->MedApellidos; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td>
                    <input type="date" id="fecha" name="fecha" onchange="cargarHoras()">
                    </td>
                </tr>
                <tr>
                    <td>Consultorio</td>
                    <td>
                        <select id="consultorio" name="consultorio" onchange="cargarHoras()">
                            <option value="-1" selected="selected">---Selecione el
                            Consultorio</option>
                            <?php

                            while( $fila = $result2->fetch_object())

                            {
                            ?>

                            <option value = <?php echo $fila->ConNumero; ?> >
                                <?php echo $fila->ConNumero . " - " . $fila->ConNombre ;

                                ?>
                            </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td>
                        <select id="hora" name="hora" onmousedown="seleccionarHora()">
                            <option value="-1" selected="selected">---Seleccione
                            la hora ---</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label class="btn-normal"><i class="material-icons">send</i>
                            <input type="submit" class="btn-normal" name="asignarEnviar" value="Enviar"
                        id="asignarEnviar">
                        </label>
                        
                    </td>
                </tr>
            </table>
        </form> 
    </div>
</div>
<!-- Este es el formulario que se oculta -->
<div id="frmPaciente" title="Agregar Nuevo Paciente">
    <form id="agregarPaciente">
        <table>
            <tr>
                <td>Correo</td>

                <td><input type="email" name="PacCorreo"

                id="PacCorreo" required></td>
            </tr>
            <tr>
                <td>Contraseña</td>

                <td><input type="password" name="PacContrasena"

                id="PacContrasena" required></td>
            </tr>
            <tr>
                <td>Confirmar Contraseña</td>

                <td><input type="password" name="PacContrasenaConfirmar"

                id="PacContrasenaConfirmar" required></td>
            </tr>
            <tr>
                <td>Documento</td>

                <td><input type="text" name="PacDocumento"

                id="PacDocumento" required></td>
            </tr>
            <tr>

                <td>Nombres</td>

                <td><input type="text" name="PacNombres"

                id="PacNombres" required></td>
            </tr>
            <tr>

                <td>Apellidos</td>

                <td><input type="text" name="PacApellidos"

                id="PacApellidos" required></td>
            </tr>
            <tr>

                <td>Fecha de Nacimiento</td>

                <td><input type="date" name="PacNacimiento"

                id="PacNacimiento"></td>
            </tr>
            <tr>

                <td>Sexo</td>

                <td>

                <select id="pacSexo" name="PacSexo" required>
                    <option value="-1"
                    selected="selected">--Selecione el sexo ---</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>

                </select>
                </td>
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
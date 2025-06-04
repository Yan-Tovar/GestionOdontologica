<?php
$value=$_SESSION['us_id'];
if(isset($value)){
?>

<!DOCTYPE html>
<html>
<head>
<title>Infomación General</title>
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
    <?php if($_SESSION['rol']=="Administrador"){
        echo "
        <ul id='menu'>
            <li><a href='index.php?accion=inicio' >inicio</a> </li>
            <li><a href='index.php?accion=asignar'>Asignar</a> </li>
            <li><a href='index.php?accion=consultar' class='activa'>Consultar Cita</a> </li>
            <li><a href='index.php?accion=cancelar'>Cancelar Cita</a> </li>
            <li><a href='index.php?accion=listarConsultorio'>Consultorio</a></li>
            <li><a href='index.php?accion=listarMedicos'>Medicos</a></li>        
            <li><a href='index.php?accion=listarAdministradores'>Administradores</a></li>
            <li><a href='index.php?accion=descargarCitas'>Excel Citas</a></li>
        </ul>";
    }else{
        echo "
        <ul id='menu'>
        <li><a href='index.php?accion=Minicio'>inicio</a> </li>
        <li><a href='index.php?accion=MverCitas'>Citas</a> </li>
    </ul>
        ";
    }?>
    
    </ul>
    <div id="contenido">
        <h2>Asignar Tratamiento</h2>
        <form id="frmasignar" action="index.php?accion=guardarTratamiento" method="post">
            <table>

                <?php if(isset($IdCit)){
                ?>
            <tr>
                <td>
                    <input type="hidden" value="<?php echo $IdCit ?>" id="CitNumero" name="CitNumero">
                </td>
            </tr>
            <?php
            }?>
            <tr>
                <td>Documento</td>

                <td><input type="text" name="asignarDocumento"

                id="asignarDocumento" <?php if (isset($IdPac)){echo "readonly";} ?> value="<?php if(isset($IdPac)){ echo $IdPac; }?>"></td>
            </tr>
                    <td colspan="2"><input type="button" value="Consultar" name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()"></td>
                </tr>
                <tr><td colspan="2">
                    <div id="paciente"></div>
                </td>
                </tr>
                <tr>
                    <td>Fecha de Asignacion</td>
                    <td>
                        <input type="date" id="fechaAsignacion" name="fechaAsignacion" required>
                    </td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td>
                        <input type="text" id="descripcion" name="descripcion">
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Inicio</td>
                    <td>
                        <input type="date" id="fechaInicio" name="fechaInicio" required>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Fin</td>
                    <td>
                        <input type="date" id="fechaFin" name="fechaFin" required>
                    </td>
                </tr>
                <tr>
                    <td>Observaciones</td>
                    <td>
                        <input type="text" id="observaciones" name="observaciones">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="asignarEnviar" value="Enviar"
                        id="asignarEnviar">
                    </td>
                </tr>
            </table>
        </form> 
        <hr>
        <h2>Listar Tratamientos</h2>
        <table>
            <tr>
                Ingrese el documento del Paciente
                <td><input type="text" name="consultarDocumento"
                id="consultarDocumento" <?php if (isset($IdPac)){echo "readonly";} ?> value="<?php if(isset($IdPac)){ echo $IdPac; }?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" name="consultarConsultar"
                value="Consultar" id="consultarConsultar" onclick="consultarTratamientosP()"></td>
            </tr>
            <tr>
                <td colspan="2"><div id="paciente2"> </div></td>
            </tr>
        </table>
    </div>
</div>

<!-- Este es el formulario que se oculta -->
<div id="frmPaciente" title="Agregar Nuevo Paciente">
    <form id="agregarPaciente">
        <table>
            <tr>
                <td>Documento</td>

                <td><input type="text" name="PacDocumento"

                id="PacDocumento"></td>
            </tr>
            <tr>

                <td>Nombres</td>

                <td><input type="text" name="PacNombres"

                id="PacNombres"></td>
            </tr>
            <tr>

                <td>Apellidos</td>

                <td><input type="text" name="PacApellidos"

                id="PacApellidos"></td>
            </tr>
            <tr>

                <td>Fecha de Nacimiento</td>

                <td><input type="date" name="PacNacimiento"

                id="PacNacimiento"></td>
            </tr>
            <tr>

                <td>Sexo</td>

                <td>

                <select id="pacSexo" name="PacSexo">
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
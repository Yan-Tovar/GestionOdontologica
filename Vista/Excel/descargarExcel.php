<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

// Encabezados
$activeWorksheet->setCellValue('D1', 'Numero');
$activeWorksheet->setCellValue('E1', 'Fecha');
$activeWorksheet->setCellValue('F1', 'Hora');
$activeWorksheet->setCellValue('G1', 'Paciente Id');
$activeWorksheet->setCellValue('H1', 'Nombres Paciente');
$activeWorksheet->setCellValue('I1', 'Medico Id');
$activeWorksheet->setCellValue('J1', 'Nombres Medico');
$activeWorksheet->setCellValue('K1', 'Consultorio');
$activeWorksheet->setCellValue('L1', 'Estado');
$activeWorksheet->setCellValue('M1', 'Observaciones');

// Contador de fila
$contador = 2;

// Suponiendo que ya tienes $result desde una consulta mysqli o PDO
while($fila = $result->fetch_object()) {
    // Asignar valores a las celdas
    $activeWorksheet->setCellValue('D'.$contador, $fila->CitNumero);
    $activeWorksheet->setCellValue('E'.$contador, $fila->CitFecha);
    $activeWorksheet->setCellValue('F'.$contador, $fila->CitHora);
    $activeWorksheet->setCellValue('G'.$contador, $fila->PacIdentificacion);
    $activeWorksheet->setCellValue('H'.$contador, $fila->PacNombres . " " . $fila->PacApellidos);
    $activeWorksheet->setCellValue('I'.$contador, $fila->MedIdentificacion);
    $activeWorksheet->setCellValue('J'.$contador, $fila->MedNombres . " " . $fila->MedApellidos);
    $activeWorksheet->setCellValue('K'.$contador, $fila->ConNombre);
    $activeWorksheet->setCellValue('L'.$contador, $fila->CitEstado);
    $activeWorksheet->setCellValue('M'.$contador, $fila->CitObservaciones);

    $contador++;
}

// Guardar archivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('reporte_Citas'."$contador".'.xlsx');
?>
<?php
$value=$_SESSION['us_id'];
if(isset($value) && $_SESSION['rol'] == 'Administrador'){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Infomación General</title>
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
        <div class="contenedorSesion">
            <a href="cerrarSesion"> 
                <button class="btn-rojo">Cerrar Sesion<i class="material-icons">logout</i></button>
            </a>
        </div>
    <div id="encabezado">
        <br>
        <h3 id="bienvenida">Bienvenido <?php echo $_SESSION["us_nom"]; ?></h3>
        <h1>Sistema de Gestión Odontológica</h1>
    </div>
    <ul id="menu">
        <li><a href="inicio" class="activa"><i class="material-icons-outlined">home</i> inicio</a> </li>
        <li><a href="asignar"><i class="material-icons-outlined">assignment</i>Asignar</a> </li>
        <li><a href="consultar"><i class="material-icons-outlined">search</i>Consultar Cita</a> </li>
        <li><a href="cancelar"><i class="material-icons-outlined">cancel</i>Cancelar Cita</a> </li>
        <li><a href="listarConsultorio"><i class="material-icons-outlined">apartment</i>Consultorio</a> </li>
        <li><a href="listarMedicos"><i class="material-icons-outlined">group</i>Medicos</a> </li>        
        <li><a href="listarAdministradores"><i class="material-icons-outlined">group_add</i>Administradores</a> </li>
        <li><a href="descargarCitas"><i class="material-icons-outlined">table_view</i>Excel Citas</a></li>
    </ul>
    <div class="contenido">
        <div style='
            display: inline-flex;
            align-items: center;
            background-color: #d4edda;
            color: #155724;
            padding: 12px 18px;
            margin: 20px;
            border-radius: 25px;
            font-family:arial;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-left: 6px solid #28a745;
            max-width: 400px;
            position: relative;'>
            <i class="material-icons" 
                style='font-size: 16px;
                font-size: 22px;
                margin-right: 10px;
                color: #28a745;'>info</i>
            El excel se descargó con éxito
        </div>
    </div>
    </div>
</body>30px
</html>
<?php
}else{
    header("Location: index.php");
}
?>
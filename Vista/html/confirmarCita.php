<?php
require('Vista/FPDF/fpdf.php'); // Esta es la ruta donde se encuentra la librería

// Obtener los datos desde base de datos
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

// Crear clase extendida para agregar número de página
class PDF extends FPDF {
    function Footer() {
        // Posición a 1.5 cm del fondo
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear PDF 
$pdf = new PDF();
$pdf->SetLeftMargin(40); //este es el valor del margen izq. en mm
$pdf->AddPage(); //añade una pagina

// Título (color azul, centrado)
$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Ficha de Cita Odontológica'), 0, 1, 'C');
$pdf->Ln(10);

// Subtítulo: Datos del Paciente (negrita, negro, centrado)
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos del Paciente'), 0, 1, 'C');

// Contenido
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode("Documento: $pacDocumento"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Nombre: $pacNombre"), 0, 1);
$pdf->Ln(5);

// Subtítulo: Datos del Médico
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos del Médico'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode("Documento: $medDocumento"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Nombre: $medNombre"), 0, 1);
$pdf->Ln(5);

// Subtítulo: Datos de la Cita
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos de la Cita'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode("Número: $citaNumero"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Fecha: $citaFecha"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Hora: $citaHora"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Consultorio: $consultorio"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Estado: $estadoCita"), 0, 1);
$pdf->MultiCell(0, 10, utf8_decode("Observaciones: $observaciones"));

// Guardar PDF
$archivoPDF = 'Vista/FPDF/PdfCitas/cita_' . $citaNumero . '.pdf';
$pdf->Output('F', $archivoPDF);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <script>
        // Descargar automáticamente
        window.onload = function () {
            const link = document.createElement('a');
            link.href = '<?php echo $archivoPDF; ?>';
            link.download = 'Ficha_Cita_<?php echo $citaNumero; ?>.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        };
    </script>
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
            <h1>Ficha de la cita generada correctamente</h1>
            <p>El PDF fue generado y descargado automáticamente. Si no se descargó, <a href="<?php echo $archivoPDF; ?>" download>haz clic aquí</a>.</p>
            <?php $fila = $result->fetch_object();?>
            <h2>Información Cita</h2>
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
                    <th colspan="2">Datos del Médico</th>
                </tr>
                <tr>
                    <td>Documento</td>
                    <td><?php echo $fila->MedIdentificacion;?></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $fila->MedNombres . " " . $fila->MedApellidos;?></td>
                </tr>
                <tr>
                    <th colspan="2">Datos de la Cita</th>
                </tr>
                <tr>
                    <td>Número</td>
                    <td><?php echo $fila->CitNumero;?></td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><?php echo $fila->CitFecha;?></td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td><?php echo $fila->CitHora;?></td>
                </tr>
                <tr>
                    <td>Número de Consultorio</td>
                    <td><?php echo $fila->ConNombre;?></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td><?php echo $fila->CitEstado;?></td>
                </tr>
                <tr>
                    <td>Observaciones</td>
                    <td><?php echo $fila->CitObservaciones;?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
<?php 
?>
  
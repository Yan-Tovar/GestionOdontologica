<?php
require_once('Vista/FPDF/fpdf.php');

// Simulación de objeto $fila (aquí deberías usar fetch desde tu base de datos)
$fila = $result->fetch_object();

// Datos del Paciente
$pacDocumento = $fila->PacIdentificacion;
$pacNombre = $fila->PacNombres . " " . $fila->PacApellidos;

// Datos del Médico
$medDocumento = $fila->MedIdentificacion;
$medNombre = $fila->MedNombres . " " . $fila->MedApellidos;

// Datos de la Cita
$citaNumero = $fila->CitNumero;
$citaFecha = $fila->CitFecha;
$citaHora = $fila->CitHora;
$consultorio = $fila->ConNombre;
$estadoCita = $fila->CitEstado;
$observaciones = $fila->CitObservaciones;


// Variables PHP
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

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Ficha de Cita Odontologica', 0, 1, 'C');
$pdf->Ln(10);

// Datos del paciente
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Datos del Paciente', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Documento: $pacDocumento", 0, 1);
$pdf->Cell(0, 10, "Nombre: $pacNombre", 0, 1);
$pdf->Ln(5);

// Datos del médico
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(0, 0, 255); // Azul en RGB
$pdf->Cell(0, 10, 'Datos del Médico', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Documento: $medDocumento", 0, 1);
$pdf->Cell(0, 10, "Nombre: $medNombre", 0, 1);
$pdf->Ln(5);

// Datos de la cita
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Datos de la Cita', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Número: $citaNumero", 0, 1);
$pdf->Cell(0, 10, "Fecha: $citaFecha", 0, 1);
$pdf->Cell(0, 10, "Hora: $citaHora", 0, 1);
$pdf->Cell(0, 10, "Consultorio: $consultorio", 0, 1);
$pdf->Cell(0, 10, "Estado: $estadoCita", 0, 1);
$pdf->MultiCell(0, 10, "Observaciones: $observaciones");

$pdf->Output();
?>

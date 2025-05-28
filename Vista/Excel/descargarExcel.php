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

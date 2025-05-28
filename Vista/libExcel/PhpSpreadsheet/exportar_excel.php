<?php
require 'autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'citas');
$conn->set_charset("utf8");

// Consulta a la base de datos
$resultado = $conn->query("SELECT CitNumero, CitFecha, CitHora, CitPaciente, CitMedico, CitConsultorio, CitEstado, CitObservaciones FROM citas");

// Crear documento Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Cabeceras
$sheet->setCellValue('A1', 'Numero');
$sheet->setCellValue('B1', 'Fecha');
$sheet->setCellValue('C1', 'Hora');
$sheet->setCellValue('D1', 'IdPaciente');
$sheet->setCellValue('E1', 'IdMedico');
$sheet->setCellValue('F1', 'IdConsultorio');
$sheet->setCellValue('G1', 'Estado');
$sheet->setCellValue('H1', 'Observaciones');

// Agregar datos
$fila = 2;
while ($row = $resultado->fetch_assoc()) {
    $sheet->setCellValue("A$fila", $row['ConNumero']);
    $sheet->setCellValue("B$fila", $row['ConFecha']);
    $sheet->setCellValue("C$fila", $row['ConHora']);
    $sheet->setCellValue("D$fila", $row['ConPaciente']);
    $sheet->setCellValue("E$fila", $row['ConMedico']);
    $sheet->setCellValue("F$fila", $row['ConConsultorio']);
    $sheet->setCellValue("G$fila", $row['ConEstado']);
    $sheet->setCellValue("H$fila", $row['ConObservaciones']);
    $fila++;
}

// Descargar Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="usuarios.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

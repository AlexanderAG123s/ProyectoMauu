<?php
// Incluir la librería FPDF
require('fpdf/fpdf.php');

include_once('modelo/conexion.php');

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();



// Añadir las imágenes (ajustar la ruta de las imágenes según sea necesario)
$pdf->Image('escudo.png', 10, 10, 20);
$pdf->Image('cecy.png', 85, 10, 20);
$pdf->Image('dino.png', 160, 10, 20);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Ln(30); // Salto de línea

// Título del examen
$pdf->Cell(0, 10, 'Examen de ' . $examen['asignatura'], 0, 1, 'C');
$pdf->Ln(5);

// Datos del examen
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Profesor: ' . $examen['profesor'], 0, 1);
$pdf->Cell(0, 10, 'Fecha: ' . $examen['fecha'], 0, 1);
$pdf->Cell(0, 10, 'Alumno: ' . $alumno['nombre'], 0, 1);
$pdf->Ln(10);

// Instrucciones
$pdf->SetFont('Arial', 'I', 12);
$pdf->MultiCell(0, 10, 'Instrucciones: ' . $examen['instrucciones']);
$pdf->Ln(10);

// Añadir las preguntas
$pregunta_num = 1;
while ($pregunta = $result_preguntas->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, "$pregunta_num. " . $pregunta['pregunta']);
    $pdf->Cell(0, 10, 'A. ' . $pregunta['opcionA'], 0, 1);
    $pdf->Cell(0, 10, 'B. ' . $pregunta['opcionB'], 0, 1);
    $pdf->Cell(0, 10, 'C. ' . $pregunta['opcionC'], 0, 1);
    $pdf->Ln(10);

    $pregunta_num++;

    // Si las preguntas llenan la página, añadir nueva página
    if ($pdf->GetY() > 260) {
        $pdf->AddPage();
        $pdf->Image('../PDF/escudo.png', 10, 10, 20);
        $pdf->Image('../PDF/cecy.png', 85, 10, 20);
        $pdf->Image('../PDF/dino.png', 160, 10, 20);
        $pdf->Ln(30);
    }
}

// Guardar el PDF
$pdf->Output('../', 'examen.pdf');

?>
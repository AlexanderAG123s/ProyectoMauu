<?php 
include_once ('../Modelo/Examen.php');
require('../PDF/fpdf/fpdf.php');
$examen = new Examen();

if ($_POST['funcion'] == 'rellenar_check') {
    $examen->rellenar_check();
    $json = array();
    foreach ($examen -> objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'titulo' => $objeto-> titulo,
            'asignatura' => $objeto->asignatura
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'generar_examen') {
    session_start();
    $examen->generar_pdf();
    
    
       // Asigna el resto de las variables de manera similar para las demás tablas
       class PDF extends FPDF
       {
           function Header()
           {
               // Logo en el encabezado
               $this->Image('../img/headers.jpeg', 0, 5, 210, 25);
               $this->Ln(10); // Salto de línea después de imprimir el header
           }
       }
       // Crear una instancia de FPDF
       $pdf = new PDF();
       $pdf->AddPage();
       $pdf->Header(); // Imprime el header solo una vez
       $pdf->SetFont('Arial', '', 12);
       
       // Resto del código para generar el PDF
       $topMargin = 35; // Márgen superior
       $leftMargin = 10; // Márgen izquierdo
       $rightMargin = 10; // Márgen derecho
       $bottomMargin = 25; // Margen inferior

    // Load the HTML template
    // Añadir las imágenes (ajustar la ruta de las imágenes según sea necesario)
    // $pdf->Image('../img/headers.jpeg', 10, 10, 190);
    
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Ln(5); // Salto de línea
    
    // Título del examen
    $pdf->Cell(0, 10, 'Examen de Fisica', 0, 1, 'C');
    $pdf->Ln(0);
    
    // Datos del examen
    $pdf->SetFont('Arial', '', 12, '', true); // Add the fifth parameter as true to enable UTF-8
    $pdf->Cell(0, 10, 'Alumno: ________________________________________________' , 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Profesor: '. $_SESSION['nombre']) , 0, 1);
    
    $pdf->Cell(0, 10, 'Fecha: _______________', 0, 1);
    $pdf->Ln(5);

   
   // Instrucciones
   $pdf->SetFont('Arial', 'I', 12);
   $pdf->MultiCell(0, 10, 'Instrucciones: ');
   $pdf->SetFont('Arial', 'U', 12);
   $pdf->MultiCell(0, 10, utf8_decode( 'Instrucciones generales: Conesta el examen en hojas que deberán llevar tu nombre complejo cada una de las que utilices para contestar el examen'));
   $pdf->Ln(5);

   $i = 0;
   $p = 0;
   $abc = ['A', 'B', 'C'];

   foreach ($examen->objetos as $objeto) {
       $i++;
       $options = $abc; // Reset the array for each question
       $option1 = array_shift($options);
       $option2 = array_shift($options);
       $option3 = array_shift($options);
   
       $pdf->SetFont('Arial', 'B', 10, '', true); // Add the fifth parameter as true to enable UTF-8
       $pdf->MultiCell(200, 10, $i.'.- '. utf8_decode($objeto->question), 0, 'L'); // Use MultiCell with a width of 0, which means the cell will take up the full width of the page
       $pdf->Ln(0.2); // Add a small line break between questions
       $pdf->SetFont('Arial', '', 10, '', true); // Add the fifth parameter as true to enable UTF-8
       $pdf->SetFont('Arial', '', 12, '', true); // Add the fifth parameter as true to enable UTF-8
       $pdf->Cell(55, 10, $option1.'.- '.$objeto->respuesta_f, 0, 0, 'L'); // Imprime la primera respuesta
       $pdf->Cell(55, 10, $option2.'.- '.$objeto->respuesta_f2, 0, 0, 'L'); // Imprime la segunda respuesta
       $pdf->Cell(55, 10, $option3.'.- '.$objeto->respuesta_c, 0, 1, 'L'); // Imprime la tercera respuesta y avanza a la siguiente línea
   }
   
   $pdf->Output('examen.pdf', 'I'); // Save the PDF to a file on the server
   echo '../PDF/Output/'.$_POST['funcion'].'.pdf'; // Return the URL to the PDF file
   
}

if ($_POST['funcion'] == 'generar_examen_r') {
    session_start();
    $examen->generar_pdf_r();

    
    header('Content-Type: text/html; charset=UTF-8');
    
   
    $pdf = new FPDF('P', 'mm', 'A4', true, 'UTF-8');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12, '', true); // Add the fifth parameter as true to enable UTF-8
   // Load the HTML template
   // Añadir las imágenes (ajustar la ruta de las imágenes según sea necesario)
   $pdf->Image('../PDF/escudo.png', 10, 10, 20);
   $pdf->Image('../PDF/cecy.png', 85, 10, 20);
   $pdf->Image('../PDF/dino.png', 160, 10, 20);

   $pdf->SetFont('Arial', 'B', 14);
   $pdf->Ln(30); // Salto de línea

   // Título del examen
   $pdf->Cell(0, 10, 'Examen de Fisica', 0, 1, 'C');
   $pdf->Ln(5);

   // Datos del examen
   $pdf->SetFont('Arial', '', 12, '', true); // Add the fifth parameter as true to enable UTF-8
   $pdf->Cell(0, 10, 'Alumno: ________________________________________________' , 0, 1);
   $pdf->Cell(0, 10, utf8_decode('Profesor: '. $_SESSION['nombre']) , 0, 1);
   
   $pdf->Cell(0, 10, 'Fecha: ' . date("d/m/Y"), 0, 1);
  $pdf->Ln(5);

  
  // Instrucciones
  $pdf->SetFont('Arial', 'I', 12);
  $pdf->MultiCell(0, 10, 'Instrucciones: ');
  $pdf->SetFont('Arial', 'U', 12);
  $pdf->MultiCell(0, 10, utf8_decode( 'Instrucciones generales: Conesta el examen en hojas que deberán llevar tu nombre complejo cada una de las que utilices para contestar el examen'));
  $pdf->Ln(10);

   $i = 0;
   $p = 0;
   $abc = ['A', 'B', 'C'];

   foreach ($examen->objetos as $objeto) {
       $i++;
       $options = $abc; // Reset the array for each question
       $option1 = array_shift($options);
       $option2 = array_shift($options);
       $option3 = array_shift($options);
   
       $pdf->SetFont('Arial', 'B', 12, '', true); // Add the fifth parameter as true to enable UTF-8
       $pdf->MultiCell(0, 10, $i.'.- '. utf8_decode($objeto->question), 0, 'L'); // Use MultiCell with a width of 0, which means the cell will take up the full width of the page
       $pdf->Ln(5); // Add a small line break between questions
       $pdf->SetFont('Arial', '', 12, '', true); // Add the fifth parameter as true to enable UTF-8
       $pdf->MultiCell(0, 10, utf8_decode($option1.'.- '.$objeto->respuesta_f), 0, 'L');
       $pdf->Ln(5);
   
       $pdf->MultiCell(0, 10, $option2.'.- '.$objeto->respuesta_f2, 0, 'L');
       $pdf->Ln(5);
   
       $pdf->MultiCell(0, 10, $option3.'.- '.$objeto->respuesta_c, 0, 'L');
       $pdf->Ln(10); // Add a larger line break between questions
   }
   
   $pdf->Output('examen.pdf', 'I'); // Save the PDF to a file on the server
   echo '../PDF/Output/'.$_POST['funcion'].'.pdf'; // Return the URL to the PDF file
   
}
if($_POST['funcion']  == 'random') {
    $examen->rellenar_parcial_r();
    $json = array();
    foreach ($examen -> objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id,
            'descripcion' =>$objeto->descripcion,
            
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>
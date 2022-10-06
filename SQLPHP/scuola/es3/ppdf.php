<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,50,'Google!');
$pdf->Image('google.png',15,15,15,15,'PNG');
$pdf->Output();
?>
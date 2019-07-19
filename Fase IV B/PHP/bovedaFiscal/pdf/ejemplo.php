<?php 

include '../controlador/reportes/plantilla.php';
include '../modelo/Factura.php';
require '../modelo/conexion/conexionBD.php';

$pdf= new PDF();
$pdf->addPage();

$pdf->SetFillColor(232,232,232);
$pdf->setFont('Arial','B',15);
$pdf->Cell(100,6,'Empresas',1,0,'C',1);

$pdf->Output();

 ?>
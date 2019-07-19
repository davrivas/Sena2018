<?php
include '../acciones/plantilla-pdf.php';
require '../acciones/Conexion.php';

$conexion = getConexion();
$sqlVehiculos = "SELECT * from tbl_vehiculos";
$vehiculo = $conexion->query($sqlVehiculos);

$pdf = new PDF();
$pdf->AddPage('L');
$pdf->AliasNbPages();
$pdf->SetFillColor(255, 25, 50);
$pdf->setFont('Arial', 'B', 9);
$pdf->Cell(92, 10, 'Marca', 1, 0, 'C', 1);
$pdf->Cell(92, 10, 'Modelo', 1, 0, 'C', 1);
$pdf->Cell(92, 10, 'Precio', 1, 1, 'C', 1);
$pdf->setFont ('Arial','',8);

foreach ($vehiculo as $vh){
    $pdf->Cell(92, 10, $vh['marca_vehiculo'], 1, 0, 'C', 0);
    $pdf->Cell(92, 10, $vh['modelo_vehiculo'], 1, 0, 'C', 0);
    $pdf->Cell(92, 10, "$" . $vh['precio_vehiculo'], 1, 1, 'C', 0);
    
}
$pdf->Output();

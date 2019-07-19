<?php

include ('../controlador/reportes/plantilla.php');
require_once ('../controlador/facturaControlador.php');

$pdf = new PDF();
$pdf->AddPage('L');
$pdf->AliasNbPages();
$pdf->SetFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(25, 10, 'Nombre Producto', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Valor Unitario', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'SubTotal', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Iva', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Total', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Fecha de Emision', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Fecha de Pago', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Tipo Factura', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Receptor', 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 8);

foreach ($misFacturas as $f) {
    $receptor = $f['receptorNit'] . " " . $f['receptorRazonSocial'];
    $pdf->Cell(25, 10, $f['nombreProducto'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $f['cantidad'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, '$' . $f['valorUnitario'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, '$' . $f['total'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, '$' . $f['totalIvaRecaudado'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, '$' . $f['montoTotalAPagar'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $f['fechaEmision'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $f['fechaPago'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $f['tipoFactura'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $receptor, 1, 1, 'C', 0);
}

$pdf->Output();
?>

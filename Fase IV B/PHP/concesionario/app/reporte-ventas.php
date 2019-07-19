<?php

include '../acciones/plantilla-pdf.php';
require '../acciones/Conexion.php';


$conexion = getConexion();
$sqlVentas = "SELECT vn.*, cl.*, cn.*, vh.* FROM tbl_concesionarios AS cn "
        . "INNER JOIN tbl_vehiculos AS vh ON vh.codigo_concesionario = cn.nit_concesionario "
        . "INNER JOIN tbl_ventas AS vn ON vn.id_vehiculo = vh.codigo_vehiculo "
        . "INNER JOIN tbl_clientes AS cl ON cl.id_cliente = vn.id_cliente";
$ventas = $conexion->query($sqlVentas);

$pdf = new PDF();
$pdf->AddPage('L');
$pdf->AliasNbPages();
$pdf->SetFillColor(255, 25, 50);
$pdf->setFont('Arial', 'B', 9);
$pdf->Cell(39, 10, 'ID', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Fecha', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Marca', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Modelo', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Precio', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Cliente', 1, 0, 'C', 1);
$pdf->Cell(39, 10, 'Concesionario', 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 8);

foreach ($ventas as $v) {
    $pdf->Cell(39, 10, $v['id_venta'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, $v['fecha_venta'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, $v['marca_vehiculo'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, $v['modelo_vehiculo'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, "$" . $v['precio_vehiculo'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, $v['nombre_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(39, 10, $v['nombre_concesionario'], 1, 1, 'C', 0);
}

$pdf->Output();
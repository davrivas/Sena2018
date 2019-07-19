<?php

@session_start();
require_once ('../../modelo/Factura.php');

$producto = $_POST['nombreProducto'];
$cantidad = $_POST['cantidad'];
$valorUnitario = $_POST['valorUnitario'];
$fechaEmision = $_POST['fechaEmision'];
$fechaPago = $_POST['fechaPago'];
$tipoFactura = $_POST['tipoFactura'];
$receptor = $_POST['receptor'];

$facturaObj = new Factura();
$facturaObj->crearFactura($producto, $cantidad, $valorUnitario, $fechaEmision, $fechaPago, $tipoFactura, $receptor, $_SESSION['idEmisor']);

header('Location: ../../empresa/index.php');
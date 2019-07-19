<?php

@session_start();

require_once ('../modelo/Factura.php');
$facturaObj = new Factura();
$misFacturas = $facturaObj->misFacturas($_SESSION['idEmisor']);
$topFacturas = $facturaObj->top50();
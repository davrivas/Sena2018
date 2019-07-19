<?php

require './Conexion.php';

$conexion = getConexion();

$fecha = $_POST['fecha'];
$vehiculo = $_POST['vehiculo'];
$cliente = $_POST['cliente'];
$sql = "INSERT INTO tbl_ventas(fecha_venta, id_vehiculo, id_cliente) "
        . "VALUES('$fecha', $vehiculo, $cliente)";

$conexion->query($sql);

header('Location: ../app/index.php');
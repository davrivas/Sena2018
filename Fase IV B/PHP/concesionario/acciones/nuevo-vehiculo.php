<?php

require './Conexion.php';

$conexion = getConexion();

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$concesionario = $_POST['concesionario'];
$sql = "INSERT INTO tbl_vehiculos(marca_vehiculo, modelo_vehiculo, "
        . "precio_vehiculo, codigo_concesionario) "
        . "VALUES('$marca', $modelo, $precio, $concesionario)";

$conexion->query($sql);

header('Location: ../app/vehiculos.php');
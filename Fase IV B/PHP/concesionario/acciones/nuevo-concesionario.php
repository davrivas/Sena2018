<?php

require './Conexion.php';
$objConexion = new Conexion();
$conexion = getConexion();

$nit = $_POST['nit'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$sql = "INSERT INTO tbl_concesionarios "
        . "VALUES($nit, '$nombre', '$telefono', '$direccion')";

$conexion->query($sql);

header('Location: ../app/concesionarios.php');
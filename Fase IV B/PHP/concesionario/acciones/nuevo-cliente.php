<?php

require './Conexion.php';

$conexion = getConexion();

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$sql = "INSERT INTO tbl_clientes(nombre_cliente, telefono_cliente, direccion_cliente) "
        . "VALUES('$nombre', $telefono, '$direccion')";

$conexion->query($sql);

header('Location: ../app/clientes.php');
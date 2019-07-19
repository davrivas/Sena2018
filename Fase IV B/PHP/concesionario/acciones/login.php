<?php
session_start();
require './Conexion.php';
$conexion = getConexion();

$correoElectronico = $_POST['correo-electronico'];
$clave = $_POST['clave'];
$sql = "SELECT * FROM tbl_administradores WHERE correo_electronico_admin = '$correoElectronico' AND clave_admin = '$clave'";

$admin = $conexion->query($sql);

if ($admin->num_rows == 1) {
    $_SESSION['admin'] = $correoElectronico;
    header('Location: ../app/index.php');
} else {
    echo "<script>"
    . "alert('Administrador no existe');"
    . "window.location.href='../index.php'"
    . "</script>";
}
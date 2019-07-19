<?php

require_once ('../../modelo/Emisor.php');


$nit = $_POST['nit'];
$rs = $_POST['rs'];
$rl = $_POST['rl'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$web = $_POST['web'];

if (!isset($_POST['web'])) {
    $web = "";
}

$emisorObj = new Emisor();
$emisorObj->nuevoEmisor($nit, $rs, $rl, $telefono, $direccion, $correo, $clave, $web);
echo "<script>"
 . "alert('Registro exitoso');"
 . "window.location.href='../../index.php';"
 . "</script>";

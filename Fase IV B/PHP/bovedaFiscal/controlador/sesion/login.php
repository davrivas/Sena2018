<?php

@session_start();

require_once ('../../modelo/Emisor.php');

$correo = $_POST['correo'];
$clave = $_POST['clave'];
$emisorObj = new Emisor();
$emisor = $emisorObj->emisorCorreoClave($correo, $clave);

if (empty($emisor)) {
    echo "<script>"
    . "alert('El usuario no existe');"
    . "window.location.href='../../index.php';"
    . "</script>";
} else {
    $_SESSION = $emisor;
    $rs = $_SESSION['emisorRazonSocial'];

    switch ($_SESSION['idTipoUsuario']) {
        case 1:
            echo "<script>"
            . "alert('Bienvenido $rs');"
            . "window.location.href='../../empresa/index.php';"
            . "</script>";
            break;
        case 2:
            echo "<script>"
            . "alert('Bienvenido $rs');"
            . "window.location.href='../../dian/index.php';"
            . "</script>";
            break;
    }
}


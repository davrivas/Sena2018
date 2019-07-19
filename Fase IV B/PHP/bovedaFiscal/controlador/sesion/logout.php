<?php

session_start();

if (isset($_SESSION['idTipoUsuario'])) {
    session_destroy();
    header('Location: ../../index.php');
}

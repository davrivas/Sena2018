<?php

@session_start();

require_once('../modelo/Permiso.php');
$permisoObj = new Permiso();
$permisos = $permisoObj->todosLosPermisos($_SESSION['idTipoUsuario']);
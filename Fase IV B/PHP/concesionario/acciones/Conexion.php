<?php

function getConexion() {
    $conexion = new mysqli("localhost", "root", "", "db_concesionario");
    
    if ($conexion->connect_errno) {
        echo "Error de conexión a la Base de datos " . $conexion->connect_error;
        exit();
    }

    return $conexion;
}

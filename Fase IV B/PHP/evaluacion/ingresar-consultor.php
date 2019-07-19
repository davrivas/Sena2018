<?php
    extract($_REQUEST);

    require "conexion.php";

    $objConexion = new mysqli($host,$user,$password,$baseDatos);

    if ($objConexion->connect_errno) {
        echo "Error de conexión a la Base de datos " . $objConexion->connect_error;
    }

    $sql = "INSERT INTO tbl_consultores(nombre_consultor, apellido_consultor) VALUES('$_REQUEST[nombreConsultor]','$_REQUEST[apellido]')";

    $objConexion->query($sql);

    header("Location: listar-consultores.php");
?>
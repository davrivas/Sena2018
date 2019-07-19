<?php
    extract($_REQUEST);

    require "conexion.php";

    $objConexion = new mysqli($host,$user,$password,$baseDatos);

    if ($objConexion->connect_errno) {
        echo "Error de conexión a la Base de datos " . $objConexion->connect_error;
    }

    if (isset($_REQUEST['descripcion'])) {
        $sql = "INSERT INTO tbl_proyectos(nombre_proyecto, precio, descripcion) VALUES('$_REQUEST[nombreProyecto]','$_REQUEST[precio]','$_REQUEST[descripcion]')";
    } else {
        $sql = "INSERT INTO tbl_proyectos(nombre, precio) VALUES('$_REQUEST[nombreProyecto]','$_REQUEST[precio]')";
    }

    

    $objConexion->query($sql);

    header("Location: listar-proyectos.php");
?>
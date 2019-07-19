<?php
    extract($_REQUEST);

    require "conexion.php";

    $objConexion = new mysqli($host,$user,$password,$baseDatos);

    if ($objConexion->connect_errno) {
        echo "Error de conexión a la Base de datos " . $objConexion->connect_error;
    }

    $sql = "INSERT INTO tbl_ventas(id_cliente, id_proyecto, id_consultor, costo_asociado, fecha_inicio, fecha_fin) VALUES('$_REQUEST[cliente]','$_REQUEST[proyecto]','$_REQUEST[consultor]','$_REQUEST[costo]','$_REQUEST[fechaInicio]','$_REQUEST[fechaFinal]')";    

    $objConexion->query($sql);

    header("Location: listar-ventas.php");
?>
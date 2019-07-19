<?php
    extract($_REQUEST);

    require "conexion.php";

    $objConexion = new mysqli($host,$user,$password,$baseDatos);

    if ($objConexion->connect_errno) {
        echo "Error de conexión a la Base de datos " . $objConexion->connect_error;
    }

    if (isset($_REQUEST['telefonos'])) {
        $sql = "INSERT INTO tbl_clientes(nombre_empresa, direccion, cif, telefonos) VALUES('$_REQUEST[nombreEmpresa]','$_REQUEST[direccion]','$_REQUEST[cif]','$_REQUEST[telefonos]')";
    } else {
        $sql = "INSERT INTO tbl_clientes(nombre_empresa, direccion, cif) VALUES('$_REQUEST[nombreEmpresa]','$_REQUEST[direccion]','$_REQUEST[cif]')";
    }

    $objConexion->query($sql);

    header("Location: listar-clientes.php");
?>
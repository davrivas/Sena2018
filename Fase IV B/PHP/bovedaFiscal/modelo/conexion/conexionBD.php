<?php

class Conectar {

    public static function conexion() {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=bovedaFiscal', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->EXEC("SET CHARACTER SET UTF8");
        } catch (Exception $e) {
            die("Error en la conexion" . $e->getMessage());
            echo "Linea de error" . $e->getLine();
        }
        
        return $conexion;
    }

}

<?php

require_once('AbstractModelo.php');

class Factura extends AbstractModelo {
    
    private $misFacturas;
    private $facturaPorNitRS;
    private $top50;

    public function __construct() {
        parent::__construct("facturas", "idEstadoFactura");
        $this->misFacturas = array();
        $this->facturaPorNitRS = array();
        $this->top50 = array();
    }
    
    public function crearFactura($producto, $cantidad, $valorUnitario, $fechaEmision, 
            $fechaPago, $tipoFactura, $receptor, $emisor) {
          try {
            $total = $cantidad * $valorUnitario;
            $iva = $total * 0.16;
            $totalMonto = $total + $iva;
            
            $sql = "INSERT INTO $this->tabla(nombreProducto, cantidad, valorUnitario, "
                    . "total, totalIvaRecaudado, montoTotalAPagar, fechaEmision, fechaPago, "
                    . "idTipoFactura, idEstadoFactura, idReceptor, idEmisor) "
                    . "VALUES (:producto, :cantidad, :valorUnitario, :total,"
                    . ":iva, :totalMonto, :fechaEmision, :fechaPago, :tipoFactura, "
                    . "1, :receptor, :emisor)";
            $consulta = $this->db->prepare($sql);
            $consulta->bindParam(':producto', $producto);
            $consulta->bindParam(':cantidad', $cantidad);
            $consulta->bindParam(':valorUnitario', $valorUnitario);
            $consulta->bindParam(':total', $total);
            $consulta->bindParam(':iva', $iva);
            $consulta->bindParam(':totalMonto', $totalMonto);
            $consulta->bindParam(':fechaEmision', $fechaEmision);
            $consulta->bindParam(':fechaPago', $fechaPago);
            $consulta->bindParam(':tipoFactura', $tipoFactura);
            $consulta->bindParam(':receptor', $receptor);
            $consulta->bindParam(':emisor', $emisor);
            $consulta->execute();
            echo "Factura creada con exito";
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
        
    }
    
    public function misFacturas($id) {
        $sql = "SELECT f.*, ef.*, tf.*, e.*,r.* "
                . "FROM $this->tabla as f "
                . "INNER JOIN estadoFacturas as ef ON f.idEstadoFactura = ef.idEstadoFactura "
                . "INNER JOIN tipoFacturas as tf ON f.idTipoFactura = tf.idTipoFactura "
                . "INNER JOIN emisores as e ON f.idEmisor = e.idEmisor "
                . "INNER JOIN receptores as r ON f.idReceptor = r.idReceptor "
                . "WHERE f.idEmisor = $id "
                . "ORDER BY f.fechaEmision DESC";
        $consulta = $this->db->query($sql);

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->misFacturas [] = $filas;
        }

        return $this->misFacturas;
    }
    
    public function facturaPorNitRS($param) {
        $sql = "SELECT f.*, ef.*, tf.*, e.*,r.* "
                . "FROM $this->tabla as f "
                . "INNER JOIN estadoFacturas as ef ON f.idEstadoFactura = ef.idEstadoFactura "
                . "INNER JOIN tipoFacturas as tf ON f.idTipoFactura = tf.idTipoFactura "
                . "INNER JOIN emisores as e ON f.idEmisor = e.idEmisor "
                . "INNER JOIN receptores as r ON f.idReceptor = r.idReceptor "
                . "WHERE e.emisorNit = '$param' OR e.emisorRazonSocial LIKE '%$param%'";
        $consulta = $this->db->query($sql);

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->facturaPorNitRS [] = $filas;
        }

        return $this->facturaPorNitRS;
    }
    
    public function top50() {
        $sql = "SELECT f.*, ef.*, tf.*, e.*,r.* "
                . "FROM $this->tabla as f "
                . "INNER JOIN estadoFacturas as ef ON f.idEstadoFactura = ef.idEstadoFactura "
                . "INNER JOIN tipoFacturas as tf ON f.idTipoFactura = tf.idTipoFactura "
                . "INNER JOIN emisores as e ON f.idEmisor = e.idEmisor "
                . "INNER JOIN receptores as r ON f.idReceptor = r.idReceptor "
                . "ORDER BY montoTotalAPagar DESC "
                . "LIMIT 50";
        $consulta = $this->db->query($sql);

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->top50 [] = $filas;
        }

        return $this->top50;
    }

}

?>

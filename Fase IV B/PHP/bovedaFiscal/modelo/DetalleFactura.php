<?php

require_once('AbstractModelo.php');

class DetalleFactura extends AbstractModelo {
    
    private $detallesFactura;

    public function __construct() {
        parent::__construct("detalleFacturas", "idDetalleFactura");
        $this->detallesFactura = array();
    }
    
    public function crear() {
        
    }
    
    public function mostrarDetallesFactura($id) {
        $consulta = $this->db->query("SELECT * FROM $this->tabla WHERE idFactura = $id");

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->detallesFactura[] = $filas;
        }

        return $this->detallesFactura;
    }

}

?>

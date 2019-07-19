<?php

require_once('AbstractModelo.php');

class TipoFactura extends AbstractModelo {

    private $empresasSinEmisor;

    public function __construct() {
        parent::__construct("tipoFacturas", "idTipoFactura");
        $this->empresasSinEmisor = array();
    }

    public function actualizar() {
        
    }

    public function crear() {
        
    }

}

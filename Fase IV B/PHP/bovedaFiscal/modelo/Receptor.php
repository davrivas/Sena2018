<?php

require_once('AbstractModelo.php');

class Receptor extends AbstractModelo {

    public function __construct() {
        parent::__construct("receptores", "idReceptor");
    }

}

?>

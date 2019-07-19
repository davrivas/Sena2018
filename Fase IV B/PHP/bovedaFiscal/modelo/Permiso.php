<?php

require_once('AbstractModelo.php');

class Permiso extends AbstractModelo {
    
    private $permisos;

    public function __construct() {
        parent::__construct("permisos", "idPermiso");
        $this->permisos = array();
    }

    public function actualizar() {
        
    }

    public function crear() {
        
    }
    
    public function todosLosPermisos($tipoUsuario) {
        $consulta = $this->db->query("SELECT * FROM $this->tabla WHERE idTipoUsuario = $tipoUsuario");

        while ($permiso = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->permisos[] = $permiso;
        }

        return $this->permisos;
    }

}

?>

<?php

require_once('AbstractModelo.php');

class Emisor extends AbstractModelo {

    public function __construct() {
        parent::__construct("emisores", "idEmisor");
    }

    public function nuevoEmisor($nit, $rs, $rl, $telefono, $direccion, $correo, $clave, $web) {
        try {
            $sql = "INSERT INTO $this->tabla(emisorNit, emisorRazonSocial, emisorNombreRepresentante, "
                    . "emisorNumeroTelefonico, emisorDireccion, emisorCorreoElectronico, "
                    . "emisorClave, emisorSitioWeb, idTipoUsuario) "
                    . "VALUES (:nit, :rs, :rl, :telefono, :direccion, :correo, :clave, :web, 1)";
            $consulta = $this->db->prepare($sql);
            $consulta->bindParam(':nit', $nit);
            $consulta->bindParam(':rs', $rs);
            $consulta->bindParam(':rl', $rl);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':direccion', $direccion);
            $consulta->bindParam(':correo', $correo);
            $consulta->bindParam(':clave', $clave);
            $consulta->bindParam(':web', $web);
            $consulta->execute();
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public function emisorCorreoClave($correo, $clave) {
        try {
            $sql = "SELECT e.*, tu.* "
                    . "FROM $this->tabla AS e "
                    . "INNER JOIN tipoUsuarios AS tu ON e.idTipoUsuario = tu.idTipoUsuario "
                    . "WHERE emisorCorreoElectronico = '$correo' AND emisorClave = '$clave'";
            $consulta = $this->db->query($sql);
            $consulta->execute();
            return $consulta->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public function emisorNitRazonSocial($param) {
        try {
            $sql = "SELECT * FROM $this->tabla "
                    . "WHERE emisorNit = '$param' OR emisorRazonSocial LIKE '%$param%'";
            $consulta = $this->db->query($sql);
            $consulta->execute();
            return $consulta->fetch();
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
            return null;
        }
    }

}

?>

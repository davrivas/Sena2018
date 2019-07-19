<?php

abstract class AbstractModelo {

    protected $db;
    protected $todos;
    protected $tabla;
    protected $id;
    protected $contar;

    public function __construct($tabla, $id) {
        require_once('conexion/conexionBD.php');
        $this->db = Conectar::conexion();
        $this->todos = array();
        $this->tabla = $tabla;
        $this->id = $id;
        $this->contar = array();
    }

    public function todos() {
        $consulta = $this->db->query("SELECT * FROM $this->tabla");

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->todos[] = $filas;
        }

        return $this->todos;
    }

    public function buscarPorId($id) {
        $consulta = $this->db->query("SELECT * FROM $this->tabla WHERE $this->id = $id LIMIT 1");
        $consulta->execute();
        return $consulta->fetch();
    }
    
//    public function eliminar($id) {
//        $consulta = $this->db->query("DELETE FROM $this->tabla WHERE $this->id = $id");
//        $consulta->execute();
//    }
    
    public function contar() {
        $consulta = $this->db->query("SELECT  COUNT(*) FROM $this->tabla");
        $consulta->execute();
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mimodelo extends CI_Model {

    // Constructor
    public function __construct() {
        $this->load->database();
    }    

    public function getCategorias($id=false) {
        // select * from categorias;
        if ($id!=false) {
            $this->db->where('id_categorias', $id);
        }
        $resultado = $this->db->get('categorias');
        if ($resultado->num_rows()>0)
            return $resultado;
        else
            return false;
    }

    public function addCategoria($valores) {
        // insert into categorias values (...);
        $this->db->insert('categorias', $valores);
    }

    public function lessCategoria($id) {
        // insert into categorias values (...);
        $this->db->where('id_categorias', $id);
        $this->db->delete('categorias');
    }

    public function updateCategoria($id, $data) {
        $this->db->where('id_catagorias', $id);
        $this->db->update('categorias', $data);
    }

}
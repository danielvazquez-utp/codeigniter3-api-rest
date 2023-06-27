<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mimodelo');
        $this->load->helper('url');
    }

    public function bienvenida()
	{
		$this->load->view('Productos/bienvenida_view');
	}

    public function listaCategorias() {
        
        $categorias = $this->Mimodelo->getCategorias();

        $data = array(
            'categorias'    =>  $categorias,
        );

        $this->load->view('Productos/categorias_view', $data);

    }

    public function insertarCategoria() {
        $valores = array(
            'activo'   =>   $this->input->post('status'),
            'fecha'    =>  date("Y-m-d H:i:s"),
            'nombre'   =>   $this->input->post('nombre'),
        );
        $this->Mimodelo->addCategoria($valores);
    }

    public function insertar_categoria() {
        $this->load->view('Productos/insertar_categoria_view');
    }

    public function eliminarCategoria() {
        $id = $this->uri->segment(2);
        $this->Mimodelo->lessCategoria($id);
        redirect(base_url('index.php/Productos/listaCategorias'));
    }

    public function actualizarCategoria() {
        $id = $this->uri->segment(2);
        $categorias = $this->Mimodelo->getCategorias($id);
        $categoria = ( $categorias!=false ) ?  $categorias->row(0) : false; 
        $data = array(
            'categoria' =>  $categoria,
        );

        $this->load->view('Productos/actualizar_categoria_view', $data);
    }

}
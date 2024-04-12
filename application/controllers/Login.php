<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mimodelo');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $error = $this->uri->segment(2, 0);
        $data = array(
            'error' =>  $error,
        );
        $this->load->view('Login/login_view.php', $data);
    }

    public function verifica(){
        $usuario = $this->input->post('email');
        $contra = $this->input->post('password');
        echo "$usuario, $contra";
        if ($usuario!='' && $contra!='') {
            $usuarios = $this->Mimodelo->get('usuarios', array('usuario' => $usuario), array(), '');
            if ($usuarios!=false) {
                $user = $usuarios->row(0);
                if ($user->contrasena==$contra) {
                    $this->session->idUsuario = $usuario->id_usuario;
                    redirect(base_url('menu_principal'));
                }
                else{
                    redirect(base_url('login/2'));
                }
            }
            else{
                redirect(base_url('login/1'));
            }
        }
        else{
            redirect(base_url('login/3'));
        }
    }

}

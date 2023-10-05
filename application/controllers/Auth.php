<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Auth_model');
    }

	public function login() {
		$this->load->view('auth/login.php');
	}

    public function iniciar_sesion(){
        $email = $this->input->post('email');
        $pass = $this->input->post('passwd');

        $user = $this->Auth_model->login($email, $pass);

        if($user){
            $this->session->set_userdata('nombre', $user->apellido . " " . $user->nombre);
            $this->session->set_userdata('email', $user->mail);
            $this->session->set_userdata('rol', $user->rol_rol_id);
            $this->session->set_userdata('url_foto', $user->url_foto ? $user->url_foto : base_url('assets\img\avatar.webp'));

            if($user->rol_rol_id == 1){ // Constatar que en la BD admin = 1
                redirect('admin');
            } else {
                redirect('client');
            }
        }else{
            $this->load->view('auth/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('nombre');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('rol');
        $this->session->unset_userdata('url_foto');
        redirect('welcome');
    }
}

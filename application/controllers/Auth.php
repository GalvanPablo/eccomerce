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
            $this->session->set_userdata('dni', $user->dni);
            $this->session->set_userdata('nombre', $user->apellido . " " . $user->nombre);
            $this->session->set_userdata('email', $user->mail);
            $this->session->set_userdata('rol', $user->rol_rol_id);
            $this->session->set_userdata('url_foto', $user->url_foto ? $user->url_foto : base_url('assets\img\avatar.png'));

            if($user->rol_rol_id == 1){ // Constatar que en la BD admin = 1
                redirect('admin');
            } else {
                redirect('client');
            }
        }else{
            $this->load->view('auth/login');
        }
    }

    public function register(){
        $this->load->view('auth/register.php');
    }

    public function registrarse(){
        $usuario['dni'] =  $this->input->post('dni');
        $usuario['nombre'] =  $this->input->post('nombre');
        $usuario['apellido'] =  $this->input->post('apellido');
        $usuario['mail'] =  $this->input->post('email');
        $usuario['contraseña'] =  password_hash($this->input->post('passwd'), PASSWORD_BCRYPT);
        $usuario['url_foto'] = $this->input->post('cliente_foto');

        if($this->Auth_model->register($usuario) == true){
            echo "<script>alert('Usuario creado')</script>";
            $user = $this->Auth_model->login($this->input->post('email'), $this->input->post('passwd'));
            if($user){
                $this->session->set_userdata('recien_registrado', true);
                $this->session->set_userdata('dni', $user->dni);
                $this->session->set_userdata('nombre', $user->apellido . " " . $user->nombre);
                $this->session->set_userdata('email', $user->mail);
                $this->session->set_userdata('rol', $user->rol_rol_id);
                $this->session->set_userdata('url_foto', $user->url_foto ? $user->url_foto : base_url('assets\img\avatar.webp'));
    
                echo "<script>alert('Redireccionando')</script>";
                redirect('client');
            } else {
                echo "<script>alert('Error al iniciar sesión con el nuevo usuario')</script>";
            }
        } else {
            echo "<script>alert('Error al crear el usuario')</script>";
        }
    }

    public function logout(){
        $this->session->unset_userdata('dni');
        $this->session->unset_userdata('nombre');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('rol');
        $this->session->unset_userdata('url_foto');
        redirect('welcome');
    }
}

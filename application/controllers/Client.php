<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Comprobar los permisos para que solo el admin pueda acceder a estre controller
        $rol = $this->session->userdata('rol');
        if($rol == null || $rol != 2){
            redirect('welcome');
        }
    }

    public function index(){
        $this->load->model('Product_model');

        $data['productos_destacados'] = $this->Product_model->get_all_highlights();

        $this->load->view('client\client.php', $data);
    }

    public function products(){
        $this->load->model('Product_model');

        $data['productos'] = $this->Product_model->get_all();

        $this->load->view('client\productos\productos.php', $data);
    }

    public function product($id){
        $this->load->model('Product_model');

        $data['producto'] = $this->Product_model->get($id);

        $this->load->view('client\productos\detalle_producto.php', $data);
    }
}
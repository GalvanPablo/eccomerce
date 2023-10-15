<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Comprobar los permisos para que solo el admin pueda acceder a estre controller
        $rol = $this->session->userdata('rol');
        if($rol == null || $rol != 1){
            redirect('welcome');
        }
    }

	public function index(){
        $this->load->view('admin\admin.php');
    }

    public function edit_profile(){
        $this->load->view('admin\edit_admin.php');
    }


    ///////////////////////////////////////////////////////

    public function clients(){
        $this->load->model('Client_model');

        $data['clientes'] = $this->Client_model->get_all();

        $this->load->view('admin\clientes\abm_clientes.php', $data);
    }

    public function client($id){
        $this->load->model('Client_model');
        $this->load->helper('form');

        $data['cliente'] = $this->Client_model->get($id);

        $this->load->view('admin\clientes\detalle_cliente.php', $data);
    }
    
    public function new_client(){
        $this->load->helper('form');

        $data['cliente'] = null;
        $this->load->view('admin\clientes\detalle_cliente.php', $data);
    }

    public function insert_client(){
        $this->load->model('Client_model');

        $cliente['dni'] = $this->input->post('cliente_dni');
        $cliente['nombre'] = $this->input->post('cliente_nombre');
        $cliente['apellido'] = $this->input->post('cliente_apellido');
        $cliente['mail'] = $this->input->post('cliente_email');
        $cliente['url_foto'] = $this->input->post('cliente_foto');

        $this->Client_model->insert($cliente);
        redirect('admin/clients');
    }

    public function update_client($id){
        $this->load->model('Client_model');

        $cliente['nombre'] = $this->input->post('cliente_nombre');
        $cliente['apellido'] = $this->input->post('cliente_apellido');
        $cliente['mail'] = $this->input->post('cliente_email');
        $cliente['url_foto'] = $this->input->post('cliente_foto');

        $this->Client_model->update($id, $cliente);
        redirect('admin/clients');
    }

    public function delete_client($id){
        $this->load->model('Client_model');

        $this->Client_model->delete($id);
        redirect('admin/clients');
    }

    public function reset_passwd_client($id){
        $this->load->model('Client_model');

        $this->Client_model->reset_passwd($id);
        redirect('admin/clients');
    }




    ///////////////////////////////////////////////////////

    public function products(){
        $this->load->model('Product_model');

        $data['productos'] = $this->Product_model->get_all();

        $this->load->view('admin\productos\abm_productos.php', $data);
    }

    public function product($id){
        $this->load->model('Product_model');
        $this->load->helper('form');

        $data['producto'] = $this->Product_model->get($id);

        $this->load->view('admin\productos\detalle_producto.php', $data);
    }

    public function new_product(){
        $this->load->helper('form');

        $data['producto'] = null;
        $this->load->view('admin\productos\detalle_producto.php', $data);
    }

    public function insert_product(){
        $this->load->model('Product_model');

        $producto['nombre'] = $this->input->post('producto_nombre');
        $producto['descripcion'] = $this->input->post('producto_descripcion');
        $producto['precio'] = $this->input->post('producto_precio');
        $producto['destacado'] = $this->input->post('producto_destacado');
        $producto['stock'] = $this->input->post('producto_stock');
        $producto['url_imagen'] = $this->input->post('producto_img');
        
        $this->Product_model->insert($producto);
        redirect('admin/products');
    }

    public function update_product($id){
        $this->load->model('Product_model');

        $producto['nombre'] = $this->input->post('producto_nombre');
        $producto['descripcion'] = $this->input->post('producto_descripcion');
        $producto['precio'] = $this->input->post('producto_precio');
        $producto['stock'] = $this->input->post('producto_stock');
        $producto['url_imagen'] = $this->input->post('producto_img');

        $this->Product_model->update($id, $producto);
        redirect('admin/products');
    }

    public function highlight_product($id) {
        $this->load->model('Product_model');
        $producto['destacado'] = !$this->Product_model->get($id)->destacado;

        $this->Product_model->update($id, $producto);
        redirect('admin/products');
    }

    public function delete_product($id){
        $this->load->model('Product_model');

        $this->Product_model->delete($id);
        redirect('admin/products');
    }
}

<?php
class Product_model extends CI_Model {
    function __construct()     {
        parent::__construct();
    }

    public function insert($producto){
        $this->db->insert('producto', $producto);
    }

    public function delete($id){
        $producto['baja'] = 1;
        
        $this->db->where('producto_id', $id);
        $this->db->update('producto', $producto);
    }

    public function update($id, $producto){
        $this->db->where('producto_id', $id);
        $this->db->update('producto', $producto);
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('producto_id', $id);
        $this->db->where('baja', 0);
        
        return $this->db->get()->row();
    }

    public function get_all(){
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('baja', 0);
        
        return $this->db->get()->result();
    }
}
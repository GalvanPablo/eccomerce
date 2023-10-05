<?php
class Client_model extends CI_Model {
    function __construct()     {
        parent::__construct();
    }

    public function insert($cliente){
        $cliente['rol_rol_id'] = 2;
        $cliente['contraseña'] = password_hash('usuario123',PASSWORD_BCRYPT);
        $this->db->insert('usuario', $cliente);
    }

    public function delete($id){
        $cliente['baja'] = 1;
        
        $this->db->where('usuario_id', $id);
        $this->db->update('usuario', $cliente);
    }

    public function update($id, $cliente){
        $this->db->where('usuario_id', $id);
        $this->db->where('rol_rol_id', 2); // Cliente
        $this->db->update('usuario', $cliente);
    }

    public function reset_passwd($id){
        $cliente['contraseña'] = password_hash('usuario123',PASSWORD_BCRYPT);
        
        $this->db->where('usuario_id', $id);
        $this->db->update('usuario', $cliente);
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario_id', $id);
        $this->db->where('baja', 0);
        $this->db->where('rol_rol_id', 2); // Cliente
        
        return $this->db->get()->row();
    }

    public function get_all(){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('baja', 0);
        $this->db->where('rol_rol_id', 2); // Cliente
        
        return $this->db->get()->result();
    }
}
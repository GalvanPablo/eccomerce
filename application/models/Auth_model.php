<?php
class Auth_model extends CI_Model {
    function __construct()     {
        parent::__construct();
    }

    public function login($mail, $pass){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('mail', $mail);

        $user = $this->db->get()->result();
        if($user != null){
            if(password_verify($pass, $user[0]->contraseña)){
                return $user[0];
            }
            echo "<script>alert('Contraseña incorrecta')</script>";
        } else {
            echo "<script>alert('El usuario no existe')</script>";
        }
        return null;
    }


    public function register($usuario){
        $usuario['rol_rol_id'] = 2; // Cliente
        $this->db->insert('usuario', $usuario);

        return $this->db->affected_rows() > 0;
    }
}
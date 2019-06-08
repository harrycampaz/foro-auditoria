<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function is($username, $password) {
        $query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
        return $query->row_array();
        
    }
    
    public function isUs($username, $password){
        $query = $this->db->query('SELECT * FROM user where username = "'. $username. '" and password = "' . $password . '"');
        $row = $query->row_array();
        return  $row['display_name'] . '' . $query->num_rows;
    }

    public function get_id($username) {
        $row = $this->db->get_where('user', array('username' => $username))->row();
        return $row->id_user;
    }

    public function acceso($id_user) {
        $this->db->insert('acceso', array('user_iduser' => $id_user, 'ip' => $this->input->ip_address()));
    }
}

/* End of file  */
/* Location: ./application/models/ */
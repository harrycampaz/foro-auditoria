<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rol_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
     //Obtiene todas las cursos
    public function get_roles() {

        $data = null;
        $query = $this->db->get('rol');
        foreach ($query->result() as $row) {
            $data [$row->idrol] = array('idrol' => $row->idrol,                      
                        'name' => $row->name);
        }

        return $data;
    }
}


<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tema_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
       //Agrega nuevo user
    public function add_tema($datos) {
        return $this->db->insert('tema', $datos);
    }
    
     //Obtiene todas las cursos
    public function get_temas($id) {

        $data = null;
        $this->db->where('curso_idcurso =', $id);
      
        $query = $this->db->get('tema');
      
            foreach ($query->result() as $row) {
                $data [$row->idtema] = 
                        array('idtema' => $row->idtema,
                            'create_time' => $row->create_time,
                            'name' => $row->name,
                            'status' => $row->status);
            }
        
        return $data;
    }
    
     public function get_name($id) {
        $row = $this->db->get_where('tema', array('idtema' => $id))->row();
        if ($row){
            return $row->name;
        }
        
        return null;
        
    }
    
     public function get_status($id) {
        $row = $this->db->get_where('tema', array('idtema' => $id))->row();
        if ($row){
            return $row->status;
        }
        return null;
    }
    
    public function change_estado($estado, $id) {
        return $this->db->update('tema', $estado, array('idtema' => $id));
    }
    
    function delete_tema($id) {
         $this->db->delete('comentario', array('tema_idtema' => $id));
            $this->db->delete('tema', array('idtema' => $id));
    }
}


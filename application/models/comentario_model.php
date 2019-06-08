<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comentario_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
      //Agrega nuevo user
    public function add_comentario($datos) {
        return $this->db->insert('comentario', $datos);
    }
    
     //Obtiene todas las cursos
    public function get_comentarios($id) {

        $data = null;
        $this->db->where('tema_idtema =', $id);
        $this->db->join('user', "comentario.user_iduser = user.iduser");
        $this->db->join('rol', "rol.idrol = user.rol_idrol");
         $this->db->order_by('comentario.create_time', 'desc');
        $query = $this->db->get('comentario');

      
            foreach ($query->result() as $row) {
                $data [$row->idcomentario] = 
                        array('idcomentario' => $row->idcomentario,
                             'comment' => $row->comment,
                            'create_time' => $row->create_time,
                            'iduser' => $row->iduser,
                            'name' => $row->name,
                            'display_name' => $row->display_name);
            }
        
        return $data;
    }
    
    function delete_comentario($id) {
         $this->db->delete('comentario', array('idcomentario' => $id));
    }
}


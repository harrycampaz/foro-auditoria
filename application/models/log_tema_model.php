<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_Tema_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Obtiene todas las cursos
    public function get_logs($id) {

        $data = null;
        $this->db->where('curso_idcurso =', $id);
        $this->db->join('curso', "log_tema.curso_idcurso = curso.idcurso");
        $query = $this->db->get('log_tema');


        foreach ($query->result() as $row) {
            $data [$row->idlog_tema] = array('idlog_tema' => $row->idlog_tema,
                'create_time_log' => $row->create_time_log,
                'text_log' => $row->text_log,
                'accion' => $row->accion,
                'name' => $row->name);
        }

        return $data;
    }

    //Obtiene todas las cursos
    public function get_logs_comentarios($id) {

        $data = null;
        $this->db->where('tema.idtema =', $id);
        $this->db->join('user', "user.iduser = log_comentarios.user_iduser");
        $this->db->join('tema', "tema.idtema = log_comentarios.tema_idtema");
        $query = $this->db->get('log_comentarios');


        foreach ($query->result() as $row) {
            $data [$row->idlog_comentario] = array('idlog_comentario' => $row->idlog_comentario,
                'create_time_log' => $row->create_time_log,
                'text_log' => $row->text_log,
                'accion' => $row->accion,
                'display_name' =>$row->display_name,
                'name' => $row->name);
        }

        return $data;
    }

}

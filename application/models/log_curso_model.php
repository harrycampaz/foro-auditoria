<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_Curso_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Obtiene todas las cursos
    public function get_logs() {

        $data = null;

        $this->db->where('log_curso.user_iduser =', $this->session->userdata('iduser'));
        $this->db->join('user', "log_curso.user_iduser = user.iduser");
        $query = $this->db->get('log_curso');

        foreach ($query->result() as $row) {
            $data [$row->idlog_curso] = array('idlog_curso' => $row->idlog_curso,
                'create_time_log' => $row->create_time_log,
                'name_log' => $row->name_log,
               
                'accion' => $row->accion,
                'display_name' => $row->display_name);
        }

        return $data;
    }

    //Obtiene todas las cursos
    public function get_logs_curso($id) {

        $data = null;

        $this->db->where('curso.idcurso =', $id);

        $this->db->join('log_curso', "log_curso.curso_idcurso = curso.idcurso");
        $this->db->join('user', "log_curso.user_iduser = user.iduser");
        $query = $this->db->get('curso');

        foreach ($query->result() as $row) {
            $data [$row->idlog_curso] = array('idlog_curso' => $row->idlog_curso,
                'create_time_log' => $row->create_time_log,
                'name_log' => $row->name_log,
                'name' => $row->name,
                'accion' => $row->accion,
                'display_name' => $row->display_name);
        }

        return $data;
    }
    
    function get_logs_all() {
        $data = null;

      

        $this->db->join('log_curso', "log_curso.curso_idcurso = curso.idcurso");
        $this->db->join('user', "log_curso.user_iduser = user.iduser");
        $query = $this->db->get('curso');

        foreach ($query->result() as $row) {
            $data [$row->idlog_curso] = array('idlog_curso' => $row->idlog_curso,
                'create_time_log' => $row->create_time_log,
                'name_log' => $row->name_log,
                'name' => $row->name,
                'accion' => $row->accion,
                'display_name' => $row->display_name);
        }

        return $data;
    }

}

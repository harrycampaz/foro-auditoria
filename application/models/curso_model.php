<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Agrega nuevo user
    public function add_curso($datos) {
        return $this->db->insert('curso', $datos);
    }

    //Numero de user registrados
    public function count_curso() {
        $query = $this->db->get('curso');
        return $query->num_rows();
    }

    //Obtiene todas las cursos
    public function get_cursos($id) {

        $data = null;
        $this->db->where('user_iduser =', $id);
        $this->db->join('user', "curso.user_iduser = user.iduser");
        $query = $this->db->get('curso');


        foreach ($query->result() as $row) {
            $data [$row->idcurso] = array('idcurso' => $row->idcurso,
                        'create_time' => $row->create_time,
                        'name' => $row->name,
                        'display_name' => $row->display_name);
        }

        return $data;
    }

    public function get_name($id) {
        $row = $this->db->get_where('curso', array('idcurso' => $id))->row();
        if ($row) {
            return $row->name;
        }

        return null;
    }

    //Obtiene todas las cursos
    public function get_all_cursos() {

        $data = null;
        $this->db->join('user', "curso.user_iduser = user.iduser");
        $query = $this->db->get('curso');

        foreach ($query->result() as $row) {
            $data [$row->idcurso] = array('idcurso' => $row->idcurso,
                        'create_time' => $row->create_time,
                        'name' => $row->name,
                        'display_name' => $row->display_name);
        }

        return $data;
    }

    //Obtiene todas las cursos
    public function get_curso($id) {

        $data = null;
        $this->db->where('idcurso =', $id);
        $this->db->join('user', "curso.user_iduser = user.iduser");
        $query = $this->db->get('curso');

        foreach ($query->result() as $row) {
            $data [$row->idcurso] = array('idcurso' => $row->idcurso,
                        'create_time' => $row->create_time,
                        'name' => $row->name,
                        'display_name' => $row->display_name);
        }

        return $data;
    }

    function is_matriculado($id) {
        $row = $this->db->get_where('user_has_curso', array('curso_idcurso' => $id, 'user_iduser' => $this->session->userdata('iduser')))->row();
        if ($row) {
            return $row->status_uc;
        }

        return null;
    }

    function matricular($datos) {
        return $this->db->insert('user_has_curso', $datos);
    }

    function change_estado($estado, $id, $idcurso) {
        return $this->db->update('user_has_curso', $estado, array('user_iduser' => $id, 'curso_idcurso' => $idcurso));
    }
    function delete_curso($id) {
         $this->db->delete('user_has_curso', array('curso_idcurso' => $id));
         $this->db->delete('curso', array('idcurso' => $id));
    }
}

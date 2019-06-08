<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function is_activo() {
        $check = $this->db->get_where('user', array('iduser' => $this->session->userdata('iduser'), 'status' => '1'))->row();

        if ($check) {
            return $check->iduser;
        }


        return null;
    }

    //Verifica si el user es un Administrados
    public function is_admin() {
        $check = $this->db->get_where('user', array('iduser' => $this->session->userdata('iduser'), 'rol_idrol' => 1));
        return ($check->num_rows > 0) ? TRUE : FALSE;
    }

    //Verifica si el user es un docente
    public function is_docente() {
        $check = $this->db->get_where('user', array('iduser' => $this->session->userdata('iduser'), 'rol_idrol' => 2));
        return ($check->num_rows > 0) ? TRUE : FALSE;
    }

    //Agrega nuevo user
    public function add_user($datos) {
        return $this->db->insert('user', $datos);
    }

    //Verifica si el Username ya existe

    public function check_username($username) {
        $query = $this->db->get_where('user', array('username' => $username));

        if ($query->num_rows > 0)
            return FALSE;
        else
            return TRUE;
    }

    //Numero de user registrados
    public function count_user() {
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    //Obtiene todas las cursos
    public function get_users() {

        $data = null;
        $this->db->join('user', "user.rol_idrol = rol.idrol");
        $query = $this->db->get('rol');


        foreach ($query->result() as $row) {
            $data [$row->iduser] = array('iduser' => $row->iduser,
                'create_time' => $row->create_time,
                'name' => $row->name,
                'display_name' => $row->display_name,
                'status' => $row->status);
        }

        return $data;
    }

    public function change_estado($estado, $id) {
        return $this->db->update('user', $estado, array('iduser' => $id));
    }

    public function get_user($id) {

        $data = null;
        $this->db->where('user.iduser =', $id);
        $this->db->join('rol', "user.rol_idrol = rol.idrol");
        $query = $this->db->get('user');
        foreach ($query->result() as $row) {
            $data [$row->iduser] = array('iduser' => $row->iduser,
                'create_time' => $row->create_time,
                'name' => $row->name,
                'display_name' => $row->display_name,
                'status' => $row->status);
        }

        return $data;
    }

    public function change_rol($rol, $id) {
        return $this->db->update('user', $rol, array('iduser' => $id));
    }

    public function get_users_curso($id) {

        $data = null;
        $this->db->where('curso.idcurso =', $id);
        $this->db->join('user_has_curso', "curso.idcurso = user_has_curso.curso_idcurso");
        $this->db->join('user', "user.iduser = user_has_curso.user_iduser");
        $query = $this->db->get('curso');


        foreach ($query->result() as $row) {
            $data [$row->iduser] = array('iduser' => $row->iduser,
                'create_time' => $row->create_time,
                'name' => $row->name,
                'display_name' => $row->display_name,
                'status_uc' => $row->status_uc);
        }

        return $data;
    }

    function get_acceso($id) {
        $data = null;
        $this->db->where('user_iduser =', $id);
           $query = $this->db->get('acceso');
        foreach ($query->result() as $row) {
            $data [$row->idacceso] = array('idacceso' => $row->idacceso,
                'create_time_acceso' => $row->create_time_acceso,
                'ip' => $row->ip);
        }

        return $data;
    }

}

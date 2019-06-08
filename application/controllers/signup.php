<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->ui_model->is_logged_in()) {
            redirect('/');
        }
    }

    public function index($mensaje = '') {

        $data['mensaje'] = $mensaje;

        $this->load->view('signup/index', $data);
    }

    public function check_register() {

        $this->form_validation->set_rules('display_name', 'Nombre y Apellido', 'trim|required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]|max_length[60]');
       
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|callback__check_username|max_length[12]|alpha_dash');
       
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]|alpha_numeric');
        $this->form_validation->set_message('_check_username', '%s Ya existe/Already exist');

        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>No se pudo hacer el registro.</strong> </div>';

            $this->index($mensaje);
        } else {

            $datos = array(
                'display_name' => $this->input->post('display_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'status' => '0',
                'rol_idrol' => 3,);

            $this->user_model->add_user($datos);
            redirect('/');
        }
    }

    function _check_username($username) {
        return $this->user_model->check_username($username);
    }

}

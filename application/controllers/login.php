<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if ($this->ui_model->is_logged_in()) {
            redirect('/');
        }
    }

    public function index($mensaje = '') {

        $data['mensaje'] = $mensaje;
 
        $this->load->view('login/index', $data);
    }
    
    public function check() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[20]|alpha_dash');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡Advertencia! Debes ingresar un Username y una Contraseña validos.</strong> </div>';

            $this->index($mensaje);
        } else {

            $is_user = $this->login_model->is($this->input->post('username'), sha1($this->input->post('password')));

            if ($is_user) {

                $datos = array(
                    'username' => $is_user['username'],
                    'rol' => $is_user['rol_idrol'],
                    'iduser' => $is_user['iduser'],
                    'is_logged_in' => TRUE,
                );
                $this->login_model->acceso($is_user['iduser']);
                $this->session->set_userdata($datos);

                redirect('/');
            } else {
                $mensaje = '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡ERROR! Por favor, vuelve a introducir tu contraseña.</strong> También verifique su Username </div>';
                $this->index($mensaje);
                //$this->index($this->login_model->isUs($this->input->post('username'), sha1($this->input->post('password'))));
            }
        }
    }
    
}



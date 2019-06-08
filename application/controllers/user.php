<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ui_model->is_logged_in()) {
            redirect('login');
        } elseif ($this->session->userdata('rol') > 1) {
            redirect('/');
        }
    }
    
    function index() {
        
        $data = $this->ui_model->cargar_nav();
               
        $data['users'] = $this->user_model->get_users();
        $data['main_content'] = 'user/index';
        $this->load->view('template', $data);

    }
    
     //Actualizar estado de un Apps en especifico
    public function change_status($estado, $id) {

        if ($estado === '0') {
            $estado = array('status' => '1');
        } elseif ($estado === '1') {
            $estado = array('status' => '0');
        } else {
            $estado = array('status' => '0');
        }
        $this->user_model->change_estado($estado, $id);
        redirect('user');
    }
    
    function edit_user($id) {
        $data = $this->ui_model->cargar_nav();
        $data['iduser'] = $id;
        $data['user'] = $this->user_model->get_user($id);
        $data['roles'] = $this->rol_model->get_roles();
        $data['main_content'] = 'user/edit_user';
        $this->load->view('template', $data);
    }
    
    function check_edit_user() {
         $this->form_validation->set_rules('rol', 'Rol', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡Advertencia! No se pudo actualizar el Usuario.</strong> </div>';
            $this->index($mensaje);
        } else {
            $rol = array('rol_idrol' => $this->input->post('rol'));
            $this->user_model->change_rol($rol, $this->input->post('iduser'));
            redirect('user');
        }
    }
    
    function veiw_user($id) {
        $data = $this->ui_model->cargar_nav();
               
        $data['acceso'] = $this->user_model->get_acceso($id);
        $data['main_content'] = 'user/view_user';
        $this->load->view('template', $data);
    }
}


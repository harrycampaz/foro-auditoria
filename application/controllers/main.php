<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbutil();
        $datos = $this->dbutil->optimize_table('rol');
        
        if($datos['Msg_type'] === 'Error'){
            
            redirect('build');
        }
       
        
    }

    public function index() {
        $data = $this->ui_model->cargar_nav();
        $data['main_content'] = 'main/index';
        $this->load->view('template', $data);
    }

    public function logout() {
        if (!$this->ui_model->is_logged_in()) {
            $this->index();
        } else {
            $this->session->set_userdata(array('is_logged_in' => FALSE));
            $this->session->sess_destroy();
            $mensaje = '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong> Sección cerrada exitosamente .</strong></div>';
            redirect('login');
        }
    }

}

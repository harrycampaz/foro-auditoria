<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_Curso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ui_model->is_logged_in()) {
            redirect('login');
        } else if ($this->session->userdata('rol') > 2) {
            redirect('/');
        }
    }
    
    function index() {
         $data = $this->ui_model->cargar_nav();
       
        $data['main_content'] = 'logcurso/index';
        $data['logs'] = $this->log_curso_model->get_logs();
        $this->load->view('template', $data);
    }
    
    function log_curso($id) {
         $data = $this->ui_model->cargar_nav();
       
        $data['main_content'] = 'logcurso/log_curso';
        $data['logs'] = $this->log_curso_model->get_logs_curso($id);
        $this->load->view('template', $data);
    }
    
    function log_all() {
         $data = $this->ui_model->cargar_nav();
       
        $data['main_content'] = 'logcurso/index';
        $data['logs'] = $this->log_curso_model->get_logs_all();
        $this->load->view('template', $data);
    }
}

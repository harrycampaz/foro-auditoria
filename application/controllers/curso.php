<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ui_model->is_logged_in()) {
            redirect('login');
        }
    }

    public function index($mensaje = '') {

        if ($this->session->userdata('rol') > 2) {
            redirect('/');
        }
        $data = $this->ui_model->cargar_nav();
        $data['mensaje'] = $mensaje;
        $data['main_content'] = 'curso/index';
        $data['cursos'] = $this->curso_model->get_cursos($this->session->userdata('iduser'));
        $this->load->view('template', $data);
    }

    public function add_curso($mensaje = '') {

        if ($this->session->userdata('rol') > 2) {
            redirect('/');
        }
        $data = $this->ui_model->cargar_nav();
        $data['mensaje'] = $mensaje;
        $data['main_content'] = 'curso/add_curso';
        $this->load->view('template', $data);
    }

    public function check_add_curso() {
        if ($this->session->userdata('rol') > 2) {
            redirect('/');
        }
        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|min_length[3]|max_length[45]');

        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡Advertencia! No se pudo guardar el curso.</strong> </div>';
            $this->add_curso($mensaje);
        } else {

            $datos = array(
                'name' => $this->input->post('name'),
                'user_iduser' => $this->session->userdata('iduser'));

            $this->curso_model->add_curso($datos);

            redirect('curso');
        }
    }

    function ver_curso() {
        $data = $this->ui_model->cargar_nav();
        $data['is_activo'] = $this->user_model->is_activo();
        $data['cursos'] = $this->curso_model->get_all_cursos();
        $data['main_content'] = 'curso/ver_cursos';
        $this->load->view('template', $data);
    }
    
    function ver_curso_admin() {
        $data = $this->ui_model->cargar_nav();
        $data['is_activo'] = $this->user_model->is_activo();
        $data['cursos'] = $this->curso_model->get_all_cursos();
        $data['main_content'] = 'curso/ver_cursos_admin';
        $this->load->view('template', $data);
    }

    function matricular($id) {
        $datos = array(
            'curso_idcurso' => $id,
            'user_iduser' => $this->session->userdata('iduser'),
            'status_uc' => '0');

        $this->curso_model->matricular($datos);
        
        redirect('curso/ver_curso');
    }
    
    
    public function change_status($estado, $id, $idcurso) {

        if ($estado === '0') {
            $estado = array('status_uc' => '1');
        } elseif ($estado === '1') {
            $estado = array('status_uc' => '0');
        } else {
            $estado = array('status_uc' => '0');
        }
        $this->curso_model->change_estado($estado, $id, $idcurso);
        
        redirect('tema/index/'.$idcurso);
    }
    
    function borrar_curso($id) {
        $this->curso_model->delete_curso($id);
        redirect('curso');
    }

}

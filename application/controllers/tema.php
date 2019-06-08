<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tema extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ui_model->is_logged_in()) {
            redirect('login');
        }
    }

    function index($id = null) {
        if ($id == null || $this->curso_model->get_name($id) == null) {
            redirect('curso');
        }
        $data = $this->ui_model->cargar_nav();
        $data['curso'] = $this->curso_model->get_name($id);
        $data['temas'] = $this->tema_model->get_temas($id);
        $data['users'] = $this->user_model->get_users_curso($id);
        
        $data['idcurso'] = $id;
        $data['main_content'] = 'tema/index';
        $this->load->view('template', $data);

    }

    function add_tema($id = null) {
        if ($id == null || $this->curso_model->get_name($id) == null) {
            redirect('curso');
        }
        $data = $this->ui_model->cargar_nav();
        $data['idcurso'] = $id;
        $data['main_content'] = 'tema/add_tema';
        $this->load->view('template', $data);
    }

    function check_add_tema() {
        $this->form_validation->set_rules('tema', 'Tema', 'trim|required|min_length[3]|max_length[140]');

        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡Advertencia! No se pudo guardar el tema.</strong> </div>';
            $this->add_curso($mensaje);
        } else {

            $datos = array(
                'name' => $this->input->post('tema'),
                'curso_idcurso' => $this->input->post('idcurso'),
                'status' => '1');

            $this->tema_model->add_tema($datos);

            redirect('curso');
        }
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
        $this->tema_model->change_estado($estado, $id);
        redirect('curso');
    }

    function index_alumno($id = null) {
        if ($id == null || $this->curso_model->get_name($id) == null) {
            redirect('curso');
        }
        $data = $this->ui_model->cargar_nav();
        $data['curso'] = $this->curso_model->get_name($id);
        $data['temas'] = $this->tema_model->get_temas($id);
        $matricula = $this->curso_model->is_matriculado($id);
        if ($matricula != null) {
            if($matricula === '1'){
                 $data['main_content'] = 'tema/index_alumno';
            } else {
                 $data['main_content'] = 'curso/en_espera';
            }
           
        } else {
            $data['cursos'] = $this->curso_model->get_curso($id);
            $data['main_content'] = 'curso/matricula';
        }
        $data['idcurso'] = $id;

        $this->load->view('template', $data);
    }
    
    function borrar_tema($idtema, $idcurso) {
        $this->tema_model->delete_tema($idtema);
        redirect('tema/index/'.$idcurso);
    }

}

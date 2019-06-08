<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comentario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ui_model->is_logged_in()) {
            redirect('login');
        }
    }

    public function index($mensaje = '') {

        $data = $this->ui_model->cargar_nav();
        $data['mensaje'] = $mensaje;
        $data['main_content'] = 'comentario/index';
        //$data['cursos'] = $this->curso_model->get_cursos($this->session->userdata('iduser'));
        $this->load->view('template', $data);
    }

    function viewComentario($id = null) {
        if ($id == null) {
            redirect('curso');
        }
        $data = $this->ui_model->cargar_nav();
        $data['main_content'] = 'comentario/index';
        $data['tema'] = $this->tema_model->get_name($id);
        $data['idtema'] = $id;
        $data['status'] = $this->tema_model->get_status($id);
        $data['comentarios'] = $this->comentario_model->get_comentarios($id);
        $this->load->view('template', $data);
    }

    function check_add_comentario() {
        $this->form_validation->set_rules('comentario', 'Comentario', 'trim|required|min_length[3]|max_length[280]');

        if ($this->form_validation->run() == FALSE) {
            $mensaje = '<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>¡Advertencia! No se pudo guardar el tema.</strong> </div>';
            $this->viewComentario($this->input->post('idtema'));
        } else {

            $datos = array(
                'comment' => $this->input->post('comentario'),
                'tema_idtema' => $this->input->post('idtema'),
                'user_iduser' => $this->session->userdata('iduser'));

            $this->comentario_model->add_comentario($datos);

            $this->viewComentario($this->input->post('idtema'));
        }
    }

    function view_logs($id) {
        
        if ($this->session->userdata('rol') > 2) {
            redirect('/');
        }
        $data = $this->ui_model->cargar_nav();

        $data['main_content'] = 'comentario/log_comentario';

        $data['logs_comment'] = $this->log_tema_model->get_logs_comentarios($id);
        $this->load->view('template', $data);
    }

    function borrar_coment($idcoment, $idtema) {

        $this->comentario_model->delete_comentario($idcoment);
        redirect('comentario/viewComentario/' . $idtema);
    }

}

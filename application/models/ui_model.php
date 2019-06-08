<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ui_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function cargar_nav() {
        $data['template'] = $this->cargar_template();
        return $data;
    }
    
    public function cargar_template() {

        if ($this->session->userdata('rol') == 1) {
            return 'template_admin';
        } elseif ($this->session->userdata('rol') == 2) {
            return 'template_docente';
        } elseif ($this->session->userdata('rol') == 3) {
            return 'template_alumno';
        } else {
            return 'template';
        }
    }
    
    public function is_logged_in() {
        return $this->session->userdata('is_logged_in');
    }
}

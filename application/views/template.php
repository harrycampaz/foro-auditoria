<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	$this->load->view('ui/template/header');
	$this->load->view('ui/'.$template.'/menu');
	$this->load->view($main_content);
	$this->load->view('ui/template/footer');
    
?>
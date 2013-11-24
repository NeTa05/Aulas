<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professors extends CI_Controller {


	function __construct()
	{
		parent::__construct();
								
		
		$this->load->model('Users_Model','m');//loading a model_usuario, name of instance
		$this->load->library('sessionLib');//loading a model_usuario, name of instance

		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');
		$this->form_validation->set_message('emailOk','Ya hay cuenta con este email');
		$this->form_validation->set_message('statusOk','Esta cuenta no ha sido activada');
		$this->form_validation->set_message('matches','%s no coincide con %s');
		$this->form_validation->set_message('min_length','%s debe tener como mínimo 6 caracteres');
											
	}
	
}
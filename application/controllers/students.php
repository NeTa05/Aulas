<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Students_Model','m');//loading a model_usuario, name of instance
		/*$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');*/

											
	}
	


	public function index()
	{
		$data['content']='students/index.php';
		$data['title']='Lista Estudiantes';
		$data['query']=$this->m->all();
		$this->load->view('template',$data);
	}

}
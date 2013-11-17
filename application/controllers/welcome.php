<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function __construct()
	{
		parent::__construct();
								
		
		//$this->load->model('Users_Model','m');//loading a model_usuario, name of instance
		$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');
		$this->form_validation->set_message('statusOk','Esta cuenta no ha sido activada');

											
	}
	public function index()
	{
		//$this->load->helper('html');
		//$this->load->view('template');

		$data['content']='welcome/welcome';
		$data['title']=' &copy; Aulas UTN ¡Bienvenido!'; 
		$this->load->view('template',$data);
	}

	public function registration()
	{
		$data['content']='welcome/registration';
		$data['title']='Registrate aquí';
		$this->load->view('template',$data);

	}
	public function login()
	{
		$data['content']='welcome/login';
		$data['title']='Ingrese sus datos';
		$this->load->view('template',$data);

	}
	public function loginOk()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		return $this->sessionlib->login($email,$password);
	}
	public function statusOk()
	{
		return FALSE;
	}
	

	public function loginForm()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|callback_loginOk');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->login();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$status= $this->sessionlib->status($email,$password);

			//$this->load->view('test');
			if(!$status)
			{
				$this->form_validation->set_rules('email', 'Email', 'callback_statusOk');
				if ($this->form_validation->run()==FALSE) 
				{
					$this->login();//going to ingreso() without lossing the values of the variables 
				}
			}
			else
			{
				redirect('welcome/main');
			}
		}
	}
	public function main()
	{
		$this->load->view('welcome/main');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
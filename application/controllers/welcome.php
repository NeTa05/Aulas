<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


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
	public function index()
	{
		//$this->load->helper('html');
		//$this->load->view('template');

		$data['content']='welcome/index';
		$data['title']=' &copy; Aulas UTN ¡Bienvenido!'; 
		$this->load->view('template',$data);
	}

	public function registration()
	{
		$data['content']='welcome/registration';
		$data['title']='Registrese aquí';
		$this->load->view('template',$data);
	}

	public function emailOk()
	{
		$email=$this->input->post('email');
		return $this->sessionlib->emailOk($email);
	}

	public function insert()
	{
		$registro = $this->input->post();
		unset($registro["password2"]);//deleting input that I dont need to insert, only to validate password
		
		$this->form_validation->set_rules('password', 'Contraseña', 'required|matches[password2]|min_length[6]');
		$this->form_validation->set_rules('password2', 'Repita Clave', 'required|min_length[6]');
		$this->form_validation->set_rules('identification_card', 'Número de cédula', 'required');
		$this->form_validation->set_rules('first_name', 'Nombre', 'required');
		$this->form_validation->set_rules('last_name', 'Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_emailOk');
		

		if ($this->form_validation->run()==FALSE) {
			$this->registration();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$registro['updated']=date('Y/m/d H:i');
			$registro['created']=date('Y/m/d H:i');
			$this->m->insert($registro);
			redirect('welcome/index');
		}
		
	}


	public function logout()
	{
		$this->session->sess_destroy(); //destroying the session
		redirect('welcome/index');

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

		//if password and email aren't ok or empty
		if ($this->form_validation->run()==FALSE) {
			//echo "FALSE";
			$this->login();//going to login() without lossing the values of the variables 
		}
		//if password and email aren ok
		else
		{
			//getting the variables from the form
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$status= $this->sessionlib->status($email,$password);//checking if the user is enable

			// if the user is disable(desahabilitado)
			if(!$status)
			{
				//calling the method statusOk
				$this->form_validation->set_rules('email', 'Email', 'callback_statusOk');
				
				//the las callback return false, although is going to enter in this if
			 	if ($this->form_validation->run()==FALSE) 
				{
					$this->login();//going to login() without lossing the values of the variables
				}
				
			}
			// if the user is enable(habilitado)
			else
			{
				/*HAVE TO GET THE KIND WITH SESSION */

				redirect('welcome/main');//going menu
			}
		}
	}
	public function main()
	{
		$data['content']='welcome/main';
		$data['title']='Página principal';
		$this->load->view('template',$data);
	}

	public function activate()
	{
		$data['content']='welcome/activate';
		$data['title']='Habilitar usuarios desahabilitados';
		$data['query']=$this->m->usersForLogin();
		$this->load->view('template',$data);
	}


	public function edit($id)
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/

		$data['content']='welcome/edit';
		$data['title']='Habilitar este usuario';
		$data['register']=$this->m->find($id);//send the id for the form
		//var_dump($data['registro']);
		$this->load->view('template',$data);

	}

	public function update()
	{
		$register = $this->input->post();
		$register['updated']=date('Y/m/d H:i');
		$register['status']=1;

		/*$this->load->view('test');
		var_dump($register);*/
		
		$this->m->update($register);
		redirect('welcome/activate');
	
	}

	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professors extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Professors_Model','m');//loading a model_usuario, name of instance
		/*$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');*/
	}

	public function index()
	{
		$data['content']='professors/index.php';
		$data['title']='Lista Profesores';
		$data['query']=$this->m->all();
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/

		$data['content']='professors/edit';
		$data['title']='Editar estudiante';
		$data['register']=$this->m->find($id);//send the id for the form
		$this->load->view('template',$data);

	}


	public function update()
	{
		$register = $this->input->post();

		$this->form_validation->set_rules('first_name', 'Nombre', 'required');
		$this->form_validation->set_rules('last_name', 'Apellidos', 'required');
		$this->form_validation->set_rules('identification_card', 'Cédula', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->edit($register['id']);//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$this->m->update($register);
			redirect('professors/index');
		}
		
	}


	public function create()
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/
		$data['content']='professors/create';
		$data['title']='Agregar estudiante';
		$this->load->view('template',$data);

	}

	public function insert()
	{
		$register = $this->input->post();

		$this->form_validation->set_rules('first_name', 'Nombre', 'required');
		$this->form_validation->set_rules('last_name', 'Apellidos', 'required');
		$this->form_validation->set_rules('identification_card', 'Cédula', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->create();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$register['created']=date('Y/m/d H:i');
			$this->m->insert($register);
			redirect('professors/index');
		}
		
	}


	public function delete($id)
	{
		$this->m->delete($id);
		redirect("professors/index");
 
	}

}
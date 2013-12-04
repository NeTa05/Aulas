<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careers extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Careers_Model','m');
		$this->form_validation->set_message('required','Digite %s');//loading a model_usuario, name of instance
		/*$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');*/

		$this->load->library('validationsLib');//loading a model_usuario, name of instance
		/*$this->form_validation->set_message('required','Digite %s');*/
		$this->form_validation->set_message('careersOk','Este código ya existe');
		$this->form_validation->set_message('careersOk','Esta carrera ya contiene cursos, no se puede borrar');
	}

	public function index()
	{
		$data['content']='careers/index.php';
		$data['title']='Lista Carreras';
		$data['query']=$this->m->all();
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/

		$data['content']='careers/edit';
		$data['title']='Editar aula';
		$data['register']=$this->m->find($id);//send the id for the form
		$this->load->view('template',$data);

	}


	public function update()
	{
		$register = $this->input->post();

		//if are same
		if($this->input->post('code')===$this->input->post('code1'))
		{
			$this->form_validation->set_rules('code', 'Código', 'required');
			$this->form_validation->set_rules('name', 'Nombre', 'required');
		}
		//if the new identification_card is changing(two varibles are different)
		else
		{
			$this->form_validation->set_rules('code', 'Código', 'required|callback_careersOk');
			$this->form_validation->set_rules('name', 'Nombre', 'required');
		}

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->edit($register['id']);//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			unset($register['code1']);//delete the last identification_card
			$register['updated']=date('Y/m/d H:i');
			$this->m->update($register);
			redirect('careers/index');
		}
		
	}


	public function create()
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/
		$data['content']='careers/create';
		$data['title']='Agregar aula';
		$this->load->view('template',$data);

	}

	public function careersOk()
	{
		$code=$this->input->post('code');
		return $this->validationslib->careers($code);
	}

	public function insert()
	{
		$register = $this->input->post();

		$this->form_validation->set_rules('code', 'Código', 'required|callback_careersOk');
		$this->form_validation->set_rules('name', 'Nombre', 'required');

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->create();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$register['created']=date('Y/m/d H:i');
			$this->m->insert($register);
			redirect('careers/index');
		}
		
	}
	public function errorErase($id)
	{
		return $this->validationslib->careersDelete($id);
	}
	public function error()
	{
		return FALSE;
	}


	public function delete($id)
	{

		//var_dump($this->input->post());

		
		$status=$this->errorErase($id);
		//if it is existing in courses
		if(!$status)
		{
			print "<script type=\"text/javascript\">alert('Esta carrera contiene cursos, no se puede borrar');</script>";
			$this->edit($id);//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$this->m->delete($id);
			redirect("careers/index");
 		}
	}

}
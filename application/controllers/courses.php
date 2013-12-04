<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Courses_Model','m');
		//$this->load->model('Careers_Model','c');
		$this->form_validation->set_message('required','Digite %s');//loading a model_usuario, name of instance
		/*$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');*/

		$this->load->library('validationsLib');//loading a model_usuario, name of instance
		/*$this->form_validation->set_message('required','Digite %s');*/
		$this->form_validation->set_message('coursesOk','Este código ya existe');
	}

	public function index()
	{
		$data['content']='courses/index.php';
		$data['title']='Lista Cursos';
		$data['query']=$this->m->all();
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/

		$data['content']='courses/edit';
		$data['title']='Editar curso';
		$data['register']=$this->m->find($id);//send the id for the form
		$data['careers'] = $this->m->get_careers();//loading all the careers
		$data['selected']=$data['register']->id_career;//selecting the career
		$this->load->view('template',$data);

	}
	

	public function update()
	{
		$register = $this->input->post();
		
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('code', 'Código', 'required');
		

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->edit($register['id']);//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$this->m->update($register);
			redirect('courses/index');
		}
		
	}


	public function create()
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/
		$data['content']='courses/create';
		$data['title']='Agregar curso';
		$data['careers'] = $this->m->get_careers();
		$this->load->view('template',$data);

	}

	public function coursesOk()
	{
		$code=$this->input->post('code');
		return $this->validationslib->courses($code);
	}

	public function insert()
	{
		$register = $this->input->post();

		
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('code', 'Código', 'required|callback_coursesOk');
		$this->form_validation->set_rules('id_career', 'Nombre de carrera', 'required');

		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->create();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$register['created']=date('Y/m/d H:i');
			$this->m->insert($register);
			redirect('courses/index');
		}
		
	}


	public function delete($id)
	{
		$this->m->delete($id);
		redirect("courses/index");
 
	}



}
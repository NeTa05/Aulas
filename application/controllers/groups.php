<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Groups_Model','m');
		//$this->load->model('Careers_Model','c');
		$this->form_validation->set_message('required','Digite %s');//loading a model_usuario, name of instance
		/*$this->load->library('sessionLib');//loading a model_usuario, name of instance
		$this->form_validation->set_message('required','Digite %s');
		$this->form_validation->set_message('loginOk','Datos incorrectos');*/

		$this->load->library('validationsLib');//loading a model_usuario, name of instance
		/*$this->form_validation->set_message('required','Digite %s');*/
		$this->form_validation->set_message('groupsOk','El nombre de este grupo ya existe');
	}

	public function index()
	{
		$data['content']='groups/index.php';
		$data['title']='Lista Grupos';
		$data['query']=$this->m->all();
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/

		$data['content']='groups/edit';
		$data['title']='Editar grupo';
		$data['register']=$this->m->find($id);//send the id for the form
		$data['professors'] = $this->m->get_professors();//loading all the professors
		$data['selectedp']=$data['register']->professor_id;//selecting the professor

		$data['courses'] = $this->m->get_courses();//loading all the professors
		$data['selectedc']=$data['register']->course_id;//selecting the professor
		$this->load->view('template',$data);

	}
	

	public function update()
	{
		$register = $this->input->post();
		
		$this->form_validation->set_rules('name', 'Nombre del grupo', 'required');


		//if are same
		if($this->input->post('name')===$this->input->post('name1'))
		{
			$this->form_validation->set_rules('name', 'Nombre del grupo', 'required');
		}
		//if the new identification_card is changing(two varibles are different)
		else
		{
			$this->form_validation->set_rules('name', 'Nombre del grupo', 'required|callback_groupsOk');
		}



		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->edit($register['id']);//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			unset($register['name1']);//delete the last identification_card
			$register['updated']=date('Y/m/d H:i');
			$this->m->update($register);
			redirect('groups/index');
		}
		
	}


	public function create()
	{
		/*$id=$this->uri->segment(3);//getting the 3 argument (id)
		*is the same than the argument*/
		$data['content']='groups/create';
		$data['title']='Agregar grupo';
		$data['professors'] = $this->m->get_professors();//loading all the professors
		$data['courses'] = $this->m->get_courses();//loading all the professors
		$this->load->view('template',$data);

	}

	public function groupsOk()
	{
		$name=$this->input->post('name');
		return $this->validationslib->groups($name);
	}

	public function insert()
	{
		$register = $this->input->post();

		
		$this->form_validation->set_rules('name', 'Nombre del grupo', 'required|callback_groupsOk');


		//if it is false is because any of the rules over is failing
		if ($this->form_validation->run()==FALSE) {
			$this->create();//going to ingreso() without lossing the values of the variables 
		}
		else
		{
			$register['updated']=date('Y/m/d H:i');
			$register['created']=date('Y/m/d H:i');
			$this->m->insert($register);
			redirect('groups/index');
		}
		
	}


	public function delete($id)
	{
		$this->m->delete($id);
		redirect("groups/index");
 
	}



}
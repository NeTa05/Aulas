<?php if(!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class ValidationsLib{


	
	function __construct()
	{
		$this->CI = & get_instance();//acceding to instance loads the library
		$this->CI->load->model('Students_Model');//loading a model_usuario, name of 
		$this->CI->load->model('Professors_Model');//loading a model_usuario, name of
		$this->CI->load->model('Classrooms_Model');//loading a model_usuario, name of 
		$this->CI->load->model('Courses_Model');//loading a model_usuario, name of 
		$this->CI->load->model('Groups_Model');//loading a model_usuario, name of 
		$this->CI->load->model('Careers_Model');//loading a model_usuario, name of 
	}

	public function students($identification)
	{
		$query=$this->CI->Students_Model->findIdentification($identification);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function professors($identification)
	{
		$query=$this->CI->Professors_Model->findIdentification($identification);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function classrooms($code)
	{
		$query=$this->CI->Classrooms_Model->findCode($code);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function courses($code)
	{
		$query=$this->CI->Courses_Model->findCode($code);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function groups($name)
	{
		$query=$this->CI->Groups_Model->findName($name);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}


	public function careers($code)
	{
		$query=$this->CI->Careers_Model->findCode($code);
		if($query->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	


}
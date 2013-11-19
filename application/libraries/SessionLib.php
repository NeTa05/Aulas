<?php if(!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class SessionLib{


	/*validaciones para el modelo de usuarios(login,cambio clave,CRUD Usuario)
																Create/Read/Update/Delete*/
	function __construct()
	{
		$this->CI = & get_instance();//acceding to instance loads the library
		$this->CI->load->model('Users_Model','u');//loading a model_usuario, name of 
	}

	public function login($email,$password)
	{
		$query=$this->CI->u->get_login($email,$password);
		if($query->num_rows()>0)
		{
			$row = $query->row();
			/*
			//creating sessions like an array
			$arregloSession= array(	'first_name'=>$row->first_name,	
									'last_name'=>$row);	
			$this->CI->session->set_userdata($arregloSession);
			
			$this->CI->session->set_userdata('id',$row->id);
			$this->CI->session->set_userdata('Name',$row->name);
			$this->CI->session->set_userdata('Usuario',$row->login);
			$this->CI->session->set_userdata('Password',$row->password);
			//$this->CI->session->set_userdata('perfil_name',$row->password);
			*/

			$this->CI->session->set_userdata('kind',$row->kind);
			$this->CI->session->set_userdata('id',$row->id);
			return TRUE;
		}
		else
		{
			$this->CI->session->sess_destroy();
			return FALSE;
		}	
	}

	public function status($email,$password)
	{
		$query=$this->CI->u->get_status($email,$password);
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
		
	}


}
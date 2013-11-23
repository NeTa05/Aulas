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
			return TRUE;
		}
		else
		{
			return FALSE;
		}	
	}

	public function emailOk($email)
	{
		$query=$this->CI->u->get_email($email);
		if($query->num_rows()>0)
		{
			return FALSE;// email is already in the db
		}
		else
		{
			return TRUE;
		}	
	}

	public function status($email,$password)
	{
		$query=$this->CI->u->get_status($email,$password);
		if($query->num_rows()>0)
		{
			$row = $query->row();
			//echo $row->name;
			
			//creating sessions like an array
			$arregloSession= array(	'id'=>$row->id,	
									'kind'=>$row->kind);	
			$this->CI->session->set_userdata($arregloSession);
			return TRUE;//enable
		}
		else
		{
			return FALSE;//disable
		}
		
		
	}


}
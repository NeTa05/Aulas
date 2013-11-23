<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('my_validation_errors')){

	function my_validation_errors($errors){
		$salida='';
		if($errors)
		{
			$salida='<div class="alert alert-error">';
			$salida=$salida.'<button type="button" class="close" data-dismiss="alert"> x </button>';
			$salida=$salida.'<h4> Error </h4>';
			$salida=$salida.'<small> '.$errors.'</small>' ;
			$salida=$salida.'</div>';
		}
		return $salida;
	}


}


if(!function_exists('my_first_menu')){

	function my_first_menu(){
		
		$opciones=null;
		if(get_instance()->session->userdata('id'))
		{
			$admin=get_instance()->session->userdata('kind');
			$opciones=$opciones.'<li>'.anchor('welcome/main',$admin).'</li>';
			if($admin=="Administrativo")
			{
				$opciones=$opciones.'<li>'.anchor('welcome/activate','Habilitar usuarios').'</li>';
			}
			$opciones=$opciones.'<li>'.anchor('welcome/logout','Cerrar sesión').'</li>';
			
			
		}	
		else
		{
			$opciones='<li>'.anchor('welcome/registration','Registrarse').'</li>';
			$opciones=$opciones.'<li>'.anchor('welcome/login','Iniciar sesión').'</li>';
		}

		return $opciones;
		
	}
}



if(!function_exists('my_menu_app')){

	function my_menu_app(){

		$opciones=null;

		//if is login
		if(get_instance()->session->userdata('id'))
		{
			
			$opciones=$opciones.'<li>'.anchor('students/index','Estudiantes').'</li>';
		}
		return $opciones;
	}
}
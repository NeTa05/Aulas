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
		$opciones='<li>'.anchor('welcome/registration','Registrarse').'</li>';
		$opciones=$opciones.'<li>'.anchor('welcome/login','Iniciar sesión').'</li>';

		if(get_instance()->session->userdata('Usuario'))
		{
			$opciones=$opciones.'<li>'.anchor('index.php/home/cambio_clave','Cambiar clave').'</li>';
			$opciones=$opciones.'<li>'.anchor('index.php/home/salir','Salir').'</li>';
		}	
		/*else
		{
			$opciones=$opciones.'<li>'.anchor('index.php/home/ingreso','Ingreso').'</li>';
		}
*/
		return $opciones;
		
	}
}

if(!function_exists('my_menu_app')){

	function my_menu_app(){

		$opciones=null;

		//if is login
		if(get_instance()->session->userdata('Usuario'))
		{
			$opciones='';
			get_instance()->load->model('Model_Menu');
			$query=get_instance()->Model_Menu->allForMenu();//getting the menu of database

			foreach ($query as $opcion) {
				//if is the url in the select
				if ($opcion->url !='') {
					$irA=$opcion->url;
					$param= array('target'=>'_blank');
				}
				else
				{
					$irA=$opcion->controlador.'/'.$opcion->accion;
					$param= array();

				}

				$opciones=$opciones.'<li>'.anchor($irA,$opcion->name).'</li>';//adding li in variable
			}
		}
		return $opciones;
	}
}
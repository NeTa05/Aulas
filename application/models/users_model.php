<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('users')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('usuario');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('usuario');
    }

    function get_status($email,$password)
    {
        
        return $query = $this->db->query('SELECT * FROM users WHERE email LIKE "'.$email.'" and password LIKE binary "'.$password.'" and status=1');
        /*$this->db->where('login',$user);
        $this->db->where('password',$password);
        return $this->db->get('usuario');*/
    }

    //method for going application
    function get_login($email,$password)
    {
        
        return $query = $this->db->query('SELECT * FROM users WHERE email LIKE "'.$email.'" and password LIKE binary "'.$password.'" ');
        /*$this->db->where('login',$user);
        $this->db->where('password',$password);
        return $this->db->get('usuario');*/
    }
    

}

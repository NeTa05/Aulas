<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('users')->row();
    }

    function insert($register) {
    	$this->db->set($register);
		$this->db->insert('users');
    }

    //here the admin can change the status of the users 
    function update($register) {
    	$this->db->set($register);
		$this->db->where('id', $register['id']);
		$this->db->update('users');
    }

    //getting if the status of the user is 0, before going to menu
    function get_status($email,$password)
    {
        return $query = $this->db->query('SELECT * FROM users WHERE email LIKE "'.$email.'" and password LIKE binary "'.$password.'" and status=1');
    }

    //method for going application
    function get_login($email,$password)
    {
        
        return $query = $this->db->query('SELECT * FROM users WHERE email LIKE "'.$email.'" and password LIKE binary "'.$password.'" ');
        /*$this->db->where('login',$user);
        $this->db->where('password',$password);
        return $this->db->get('usuario');*/
    }

    function get_email($email)
    {
        $this->db->where('email',$email);
        return $this->db->get('users');
    }

    //method for going application
    function usersForLogin()
    {
        $query = $this->db->query('SELECT * FROM users WHERE status=0 ');
        if($query->num_rows()>0)//getting number of rows
        {
            return $query->result();    
        }
        
    }
    

}

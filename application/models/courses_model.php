<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    
    function all()
    {
        $this->db->select('courses.id, 
              courses.name,
              courses.code,
              courses.created,
              courses.updated,
              careers.name as name_career');
        $this->db->from('careers , courses ');
        $this->db->where('careers.id = courses.id_career ');
        $query = $this->db->get();
        return $query->result();

    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('courses')->row();
    }

    function findCode($code) {
        $this->db->where('code', $code);
        return $this->db->get('courses');
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('courses');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('courses');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('courses');
    }

    //getting careers to see in views edit and create
    function get_careers() {
        $list = array();
        $this->load->model('Careers_Model');
        $registers = $this->Careers_Model->all();
        foreach ($registers as $register) {
            $list[$register->id] = $register->name;
        }
        return $list;
    }
}

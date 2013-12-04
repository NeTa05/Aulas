<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    
    function all()
    {
        $this->db->select('g.id, 
              g.name,
              p.first_name as first_name_professor,
              p.last_name as last_name_professor,
              c.name as name_course,
              g.created,
              g.updated');
        $this->db->from('groups as g , courses as c,professors as p');
        $this->db->where('c.id = g.course_id and  p.id = g.professor_id ');
        $query = $this->db->get();
        return $query->result();

    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('groups')->row();
    }

    function findName($name) {
        $this->db->where('name', $name);
        return $this->db->get('groups');
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('groups');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('groups');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('groups');
    }

    //getting professors to see in views edit and create
    function get_professors() {
        $list = array();
        $this->load->model('Professors_Model');
        $registers = $this->Professors_Model->all();
        foreach ($registers as $register) {
            $list[$register->id] = $register->first_name." ".$register->last_name;
        }
        return $list;
    }

    function get_courses() {
        $list = array();
        $this->load->model('Courses_Model');
        $registers = $this->Courses_Model->all();
        foreach ($registers as $register) {
            $list[$register->id] = $register->name;
        }
        return $list;
    }
}

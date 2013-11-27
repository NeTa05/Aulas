<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classrooms_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all()
    {
        $query=$this->db->get('classrooms');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('classrooms')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('classrooms');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('classrooms');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('classrooms');
    }
}

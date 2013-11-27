<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professors_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all()
    {
        $query=$this->db->get('professors');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('professors')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('professors');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('professors');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('professors');
    }
}

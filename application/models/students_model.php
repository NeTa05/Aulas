<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_Model extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all()
    {
        $query=$this->db->get('students');
        $this->db->where('kind', 'Estudiante');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('students')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('students');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('students');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('students');
    }
    
    function get_perfiles() {
        $lista = array();
        $this->load->model('Model_Perfil');
        $registros = $this->Model_Perfil->all();
        foreach ($registros as $registro) {
            $lista[$registro->id] = $registro->name;
        }
        return $lista;
    }

}

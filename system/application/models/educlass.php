<?php
class Educlass extends Model {
    
    function Educlass() {
        parent::Model();
    }
	function fetchClass($id) {
		$this->db->select('*');
		$this->db->from('classes');
		$this->db->where('id', $id);
    
    $query = $this->db->get();
    $results	= $query->result();
    
		return $results;
	}

	function fetchTeacherClasses($id) {
		$this->db->from('classes');
		$this->db->where('teacher', $id);

		$query		= $this->db->get();
		
		$results	= $query->result();
		return $results;
	}
	
	function searchClassID($class_id) {
	  $this->db->select('*');
		$this->db->from('classes');
		$this->db->where('class_id', $class_id);

		$query		= $this->db->get();
		$results	= $query->result();

		return $results;
	}
}
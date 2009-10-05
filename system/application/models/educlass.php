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
	
	function fetchClassbyClassID($class_id) {
	  $this->db->select('*');
		$this->db->from('classes');
		$this->db->where('class_id', $class_id);

		$query		= $this->db->get();
		$results	= $query->result();

		return $results['0'];
	}
	
	function fetchStudentClasses($id) {
	  $this->db->select('classes');
	  $this->db->from('users');
	  $this->db->where('id', $id);
	  
	  $query = $this->db->get();
	  
	  $results = $query->result();
	  $student =  $results['0'];
	  
	  return explode(",", $student->classes);
	}
	
	function addStudentClass()
	{
	  $this->db->select('classes');
	  $this->db->from('users');
	  $this->db->where('id', $this->redux_auth->profile()->id);
	  
	  $query = $this->db->get();
	  
	  $results = $query->result();
	  $student =  $results['0'];
	  $classes = $student->classes;
	  $this->db->flush_cache();
	  $classes = $classes.",".$this->input->post('add_class_id');
	  
	  $data['classes'] = $classes;
	  $this->db->where('id', $this->redux_auth->profile()->id);
	  $this->db->update('users', $data);
	  
	}
}
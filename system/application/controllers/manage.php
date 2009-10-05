<?php

class Manage extends MY_Controller {

	function Manage() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
		
}

	function index() {
		if (!$this->redux_auth->logged_in()) {
			redirect('auth');
		}
		else{
			$data['profile'] = $this->redux_auth->profile();
		
			
			if($this->redux_auth->profile()->group == "teacher")
      {
        $classes = $this->educlass->fetchTeacherClasses($this->redux_auth->profile()->id);
       $this->db->where('user', $this->redux_auth->profile()->id);
       foreach ($classes as $result) {
        $this->db->or_where('class', $result->id); 
       }
      }
      else
      {
        $this->db->where('user', $this->redux_auth->profile()->id);
      }
			$data['results'] = $this->post->grabAllPosts();
			
			$this->load->view('layout', $data);
		}
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function delete() {
		
		$getPost = $this->db->get_where('posts', array('id' => $this->uri->segment(3)))->result();
		$getClass = $this->db->get_where('classes', array('id' => @$getPost[0]->class))->result();
		if ($this->redux_auth->profile()->id == @$getPost[0]->user || $this->redux_auth->profile()->id == @$getClass[0]->teacher) {
			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('posts', array('status' => 1));
			
			// $result = "Item has been successfully deleted";
			redirect('manage');
		}
		else {
			redirect('manage');
			// $result = "Item not deleted, an error has occurred.";
		}
		return $result;
	}

	function page()
	{
		$this->load->model('post');
		$this->load->view('layout', $data);
	}

}
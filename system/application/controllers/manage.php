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
		
			$this->db->where('user', $this->redux_auth->profile()->id);
			$data['results'] = $this->post->grabAllPosts();
			
			$this->load->view('layout', $data);
		}
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function delete() {
		
		$getPost = $this->db->get_where('posts', array('id' => $this->uri->segment(3)))->result();
		
		if ($this->redux_auth->profile()->id == @$getPost[0]->user) {
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
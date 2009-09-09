<?php

class Posts extends MY_Controller {

	function Posts() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
	}

	function index() {
		$data['results'] = $this->post->grabAllPosts();

		$this->load->view('layout', $data);
	}

	function about() {
		$this->load->view('layout');
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function page()
	{
		$this->load->model('post');

		$this->load->library('Pagination');
		$config['base_url'] = base_url().'/posts/page/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 10;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);
		$this->db->order_by("date", "desc"); 
		$pp = 10;

		$data['results'] = $this->post->getPosts($pp,$offset);

		$this->load->view('layout', $data);
	}

	function vote() {
		$this->load->model('vote');
		$arrayData = array(
			'post_id'	=>	$_POST['post_id'],
			'user_id'	=>	$this->redux_auth->profile()->id,
			'vote'		=>	$_POST['vote']
			);
		if ($this->redux_auth->logged_in()) {

			$this->vote->updateVotes($arrayData);
						
			echo "Success.";
			return TRUE;
		}
		else {
			echo "Failed.";
			return FALSE;
		}
	}
}
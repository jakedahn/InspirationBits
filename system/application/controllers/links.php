<?php

class Links extends MY_Controller {

	function Links() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
	}

	function index() {
		$this->post->fetchPosts("link");
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function submit() {
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'valid_url|required');
		$this->form_validation->set_rules('desc', 'Description', 'required|htmlspecialchars|trim');

		if ($this->form_validation->run() == false) {
			$this->partial = $this->partial."_error";
			$this->load->view('layout');
		}

		else {
			$this->post->insertItem("link");
			redirect('/links/success');
		}
	}

	function success()	{
		$this->load->view('layout');
	}
}
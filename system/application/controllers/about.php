<?php

class About extends MY_Controller {

	function About() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {

		$this->load->view('layout');
	}

	function no_partial() {
		$this->load->view('layout');
	}

}
<?php

class S3test extends MY_Controller {

	function S3test() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {
		$contents = file_get_contents('/Users/jakedahn/Sites/1.png');
		$this->load->library('s3');
		$this->s3->putObject('test.png', $contents, 'files.inspirationbits.com', 'private', $_FILES['type']);
	}



}


<?php

class Profile extends MY_Controller {

	function Profile() {
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
			
			$this->load->view('layout', $data);
		}
	}

    function update() {
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		if ($this->form_validation->run() == false)
		{
			$this->load->view('layout');
		}
		else
		{
		    $data = array('username' => $username, 
    					  'password' => $password, 
    					  'email'    => $email,

    		$this->db->insert($users_table, $data);
    		
		}

		
    }
	function no_partial() {
		$this->load->view('layout');
	}



}
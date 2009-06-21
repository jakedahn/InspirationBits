<?php

class Links extends MY_Controller {

	function Links() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {
	    $where = array('type'  =>  '1');

	    $this->db->where($where);
	    $this->db->order_by("date", "desc"); 
	    $data['query'] = $this->db->get('posts');

		$this->load->view('layout', $data);
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function submit() {
	    $data = array(
	        'type'      =>      '1',
            'title'     =>      $this->input->post('title'),
            'desc'      =>      $this->input->post('desc'),
            'url'       =>      $this->input->post('url'),
			'user'		=>	$this->redux_auth->profile()->id
        ); 

	    $this->form_validation->set_rules('title', 'Title', 'required|trim');
	    $this->form_validation->set_rules('url', 'URL', 'valid_url|required');
	    $this->form_validation->set_rules('desc', 'Description', 'required|htmlspecialchars|trim');

        if ($this->form_validation->run() == false) {
            echo $this->form_validation->prep_url($this->input->post('url'));
            $this->partial = $this->partial."_error";
            $this->load->view('layout', $data);
        }

        else {
            $this->db->insert('posts', $data);
            redirect('/links/success');
        }
	}

    function success()  {
        $this->load->view('layout');
    }
}
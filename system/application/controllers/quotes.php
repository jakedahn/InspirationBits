<?php

class Quotes extends MY_Controller {

	function Quotes() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
	}

	function index() {
	    $where = array('type'  =>  '3');

	    $this->db->where($where);
	    $this->db->order_by("date", "desc"); 
	    $data['query'] = $this->db->get('posts');

		$this->load->view('layout', $data);
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function submit() {
	    $this->form_validation->set_rules('author', 'Author', 'required|trim|htmlspecialchars');
	    $this->form_validation->set_rules('year', 'Year', 'trim|htmlspecialchars|numeric');
	    $this->form_validation->set_rules('text', 'Text', 'required|htmlspecialchars|trim');

        if ($this->form_validation->run() == false) {
            $this->partial = $this->partial."_error";
            $this->load->view('layout', $data);
        }

        else {
            $this->post->insertItem("quote");
            redirect('/quotes/success');
        }
	}

    function success()  {
        $this->load->view('layout');
    }
}
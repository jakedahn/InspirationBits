<?php

class Posts extends MY_Controller {

	function Posts() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {
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
                
		$data['tests'] = $this->db->count_all('posts');
        $data['results'] = $this->post->getPosts($pp,$offset);

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

	function vote($value='') {
		# code...
	}



}
<?php

class Images extends MY_Controller {

	function Images() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
	}

	function index() {
		$this->post->fetchPosts("link");
	}
	
	function items() {
		$where = array('type'  => '2', 'id' => $this->uri->segment(3));
		
		$this->db->where($where);
		$this->db->order_by("date", "desc"); 
		$data['query'] = $this->db->get('posts');
		echo $this->db->last_query();
		$this->load->view('layout', $data);
	}

	function no_partial() {
		$this->load->view('layout');
	}
	
	function upload() {
		
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('text', 'Description', 'required|htmlspecialchars|trim');
		
		$config['upload_path'] = './public/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['encrypt_name'] = 'TRUE';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload("image")) {
			$data['error'] = $this->upload->display_errors('<span class="error">', "</span>");
			$this->partial = $this->partial."_error";
			
			if ($this->form_validation->run() == false) {
	            $this->load->view('layout', $data);
	        }
	
			$this->load->view('layout', $data);
		}	
		else {
			if ($this->form_validation->run() == false) {
				$data['error'] = $this->upload->display_errors('<span class="error">', "</span>");
	            $this->partial = $this->partial."_error";
	            $this->load->view('layout', $data);
	        }
			else {
				$uploadData = $this->upload->data();
				$this->post->insertItem("image", $uploadData);

				redirect('/images/success');
			}

		}
	}

	function success()	{
		$this->load->view('layout');
	}
	

}
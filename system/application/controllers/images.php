<?php

class Images extends MY_Controller {

	function Images() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {

	    $where = array('type'  =>  '2');
	    $this->db->where($where);
	    $this->db->order_by("date", "desc"); 
	    $data['query'] = $this->db->get('posts');
	    
		$this->load->view('layout', $data);
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
	    $this->form_validation->set_rules('desc', 'Description', 'required|htmlspecialchars|trim');
	    
        $config['upload_path'] = './public/upload/';
    	$config['allowed_types'] = 'gif|jpg|png';
    	$config['max_size']	= '2048';
    	$config['encrypt_name'] = 'TRUE';
    	
    	$this->load->library('upload', $config);
    	
    	if (!$this->upload->do_upload("image")) {
    	    $data['error'] = $this->upload->display_errors('<span class="error">', "</span>");
    	    $this->partial = $this->partial."_error";
    	}	
        else
        {

        $uploadData = $this->upload->data();
        
        $formData = array(
	        'type'      =>	'2',
            'title'     =>	$this->input->post('title'),
            'desc'      =>	$this->input->post('desc'),
            'img_url'   =>	base_url().'public/upload/'.$uploadData['file_name'], 
			'user'		=>	$this->redux_auth->profile()->id
        );

        $this->db->insert('posts', $formData);

        redirect('/images/success');
        }

        
    }

    
    function success()  {
        $this->load->view('layout');
    }
    

}
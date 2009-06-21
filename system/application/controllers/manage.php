<?php

class Manage extends MY_Controller {

	function Manage() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
}

	function index() {
		if (!$this->redux_auth->logged_in()) {
			redirect('auth');
		}
		else{
		    $this->load->model('post');
			$data['profile'] = $this->redux_auth->profile();
		
			$this->db->where('user', $this->redux_auth->profile()->id);
			$data['fetchUserPosts'] = $this->db->get('posts');
			    
			$this->load->view('layout', $data);
		}
	}

	function no_partial() {
		$this->load->view('layout');
	}

	function delete() {
		
		$getPost = $this->db->get_where('posts', array('id' => $this->uri->segment(3)))->result();
		
		if ($this->redux_auth->profile()->id == @$getPost[0]->user) {
			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('posts', array('disabled' => 1));
			
			// $result = "Item has been successfully deleted";
			redirect('manage');
		}
		else {
			redirect('manage');
			// $result = "Item not deleted, an error has occurred.";
		}
		return $result;
	}

    function page()
    {
	    $this->load->model('post');
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'/posts/page/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 5;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        
        $offset = $this->uri->segment(3);
        $config['cur_page'] = $offset-1;
        
        $this->pagination->initialize($config);
        
        
        $this->db->order_by("date", "desc"); 
        
       
        
        $pp = 5;
                
        $data['results'] = $this->post->getPosts($pp,$offset);
        
	    
	    

		$this->load->view('layout', $data);
    }

}
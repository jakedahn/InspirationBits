<?php

class Posts extends MY_Controller {

	function Posts() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
	}

	function index() {
		
	    $this->load->model('post');
	
		$this->posts_table 		= 'posts';
		$this->images_table 	= 'images';
		$this->quotes_table 	= 'quotes';
		$this->links_table		= 'links';
				
		$this->db->from($this->posts_table);
		$this->db->where($this->posts_table . '.status', '0');
		$this->db->join($this->images_table, "{$this->images_table}.post_id = {$this->posts_table}.id");
		// $this->db->join($this->quotes_table, "{$this->quotes_table}.post_id = {$this->posts_table}.id");
		// $this->db->join($this->links_table,   "{$this->links_table}.post_id = {$this->posts_table}.id");

		// $this->db->limit($limit);
		// $this->db->offset($offset);
		// $this->db->order_by($this->posts_table . '.date', 'desc');
		
		$query						= $this->db->get();	
		$results					= $query->result();
		
		
		echo "<pre>";
		print_r($results);
		echo "</pre>";
		

//         
//         $this->load->library('Pagination');
//         $config['base_url'] = base_url().'/posts/page/';
//         $config['total_rows'] = $this->db->count_all('posts');
//         $config['per_page'] = 10;
//         $config['full_tag_open'] = '<p>';
//         $config['full_tag_close'] = '</p>';
// 		
//         $this->pagination->initialize($config);
// 
//         $offset = $this->uri->segment(3);
//         $pp = 10;
//                 
// 		$data['result'] = $this->post->grabPosts(0, 10);
// 
// 		$this->post->grabPosts();
// 
// 
// echo "<pre>";
// print_r($this->db->last_query());
// echo "</pre>";
		// $this->load->view('layout', $data);
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

	function vote() {
		$this->load->model('vote');
		$arrayData = array(
			'post_id'	=>	$_POST['post_id'],
			'user_id'	=>	$this->redux_auth->profile()->id,
			'vote'		=>	$_POST['vote']
			);
		if ($this->redux_auth->logged_in()) {
			
			if ($this->vote->present()) {
				$this->vote->update($arrayData);
			}
			else {
				$this->vote->insert($arrayData);
			}
			return TRUE;
		}
		else {
			return FALSE;
		}
	}



}
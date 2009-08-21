<?php
class Post extends Model {
    function Post() {
        parent::Model();

		$this->posts_table 		= 'responses';
		$this->users_table 			= 'users';
		$this->questions_table		= 'questions';
		
		$this->posts_table 		= 'posts';
		$this->images_table 	= 'images';
		$this->quotes_table 	= 'quotes';
		$this->links_table		= 'links';
		
    }
    function getPosts($num, $offset) {
      $query = $this->db->get('posts', $num+1, $offset);	
      return $query;
    }

	function fetchPosts($type) {
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join(plural($type), plural($type).'.post_id = posts.id');

	    $data['query'] = $this->db->get();
		$this->load->view('layout', $data);
	}
	
	function grabPosts() {
		
		$this->db->from($this->posts_table);
		$this->db->where($this->posts_table . '.status', '0');
		$this->db->join($this->images_table, "{$this->images_table}.post_id = {$this->posts_table}.id");
		$this->db->join($this->quotes_table, "{$this->quotes_table}.post_id = {$this->posts_table}.id");
		$this->db->join($this->links_table,   "{$this->links_table}.post_id = {$this->posts_table}.id");

		// $this->db->limit($limit);
		// $this->db->offset($offset);
		// $this->db->order_by($this->posts_table . '.date', 'desc');
		
		$query						= $this->db->get();	
		$results					= $query->result();
				
		return false;
		
	}

	function getVotes($postId) {
		$query = $this->db->get('votes')->result();
		$this->db->where('post_id', $postId);
		return $query;
	}

	function insertItem($postType='', $uploadData='') {
		$postsData = array(
			'user'		=>		$this->redux_auth->profile()->id,
			'type'		=>		$postType
		); 
		$this->db->insert('posts', $postsData);	
		
		switch ($postType) {
			case "link":
				$typeData = array(
					'title'		=>		$this->input->post('title'),
					'text'		=>		$this->input->post('text'),
					'url'		=>		$this->input->post('url'),
					'post_id'	=>		$this->db->insert_id()
				);
			break;
			case "quote":
				$typeData = array(
					'text'		=>		$this->input->post('text'),
					'author'	=>		$this->input->post('author'),
					'year'		=>		$this->input->post('year'),
					'post_id'	=>		$this->db->insert_id()
				);
			break;
			case "image":
				$typeData = array(
					'title'		=>		$this->input->post('title'),
					'text'		=>		$this->input->post('text'),
					'url'		=>		base_url().'public/upload/'.$uploadData['file_name'],
					'post_id'	=>		$this->db->insert_id()
				);
			break;
			default:
				echo "You forgot to specify post type in your controller...";
		}
		$this->db->insert(plural($postType), $typeData);
	}
}
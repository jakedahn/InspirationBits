<?php
class Post extends Model {
    function Post() {
        parent::Model();
		
		$this->posts_table 		= 'posts';
		$this->images_table 	= 'images';
		$this->quotes_table 	= 'quotes';
		$this->links_table		= 'links';

		$this->posts_fields		= array('id', 'type', 'user', 'date', 'votes', 'status');
		$this->images_fields	= array('id', 'title', 'text', 'url', 'date', 'post_id');
		$this->quotes_fields	= array('id', 'text', 'author', 'date', 'post_id');
		$this->links_fields		= array('id', 'title', 'text', 'url', 'date', 'post_id');

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

	function grabAllPosts() {
		$aliases = $this->build_db_select_with_aliases(
			array(
				$this->posts_table 		=> $this->posts_fields,
				$this->images_table 	=> $this->images_fields,
				$this->quotes_table 	=> $this->quotes_fields, 
				$this->links_table 		=> $this->links_fields
			)
		);

		$this->db->select($aliases);
		$this->db->join($this->images_table, $this->images_table . '.post_id = ' . $this->posts_table .'.id', 'left');
		$this->db->join($this->quotes_table, $this->quotes_table . '.post_id = ' . $this->posts_table .'.id', 'left');
		$this->db->join($this->links_table, $this->links_table . '.post_id = ' . $this->posts_table .'.id', 'left');

		$this->db->from($this->posts_table);
		$this->db->where($this->posts_table . '.status', '0');
		$this->db->order_by($this->posts_table . '.date', 'desc');

		$query		= $this->db->get();
		$results	= $query->result();

		return $results;
	}
	
	function grabClassPosts($id, $user, $is_teacher) {
		
    $aliases = $this->build_db_select_with_aliases(
			array(
				$this->posts_table 		=> $this->posts_fields,
				$this->images_table 	=> $this->images_fields,
				$this->quotes_table 	=> $this->quotes_fields, 
				$this->links_table 		=> $this->links_fields
			)
		);

		$this->db->select($aliases);
		$this->db->join($this->images_table, $this->images_table . '.post_id = ' . $this->posts_table .'.id', 'left');
		$this->db->join($this->quotes_table, $this->quotes_table . '.post_id = ' . $this->posts_table .'.id', 'left');
		$this->db->join($this->links_table, $this->links_table . '.post_id = ' . $this->posts_table .'.id', 'left');

		$this->db->from($this->posts_table);
		$this->db->where($this->posts_table . '.status', '0');
		$this->db->where('class', $id);
    
    
    $this->db->order_by($this->posts_table . '.date', 'desc');

		$query		= $this->db->get();
		$results	= $query->result();

		return $results;
	}

	function build_db_select_with_aliases($array) {
		$temp_alias_string = '';

		foreach($array as $table => $fields) {
			$table_sigular = singular($table);
			foreach($fields as $field) {
				$temp_alias_string .= $table . '.' . $field . ' AS ' . $table_sigular . '_' . $field . ', ';
			}
		}
		return $temp_alias_string;
	}

	function getVotes($postId) {
		$query = $this->db->get('votes')->result();
		$this->db->where('post_id', $postId);
		return $query;
	}

	function insertItem($postType='', $uploadData='') {
		$postsData = array(
			'user'		=>		$this->redux_auth->profile()->id,
			'type'		=>		$postType,
			'class'   =>    $this->input->post('class')
		); 
		$this->db->insert('posts', $postsData);	

		switch ($postType) {
			case "link":
				$typeData = array(
					'title'		=>		$this->input->post('title'),
					'text'		=>		$this->input->post('desc'),
					'url'		=>		$this->input->post('url'),
					'post_id'	=>		$this->db->insert_id()
				);
			break;
			case "quote":
				$typeData = array(
					'text'		=>		$this->input->post('text'),
					'author'	=>		$this->input->post('author'),
					'post_id'	=>		$this->db->insert_id()
				);
			break;
			case "image":
				$typeData = array(
					'title'		=>		$this->input->post('title'),
					'text'		=>		$this->input->post('desc'),
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
<?php
class Post extends Model {
    function Post() {
        parent::Model();
    }
    function getPosts($num, $offset) {
      $query = $this->db->get('posts', $num+1, $offset);	
      return $query;
    }
	
	function getVotes($postId) {
		$query = $this->db->get('votes')->result();
		$this->db->where('post_id', $postId);
		return $query;
	}
	
	function insertItem($postType='') {
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
				echo "You forgot to specify post type in your controller..."
		}
		$this->db->insert(plural($postType), $typeData);
	}
}
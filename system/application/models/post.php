<?php
 
class Post extends Model {

    function Post() {
        parent::Model();
    }

    function getPosts($num, $offset) {
      $query = $this->db->get('posts', $num, $offset);	
      return $query;
    }

 
}


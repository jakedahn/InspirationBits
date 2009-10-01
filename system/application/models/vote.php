<?php
class Vote extends Model {
	function Vote() {
		parent::Model();
	}


	function hasVoted() {
		if ($this->db->get_where('votes', array('user_id' => $this->redux_auth->profile()->id, 'post_id' => $_POST['post_id']))->num_rows > 0) {
			
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	function curValue($arrayData) {
		$check = $this->db->get_where('votes', array('user_id' => $this->redux_auth->profile()->id, 'post_id' => $_POST['post_id']))->result();
		
		$result = $check[0]->vote;
		
		return $result;
	}
	
	function updateVotes($arrayData) {
		if ($this->vote->hasVoted()) {
			if ($this->vote->curValue($arrayData) == $arrayData['vote']) {
				echo "Sorry, you've already voted $arrayData[vote]. No changes have been made.";
			}
			else {
				if ($arrayData['vote'] == "up") {
					$this->increment($arrayData, 2);
				}
				if ($arrayData['vote'] == "down") {
					$this->decrement($arrayData, 2);
				}
			}
			$this->vote->update($arrayData);
		}
		else {
			if ($arrayData['vote'] == "up") {
				$this->increment($arrayData);
			}
			if ($arrayData['vote'] == "down") {
				$this->decrement($arrayData);
			}
			
			$this->vote->insert($arrayData);
		}
	}

	function update($arrayData) {
		$this->db->where('user_id', $arrayData['user_id']);
		$this->db->where('post_id', $arrayData['post_id']);
		
		$this->db->set($arrayData);
		if ($this->db->update('votes')) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function insert($arrayData) {
		$this->db->set($arrayData);
		if ($this->db->insert('votes')) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	function fetchTotal($arrayData) {
		$check = $this->db->get_where('posts', array('id' => $_POST['post_id']))->result();
		$results = $check[0]->votes;

		return $results;
	}
	
	function increment($arrayData, $inc = 1) {
		$total = $this->fetchTotal($arrayData);
		$total = $total + $inc;
		$votesData = array(
			'votes'	=>	$total
		); 
		
		$this->db->where('id', $arrayData['post_id']);
		$this->db->update('posts', $votesData);
		
		return "Incremented.";
	}
	
	function decrement($arrayData, $inc = 1) {
		$total = $this->fetchTotal($arrayData);
		$total = $total - $inc;
		$votesData = array(
			'votes'	=>	$total
		); 
		
		$this->db->where('id', $arrayData['post_id']);
		$this->db->update('posts', $votesData);
		
		return "Decremented.";
	}
	

}
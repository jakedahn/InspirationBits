<?php
class Vote extends Model {
    function Vote() {
        parent::Model();
    }

	function present() {
		if ($this->db->get_where('votes', array('user_id' => $this->redux_auth->profile()->id, 'post_id' => $_POST['post_id']))->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
		
	function update($arrayData) {
		$this->db->where('user_id', $this->redux_auth->profile()->id);
        $this->db->where('post_id', $_POST['post_id']);
		
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
}
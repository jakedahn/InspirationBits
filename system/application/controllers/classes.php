<?php

class Classes extends MY_Controller {

	function Classes() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('educlass');
	}

	function index() {
	  $class_id = $this->uri->segment(2, 0);
	  if($class_id == 0) {
	    if($this->redux_auth->logged_in())
	    {
		    $data['results'] = $this->educlass->fetchTeacherClasses($this->redux_auth->profile()->id);
	    }
	    else
	    {
	      $data['results'] = NULL;
	    }
		  $this->load->view('layout', $data);
		}
		else
		{
		  echo $class_id;
		}
	}

  function _remap($method) {
    $this->index();
  }
}
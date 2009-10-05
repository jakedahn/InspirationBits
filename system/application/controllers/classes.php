<?php

class Classes extends MY_Controller {

	function Classes() {
		parent::MY_Controller();
		$this->load->model('redux_auth_model');
		$this->load->model('post');
		$this->load->model('educlass');
	}

	function index() {
		$this->load->view('layout');
	}

  function _remap($method) {
    if($method == "index")
    {
      $this->index();
    }
    else if($method == "add")
    {
      $this->add();
    }
    else
    {
      $this->classposts($method);
    }
  }
  
  function classposts($class_id) {
    $class = $this->educlass->fetchClassbyClassID($class_id);
    
    if($this->redux_auth->profile()->group == "teacher")
    {
      $is_teacher = TRUE;
    }
    else
    {
      $is_teacher = FALSE;
    }
		
		$data['results'] = $this->post->grabClassPosts($class->id, $this->redux_auth->profile()->id, $is_teacher);
		$data['class_name'] = $class->class_name;
		$data['class_id'] = $class->class_id;
		$data['class_db_id'] = $class->id;
		$this->partial = 'classes/classposts';
		$this->load->view('layout', $data);
  }
  
  function add() {

			$this->educlass->addStudentClass();
			redirect('/');
	}
}
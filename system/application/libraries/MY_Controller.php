<?php

class MY_Controller extends Controller {

	var $partial = 'debug/echo';

	function MY_Controller() {
		parent::Controller();
		$this->_get_partial();
		$this->_get_model();
	}
	
	function _get_partial() {
		$uri = $this->router->class . '/' . $this->router->method;
		if (is_file(realpath(dirname(__FILE__) . '/../views/' . $uri . EXT))) {
			$this->partial = $this->router->class . '/' . $this->router->method;
		}
	}
	
	function _get_model() {
		$uri = substr($this->router->class, 0, -1);
		if (is_file(realpath(dirname(__FILE__) . '/../models/' . $uri . EXT))) {
			$this->load->model($uri);
		}
	}

}
<?
class MY_Form_validation extends CI_Form_validation {
    
	function MY_Form_validation() {
		parent::CI_Form_validation();
	}
	
	function valid_url($str)
    {
        return ( ! preg_match('/^(http|https|ftp|svn|git):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $str)) ? FALSE : TRUE;
    }
    
}
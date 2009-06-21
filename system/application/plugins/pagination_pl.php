<?php

/**
* Initalises pagination config settings and returns the create_links string.
*
* @param unknown_type $cur_page_seg
* @param unknown_type $total_rows
* @param unknown_type $per_page_val
* @param unknown_type $per_page_seg
* @param unknown_type $pbase_url
* @return string
*/
function init_paginate ($cur_page_seg, $total_rows, $per_page_val, $per_page_seg, $pbase_url)
{    
    $obj =& get_instance();
    
    //load relevant libraries
    $obj->load->library('pagination');
    
    //pagination setup
    //echo $per_page_val;
    $pbase_url = $pbase_url."/".$per_page_val;
    $config['base_url'] = $pbase_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page_val;
    $config['uri_segment'] = $cur_page_seg;
    
    //pagination initialization
    $obj->pagination->initialize($config);
    
    return $obj->pagination->create_links();
    // end paging
}


/**
* Works out how many records should be shown per page. The value will either be taken from
*     1. The uri segment
*  2. The default value set in the controller; or
*  3. A default upper/lower range if people try to do tricky things in the uri segment (e.g. negative
*     values).
*
* @param unknown_type $per_page_val
* @param unknown_type $per_page_seg
* @return unknown
*/
function get_per_page($per_page_val, $per_page_seg)
{    
    $per_page = validate_per_page($per_page_val, $per_page_seg);
    
    return $per_page;
}

/**
* Validates the per page val and returns the value. Will check for out of bounds and non-numerical values
*
* @param unknown_type $per_page_val
* @param unknown_type $per_page_seg
* @return unknown
*/
function validate_per_page($per_page_val, $per_page_seg)
{
    $obj =& get_instance();
    
     //use per page if set from the uri, otherwise use default value set in controller
    $per_page = $obj->uri->segment($per_page_seg, $per_page_val);
    
    //security check - ensure value is numeric
    if (is_numeric($per_page)) : $per_page=$per_page; else: $per_page = $per_page_val; endif;
    
    //limit the per page value - prevents someone from doing a query of 1000 rows etc
    if ($per_page > 100) :    $per_page = 100; endif;
    
    //limit the per page value from negative numbers
    if ($per_page < 1) : $per_page = 10; endif;
    
    return $per_page;
}

/**
* Will work out what offset should be used for a given sql query for a given pag
*
* @param unknown_type $cur_page_seg
* @param unknown_type $per_page_val
* @return unknown
*/
function get_offset($cur_page_seg, $per_page_val)
{
    $obj =& get_instance();
    
    //determine offset - per_page_val has already been validated
    $page = 1;
    if ($obj->uri->segment($cur_page_seg, 0)) : $page = $obj->uri->segment($cur_page_seg, 0); endif;
    if ( $page == 1):    $offset = 0; else :    $offset = ($page - 1) * $per_page_val; endif;
     
     return $offset;
}
?>
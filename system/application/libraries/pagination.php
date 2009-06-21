<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Code Igniter
*
* An open source application development framework for PHP 4.3.2 or newer
*
* @package        CodeIgniter
* @author        Rick Ellis
* @copyright    Copyright (c) 2006, pMachine, Inc.
* @license        http://www.codeignitor.com/user_guide/license.html
* @link        http://www.codeigniter.com
* @since        Version 1.0
* @filesource
*/

// ------------------------------------------------------------------------

/**
* Pagination Class
*
* @package        CodeIgniter
* @subpackage    Libraries
* @category    Pagination
* @author        Rick Ellis
* @link        http://www.codeigniter.com/user_guide/libraries/pagination.html
*/
class CI_Pagination {

    var $base_url           = ''; // The page we are linking to
    var $total_rows         = ''; // Total number of items (database results)
    var $per_page           = 10; // Max number of items you want shown per page
    var $num_links          =  2; // Number of "digit" links to show before/after the currently viewed page
    var $cur_page           =  0; // The current page being viewed
    var $first_link           = '&lsaquo; First';
    var $next_link            = '>';
    var $prev_link            = '<';
    var $last_link            = 'Last &rsaquo;';
    var $uri_segment        = 3;
    var $full_tag_open        = '';
    var $full_tag_close        = '';
    var $first_tag_open        = '';
    var $first_tag_close    = '&nbsp;';
    var $last_tag_open        = '&nbsp;';
    var $last_tag_close        = '';
    var $cur_tag_open        = '&nbsp;<b>';
    var $cur_tag_close        = '</b>';
    var $next_tag_open        = '&nbsp;';
    var $next_tag_close        = '&nbsp;';
    var $prev_tag_open        = '&nbsp;';
    var $prev_tag_close        = '';
    var $num_tag_open        = '&nbsp;';
    var $num_tag_close        = '';

    /**
     * Constructor
     *
     * @access    public
     * @param    array    initialization parameters
     */
    function CI_Pagination($params = array())
    {
        if (count($params) > 0)
        {
            $this->initialize($params);        
        }
        
        log_message('debug', "Pagination Class Initialized");
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Initialize Preferences
     *
     * @access    public
     * @param    array    initialization parameters
     * @return    void
     */
    function initialize($params = array())
    {
        if (count($params) > 0)
        {
            foreach ($params as $key => $val)
            {
                if (isset($this->$key))
                {
                    $this->$key = $val;
                }
            }        
        }
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Generate the pagination links
     *
     * @access    public
     * @return    string
     */    
    function create_links()
    {
        // If our item count or per-page total is zero there is no need to continue.
        if ($this->total_rows == 0 OR $this->per_page == 0)
        {
           return '';
        }

        // Calculate the total number of pages
        $num_pages = ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        if ($num_pages == 1)
        {
            return '';
        }

        // Determine the current page number.        
        $CI =& get_instance();    
        if ($CI->uri->segment($this->uri_segment) != 0)
        {
            $this->cur_page = $CI->uri->segment($this->uri_segment);
            
            // Prep the current page - no funny business!
            $this->cur_page = preg_replace("/[a-z\-]/", "", $this->cur_page);
        }
        else
        {
            $this->cur_page = 1;
        }
        
                
        if ( ! is_numeric($this->cur_page))
        {
            $this->cur_page = 0;
        }
        
        // Is the page number beyond the result range?
        // If so we show the last page
        if ($this->cur_page > $num_pages)
        {
            $this->cur_page = $num_pages;
        }
        
        $uri_page_number = $this->cur_page;
        //$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);


        // Add a trailing slash to the base URL if needed
        $this->base_url = preg_replace("/(.+?)\/*$/", "\\1/",  $this->base_url);
        
          // And here we go...
        $pagination = '';
        
        // Render the "First" link
        if ($this->cur_page > 1)
        {
            $pagination .= $this->first_tag_open.'<a >base_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
        }
        else
            $pagination.= "<span class=\"disabled\">".$this->first_link."</span>";
        
        // Render the "previous" link
        if ($this->cur_page > 1)
        {
            $prev = $this->cur_page - 1;
            $pagination .= $this->prev_tag_open.'<a >base_url.$prev.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
        }
        else
            $pagination.= "<span class=\"disabled\"><</span>";
        
        
        if ($num_pages < 7 + ($this->num_links * 2))    //not enough pages to bother breaking it up
        {
            for ($counter = 1; $counter <= $num_pages; $counter++)
            {
                if ($counter == $this->cur_page)
                {
                    $pagination .= "<span class=\"current\">$counter</span>"; // Current page
                }
                else
                {
                    $pagination .= $this->num_tag_open.'<a >base_url.$counter.'">'.$counter.'</a>'.$this->num_tag_close;
                }
            }
        }
        elseif($num_pages > 5 + ($this->num_links * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($this->cur_page < 1 + ($this->num_links * 2))
            {
                for ($counter = 1; $counter < 4 + ($this->num_links * 2); $counter++)
                {
                    if ($counter == $this->cur_page)
                    {
                        $pagination .= "<span class=\"current\">$counter</span>"; //  Current page
                    }
                    else
                    {
                        $pagination .= $this->num_tag_open.'<a >base_url.$counter.'">'.$counter.'</a>'.$this->num_tag_close;
                    }
                }
                
                $pagination.= "...";
                
                $num_pages_minus = $num_pages-1;
                $pagination .= $this->num_tag_open.'<a >base_url.$num_pages_minus.'">'.$num_pages_minus.'</a>'.$this->num_tag_close;
                $pagination .= $this->num_tag_open.'<a >base_url.$num_pages.'">'.$num_pages.'</a>'.$this->num_tag_close;    
            }
            //in middle; hide some front and some back
            elseif($num_pages - ($this->num_links * 2) > $this->cur_page && $this->cur_page > ($this->num_links * 2))
            {
                $one=1;
                $two=2;
        
                $pagination .= $this->num_tag_open.'<a >base_url.$one.'">'.$one.'</a>'.$this->num_tag_close;
                $pagination .= $this->num_tag_open.'<a >base_url.$two.'">'.$two.'</a>'.$this->num_tag_close;
                
                $pagination.= "...";
                
                for ($counter = $this->cur_page - $this->num_links; $counter <= $this->cur_page + $this->num_links; $counter++)
                {
                    if ($counter == $this->cur_page)
                    {
                        $pagination.= "<span class=\"current\">$counter</span>";
                    }
                    else
                    {
                        $pagination .= $this->num_tag_open.'<a >base_url.$counter.'">'.$counter.'</a>'.$this->num_tag_close;
                    }
                }
                $pagination.= "...";
        
                $num_pages_minus = $num_pages-1;
                $pagination .= $this->num_tag_open.'<a >base_url.$num_pages_minus.'">'.$num_pages_minus.'</a>'.$this->num_tag_close;
                $pagination .= $this->num_tag_open.'<a >base_url.$num_pages.'">'.$num_pages.'</a>'.$this->num_tag_close;    
            }
            //close to end; only hide early pages
            else
            {
                $one=1;
                $two=2;
        
                $pagination .= $this->num_tag_open.'<a >base_url.$one.'">'.$one.'</a>'.$this->num_tag_close;
                $pagination .= $this->num_tag_open.'<a >base_url.$two.'">'.$two.'</a>'.$this->num_tag_close;
                
                $pagination.= "...";
                
                for ($counter = $num_pages - (2 + ($this->num_links * 2)); $counter <= $num_pages; $counter++)
                {
                    if ($counter == $this->cur_page)
                    {
                        $pagination.= "<span class=\"current\">$counter</span>";
                    }
                    else
                    {
                        $pagination .= $this->num_tag_open.'<a >base_url.$counter.'">'.$counter.'</a>'.$this->num_tag_close;
                    }
                }
            }
        }
        
        // Render the "next" link
        if ($this->cur_page < $counter - 1)
        {
            $next = $this->cur_page + 1;
            $pagination .= $this->next_tag_open.'<a >base_url.$next.'">'.$this->next_link.'</a>'.$this->next_tag_close;
        }
        else
            $pagination.= "<span class=\"disabled\">></span>";
        
        
        // Render the "Last" link
        if ($this->cur_page < $counter - 1)
        {
            $pagination .= $this->last_tag_open.'<a >base_url.$num_pages.'">'.$this->last_link.'</a>'.$this->last_tag_close;
         }
        else
            $pagination.= "<span class=\"disabled\">".$this->last_link."</span>";

        // Kill double slashes.  Note: Sometimes we can end up with a double slash
        // in the penultimate link so we'll kill all double slashes.
        $pagination = preg_replace("#([^:])//+#", "\\1/", $pagination);

        // Add the wrapper HTML if exists
        $pagination = $this->full_tag_open.$pagination.$this->full_tag_close;
        
        return $pagination;        
    }
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */
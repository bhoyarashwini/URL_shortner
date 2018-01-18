<?php  

class Main_model extends CI_Model
{
	function Main_model
	{
		parent::__construct();
		
	}
	
	function store_url($full_url, $page_title)
	{
     // create the short url path
	 $short_url = $this->create_url_part();
	 
	 $query_str = "insert into tbl_urlpath(full_url,short_url,page_title,create_date) values (?,?,?,now())";
	 
	 $this->db->query($query_str, array($full_url, $short_url, $page_title));
	  
	 return short_url;
	}
	
	function get_full_url($short_url)
	{
		$query_str = "select "
	}
	function create_url_part()
	{
		$this->load->helper('string');
			
		$is_unique = false;
		do
		{
			$url_part = random_string('alnum', 4);
			
			$is_unique = $this->check_unique_url_part($url_part);
		}while(! $is_unique);
		
		return $url_part;
	}
	
	function check_unique_url_part($url_part)
	{
		$query_str = "select id from tbl_urlpath where short_url = ?";
		$result = $this->db->query($query_str,$url_part);
		if($result->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}

?>
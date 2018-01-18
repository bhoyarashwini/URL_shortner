<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class G extends CI_Controller {

	function __construnct()
	{
		parent::__construnct(); 
		
		$this->load->model('main_model');
		
		$this->load->view('view_main');
	}
	
	public function index()
	{
		$this->load->view('view_main');
		$this->shorten_url();
		
	}
	
	function shorten_url()
	{
		$this->form_validation->set_rules('url','Full url', 'required|trim|xss_clean|max_length[500]|prep_url'); 
		if($this->form_validation->run() == FALSE)
		{
			// not successful yet - show the view 
			$this->load->view('view_main');
		}
		else
		{
			// form validation success  - add short url and return to user
			$full_url = $this->input->post('url',TRUE);
			
			$page_title = $this->_get_page_title($full_url);
			
			$shorten_url = $this->main_model->store_url($full_url,$page_title);
			
			$this->view_data['shorten_url'] = anchor(base_url().'g/o/'.$short_url, base_url.'g/o/', array('title' => 'Click to try out ypur short URL'));
			$this->load->view('view_show_short_url', $this->view_data);
			
			// load a view which shows a shortened 
		}
		
		
		$full_url = $this->input->post('url', TRUE);
		
		$this->_get_page_title($full_url);
		
	//	$this->main_model->store_url($full_url, $page_title);
	}
	
	function o()
	{
		$short_url = $this->uri->segment(3);
		
		if($short_url == '')
		{
			die('There was no short URL passed '); 
		}
		
		$full_url = $this->main_model->get_full_url($short_url);
		
		if(! $full_url)
		{
			die('there was an error');
		}
		else
		{
			// redirect them
			redirect($full_url);
		}
	}
	
	
	function _get_page_title($url)
	{
		//$url = "http://www.simplycodeigniter.com";
		$file = @file($url);
		$file = @implode("",$file);
		//if(preg_match("'/<title>(.+)<\/title>/i,$file','$m'"))
			//return $m[1];
		//else
			//return '';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
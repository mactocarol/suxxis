<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* Basic Class For General use class */

class HT_Controller extends CI_Controller
{
	public $per_page_limit =10;
	function __construct(){
		parent::__construct();
		$this->load->helper('url');        
		$this->userID = $this->session->userdata('admin_id');
		$this->currentUser = $this->session->userdata('user_id');
		}
	
	function CheckLogin(){
		$userID = $this->session->userdata('admin_id');
		if(empty($userID)){
			redirect('admin/logout');
		}
	}
	function CheckUserLogin(){
		$userID = $this->session->userdata('id');
		if(empty($userID)){
			redirect('welcome/login');
		}
	}
	function MailFunction($MailData){
		
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from($MailData['FromEmail'], $MailData['FromName']);
		$this->email->to($MailData['To']); 
		if(!empty($MailData['Cc'])){
			$this->email->cc($MailData['Cc']); 
		}
		if(!empty($MailData['Bcc'])){
			$this->email->bcc($MailData['Bcc']); 
		}
		$this->email->subject($MailData['Subject']);
		$this->email->message($MailData['Message']);
	
		$this->email->send();
	}
	function SetSession($SessionDataArray=array(),$Type=''){
		if($Type=='flash')
			$this->session->set_flashdata($SessionDataArray);
		else
			$this->session->set_userdata($SessionDataArray);
	}
	
	function GetSession($Name,$Type=''){
		if($Type=='flash')
			return $this->session->flashdata($Name);
		else
			return $this->session->userdata($Name);
	}


 	public function custompagination($Data)
{		
		
        $config = array();
        $config["base_url"] =  $Data['url'];
        $total_row = $Data['total_row'];
        $config["total_rows"] = $total_row;
        $config["per_page"] = $Data['per_page'];
        $config['uri_segment'] = $Data['segment'];
        //$config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);
     
        //echo $this->uri->segment($Data['segment']);
        if($this->uri->segment($Data['segment'])){
        $page = ($this->uri->segment($Data['segment'])) ;
          }
        else{
               $page = 0;
        }
        return $page;
}

public function custompagination1($Data)
{

		$config = array();
        $config["base_url"] = $Data['url'];
        $config["total_rows"] = $Data['total_row'];
        $config["per_page"] = $Data['per_page'];
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $Data['total_row'];
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
          }
        else{
               $page = 1;
        }
        return $page;
}

	function Dhlcurl($request_xml,$url){
		if (!$ch = curl_init())
		{
			throw new \Exception('could not initialize curl');
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_PORT , 443);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request_xml);
		$result = curl_exec($ch);

		if (curl_error($ch))
		{
			return false;
		}
		else
		{
			curl_close($ch);
		}

		$final_xml = simplexml_load_string($result);
		return $final_xml;
	}

}
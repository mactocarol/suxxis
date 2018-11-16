<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Support extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('support_model');            
            if( $this->session->userdata('user_group_id') != 2){
               // redirect('user');
            }
        }
        public function index(){             
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }                
            }            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->support_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->support = $this->support_model->SelectRecord('support','*',array(),$orderby=array());
            
            $data->title = 'Support';
            $data->field = 'support';
            $data->page = 'support';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('support_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
}
?>
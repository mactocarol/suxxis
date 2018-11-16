<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tutorial extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('tutorial_model');            
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
            $data->result = $this->tutorial_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                
            
            $data->tutorials = $this->tutorial_model->SelectRecord('tutorial','*',array(),'id desc');
            
            $data->title = 'Tutorial';
            $data->field = 'tutorial';
            $data->page = 'tutorial';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('tutorial_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
}
?>
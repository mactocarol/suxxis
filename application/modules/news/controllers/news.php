<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('news_model');            
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
            $data->result = $this->news_model->SelectSingleRecord('users','*',$udata,$orderby=array());
                        
            $data->news = $this->news_model->SelectRecord('news','*',array(),'id desc');            
            //echo "<pre>"; print_r($data->news); die;
            $data->title = 'News';
            $data->field = 'referal link';
            $data->page = 'news';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('news_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function detail($id){             
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
            $data->result = $this->news_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($id){
            $data->news = $this->news_model->SelectSingleRecord('news','*',array("id"=>$id),'id desc');                
            }
            
            //echo "<pre>"; print_r($data->news); die;
            $data->title = 'News';
            $data->field = 'referal link';
            $data->page = 'news';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('news_detail_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
}
?>
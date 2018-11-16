<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonial extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('testimonial_model');            
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
            $data->result = $this->testimonial_model->SelectSingleRecord('users','*',$udata,$orderby=array());                    
            
            $data->testimonials = $this->testimonial_model->joindataResult('up.user_id','u.id',array(),('up.*,u.username,u.image'),'testimonial as up','users as u','up.id desc');
            
            $data->title = 'My Testimonial';
            $data->field = 'testimonial';
            $data->page = 'testimonial';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('testimonial_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
        public function add(){
            $data=new stdClass();
            
               $udata['text'] = $this->input->post('text');               
               $udata['user_id'] = $this->session->userdata('user_id');
               if($this->testimonial_model->InsertRecord('testimonial',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Your Testimonial Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               
            redirect('testimonial');
        }
        
        
}
?>
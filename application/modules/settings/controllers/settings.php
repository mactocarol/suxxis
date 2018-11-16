<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('settings_model');            
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
            $data->result = $this->settings_model->SelectSingleRecord('users','*',$udata,$orderby=array());                    
            
            $data->title = 'My Settings';
            $data->field = 'referal link';
            $data->page = 'settings';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('settings_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function save(){
            $data=new stdClass();
            //print_r($_POST);die;
            if($_POST){
               if($this->input->post('send_referal_email') != '') $udata['send_referal_email'] = $this->input->post('send_referal_email');               
               if($this->input->post('send_donation_submitted_email') != '') $udata['send_donation_submitted_email'] = $this->input->post('send_donation_submitted_email');
               if($this->input->post('send_donation_approved_email') != '') $udata['send_donation_approved_email'] = $this->input->post('send_donation_approved_email');               
            
               if($this->settings_model->UpdateRecord('users',$udata,array("id"=>$this->session->userdata('user_id')))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Settings Saved Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
            }else{
                $data->error=0;
                $data->success=1;
                $data->message="Settings Saved Successfully";
            }
               $this->session->set_flashdata('item',$data);
               
            redirect('settings');
        }
        
        
}
?>
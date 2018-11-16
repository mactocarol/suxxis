<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Support_panel extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('support_panel_model');
            if( $this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
        }
        public function index(){
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
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
            $data->results = $this->support_panel_model->SelectRecord('support','*',array(),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->support_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Support';
            $data->field = 'Datatable';
            $data->page = 'list_support';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_support_view',$data);
            $this->load->view('admin/includes/footer',$data);		
        }
        
        public function add(){
            
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
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
               $udata['question'] = implode('-',explode(' ',$this->input->post('question')));
               $udata['answer'] = $this->input->post('editor1');               
               if($this->support_panel_model->InsertRecord('support',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Support Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('support_panel/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->support_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Support';
            $data->field = 'Support';
            $data->page = 'add_support';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_support_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }
        
        public function edit($id){
            
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
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
               $udata['question'] = $this->input->post('question');
               $udata['answer'] = $this->input->post('editor1');              
               if($this->support_panel_model->UpdateRecord('support',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Support Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('support_panel/edit/'.$id);
            }
            
            $data->reslt = $this->support_panel_model->SelectSingleRecord('support','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->support_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Support';
            $data->field = 'Support';
            $data->page = 'add_support';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_support_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($this->support_panel_model->delete_record('support',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Support Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('support_panel');
        }
                		        	
}
?>
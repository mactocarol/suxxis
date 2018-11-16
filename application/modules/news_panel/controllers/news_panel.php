<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_panel extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('news_panel_model');
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
            $data->results = $this->news_panel_model->SelectRecord('news','*',array("user_id"=>$this->session->userdata('user_id')),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->news_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List News';
            $data->field = 'Datatable';
            $data->page = 'list_news';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_news_view',$data);
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
               $udata['title'] = implode('-',explode(' ',$this->input->post('title')));
               $udata['description'] = $this->input->post('editor1');
               $udata['user_id'] = $this->session->userdata('user_id');
               if($this->news_panel_model->InsertRecord('news',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="News Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('news_panel/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->news_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'News';
            $data->field = 'News';
            $data->page = 'add_news';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_news_view',$data);
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
               $udata['title'] = implode('-',explode(' ',$this->input->post('title')));
               $udata['description'] = $this->input->post('editor1');              
               if($this->news_panel_model->UpdateRecord('news',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="News Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('news_panel/edit/'.$id);
            }
            
            $data->reslt = $this->news_panel_model->SelectSingleRecord('news','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->news_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'News';
            $data->field = 'News';
            $data->page = 'add_news';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_news_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($this->news_panel_model->delete_record('news',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="News Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('news_panel');
        }
                		        	
}
?>
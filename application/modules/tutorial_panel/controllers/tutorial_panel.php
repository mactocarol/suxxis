<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tutorial_panel extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('tutorial_panel_model');
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
            $data->results = $this->tutorial_panel_model->SelectRecord('tutorial','*',array("user_id"=>$this->session->userdata('user_id')),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->tutorial_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Tutorial';
            $data->field = 'Datatable';
            $data->page = 'list_tutorial';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_tutorial_view',$data);
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
               $string = explode('.',$this->input->post('link'));
                //print_r($string); die;
                if(in_array('youtube',$string)){
                    $str = explode('?',$this->input->post('link'));
                    $newstr = explode('=',$str[1]);
                    $udata['link'] = 'https://www.youtube.com/embed/'.$newstr[1];    
                }else if(in_array('https://vimeo',$string)){
                    $str = explode('/',$this->input->post('link'));                                
                    $udata['link'] = 'https://player.vimeo.com/video/'.$str[3];                            
                }else {
                    $udata['link'] = $this->input->post('link');                                                                
                }
               $udata['user_id'] = $this->session->userdata('user_id');
               $udata['title'] = $this->input->post('title');
               if($this->tutorial_panel_model->InsertRecord('tutorial',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Tutorial Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('tutorial_panel/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->tutorial_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Tutorial';
            $data->field = 'Tutorial';
            $data->page = 'add_tutorial';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_tutorial_view',$data);
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
               $string = explode('.',$this->input->post('link'));
                //print_r($string); die;
                if(in_array('youtube',$string)){                    
                    $str = explode('?',$this->input->post('link'));
                    if($str[1]){
                        $newstr = explode('=',$str[1]);
                        $udata['link'] = 'https://www.youtube.com/embed/'.$newstr[1];    
                    }else{
                        $udata['link'] = $this->input->post('link');
                    }   
                }else if(in_array('https://vimeo',$string)){
                    $str = explode('/',$this->input->post('link'));                                
                    $udata['link'] = 'https://player.vimeo.com/video/'.$str[3];                            
                }else {
                    $udata['link'] = $this->input->post('link');                                                                
                }
               $udata['title'] = $this->input->post('title');
               if($this->tutorial_panel_model->UpdateRecord('tutorial',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Tutorial Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('tutorial_panel/edit/'.$id);
            }
            
            $data->reslt = $this->tutorial_panel_model->SelectSingleRecord('tutorial','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->tutorial_panel_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Tutorial';
            $data->field = 'Tutorial';
            $data->page = 'add_tutorial';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_tutorial_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($this->tutorial_panel_model->delete_record('tutorial',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Tutorial Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('tutorial_panel');
        }
                		        	
}
?>
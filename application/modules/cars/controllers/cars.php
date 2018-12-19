<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cars extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('cars_model');
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
            $cars = $this->cars_model->SelectRecord('cars','*',array("is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->cars_model->SelectRecord('car_photos','image',array("car_id"=>$row['id']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$cars[$key]['image'] = $carphoto;
	    }
	    
	    $data->results = $cars;
	    //$data->results = $this->cars_model->joindataResult('c.id','cp.car_id',array(),array('c.*','cp.image'),'cars as c','car_photos as cp','c.id desc');
	    //echo "<pre>"; print_r($data->results); die;
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->cars_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Cars';
            $data->field = 'Datatable';
            $data->page = 'list_cars';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_cars_view',$data);
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
		$price = [];
		foreach($this->input->post('price') as $key=>$val){
			$key1 = $key + 1;
			$val1 = ($val != '') ? $val : '1' ;
			$price[] = ['k'.$key1 => $val1];
		}
               //echo "<pre>"; print_r($price);die;
               $udata['title'] = $this->input->post('title');
               $udata['description'] = $this->input->post('editor1');
	       $udata['transmission'] = $this->input->post('transmission');
	       $udata['category'] = $this->input->post('category');
	       $udata['fuel_type'] = $this->input->post('fuel_type');
	       $udata['price'] = json_encode($price);
               $udata['user_id'] = $this->session->userdata('user_id');
               if($last_id = $this->cars_model->InsertRecord('cars',$udata)){
			if($_FILES){
				$filesCount = count($_FILES['image']['name']);
				for($i = 0; $i < $filesCount; $i++){
				    $_FILES['file']['name']     = $_FILES['image']['name'][$i];
				    $_FILES['file']['type']     = $_FILES['image']['type'][$i];
				    $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
				    $_FILES['file']['error']     = $_FILES['image']['error'][$i];
				    $_FILES['file']['size']     = $_FILES['image']['size'][$i];
				    
				    //print_r($_FILES['file']); die;
				    // File upload configuration
				    $uploadPath = 'upload/';
				    $config['upload_path'] = $uploadPath;
				    $config['allowed_types'] = 'jpg|jpeg|png|gif';
				    $config['file_name'] = strtotime(date('y-m-d h:i:s')).$_FILES['file']['name'];
				    
				    // Load and initialize upload library
				    $this->load->library('upload', $config);
				    $this->upload->initialize($config);
				    
				    // Upload file to server
				    if($this->upload->do_upload('file')){
					// Uploaded file data				
					$mdata = $this->upload->data();
					//resize profile image
							$config10['image_library'] = 'gd2';
							$config10['source_image'] = $mdata['full_path'];
							$config10['new_image'] = './upload/thumb/'.$mdata['file_name'];
							$config10['maintain_ratio'] = TRUE;
							$config10['width']         = 200;
							$config10['height']       = 200;
							
							$this->load->library('image_lib', $config10);
							
							$this->image_lib->resize();
						    //print_r($udata); die;
						    $image_path= $mdata['file_name']; 
						    $this->cars_model->InsertRecord('car_photos',array("image"=>$image_path,"car_id"=>$last_id));				    	
				    }
				}					
				}
			
                    $data->error=0;
                    $data->success=1;
                    $data->message="Car Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('cars');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->cars_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Cars';
            $data->field = 'Cars';
            $data->page = 'add_cars';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_cars_view',$data);
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
               if($this->cars_model->UpdateRecord('cars',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Cars Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('cars_panel/edit/'.$id);
            }
            
//            $data->reslt = $this->cars_model->SelectSingleRecord('cars','*',array('id'=>$id),$orderby=array());
	    $cars = $this->cars_model->SelectRecord('cars','*',array('id'=>$id,"is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->cars_model->SelectRecord('car_photos','image',array("car_id"=>$row['id']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$cars[$key]['image'] = $carphoto;
	    }
	    
	    $data->reslt = $cars[0];
	    //echo "<pre>"; print_r($data->reslt); die;
	    
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->cars_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Cars';
            $data->field = 'Cars';
            $data->page = 'add_cars';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_cars_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($this->cars_model->UpdateRecord('cars',array("is_deleted"=>'2'),array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Cars Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('cars');
        }
                		        	
}
?>
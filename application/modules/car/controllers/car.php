<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Car extends HT_Controller 
{
	//private $connection;
        public function __construct(){ 
            parent::__construct();
            $this->load->model('car_model');
            $page = '';
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
            
	    $cars = $this->car_model->SelectRecord('cars','*',array("is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->car_model->SelectRecord('car_photos','image',array("car_id"=>$row['id']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$cars[$key]['image'] = $carphoto;
	    }
	    //echo "<pre>"; print_r($cars); die;
	    //$data->cars = $this->car_model->joindataResult('c.id','cp.car_id',array("c.user_id"=>$this->session->userdata('user_id')),'c.*,cp.image','cars as c','car_photos as cp','c.id desc');
	    $data->cars = $cars;
		$data->page_heading = "Find Cars";
		$data->page_link = "Find-cars";		
		$this->load->view('header',$data);            
		$this->load->view('my-cars',$data);
		$this->load->view('footer',$data);			
        }
        
        public function detail($id){
	    
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
                                        
            $cars = $this->car_model->SelectRecord('cars','*',array('id'=>$id,"is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->car_model->SelectRecord('car_photos','image',array("car_id"=>$row['id']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$cars[$key]['image'] = $carphoto;
	    }
	    echo "<pre>"; print_r($cars); die; 
		$data->car = $cars[0]; 
		$data->page_heading = "Car Detail";
		$data->page_link = "Car-Detail";		
		$this->load->view('header',$data);            
		$this->load->view('detail',$data);
		$this->load->view('footer',$data);
                
        }
	
	public function delete($id){		
		$id = base64_decode($id);
		$res = $this->car_model->UpdateRecord('cars',array("is_deleted"=>'2'),array("id"=>$id));
		if($res){
			$data->error=0;
			$data->success=1;
			$data->message='Car deleted successfully';
			$this->session->set_flashdata('item',$data);
		    redirect('My-cars');
		}
		
	}
	
	
	public function booking($id){
	    
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
            if($_POST){
		print_r($_POST); die;
	    }
            $cars = $this->car_model->SelectRecord('cars','*',array('id'=>$id,"is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->car_model->SelectRecord('car_photos','image',array("car_id"=>$row['id']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$cars[$key]['image'] = $carphoto;
	    }
	    
		$data->car = $cars[0];
		//echo "<pre>"; print_r($data); die;
		$data->page_heading = "Book Car";
		$data->page_link = "Book-Car";		
		$this->load->view('header',$data);            
		$this->load->view('booking',$data);
		$this->load->view('footer',$data);
                
        }
	
	public function availability(){
	    
            $data=new stdClass();
	    if($_POST['frm_date'] == ''){
		$data->error = 1;
		$data->type = 'frm_date';
		$data->message = "Please select Pick-up date"; 
	    }else if($_POST['to_date'] == ''){
		$data->error1 = 1;
		$data->type1 = 'to_date';
		$data->message1 = "Please select Return date"; 
	    }
	    
	    $from = $this->input->post('frm_date').' '.$this->input->post('hour_from').':'.$this->input->post('minutes_from'); // or your date as well
	    $to = $this->input->post('to_date').' '.$this->input->post('hour_from1').':'.$this->input->post('minutes_from1'); // or your date as well
	    $datediff = strtotime($to) - strtotime($from);
		
	    $days = round($datediff / (60 * 60 * 24));
	    $days = ($days > 0) ? $days : 1 ;
	    $day = ($days-1) ;
	    $k = 'k'.$days;
	    $cars = $this->car_model->SelectSingleRecord('cars','*',array('id'=>$this->input->post('car_id'),"is_deleted"=>'1'),'id desc');
	    $data->price = json_decode($cars->price)[$day]->$k;
	    echo json_encode($data); die;	    
                
        }
        
        
}
?>
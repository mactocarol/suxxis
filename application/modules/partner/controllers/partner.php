<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Partner extends HT_Controller 
{
	//private $connection;
        public function __construct(){ 
            parent::__construct();
            $this->load->model('partner_model');
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
            
	    $cars = $this->partner_model->SelectRecord('usercars','*',array("user_id"=>$this->session->userdata('user_id'),"is_deleted"=>'1'),'id desc');
	    foreach($cars as $key=>$row){
		$photos = $this->partner_model->SelectRecord('car_photos','image',array("car_id"=>$row['title']),'id desc');
		$carphoto = [];
		foreach($photos as $photo){
			$carphoto[] = $photo['image'];
		}
		$carinfo = $this->partner_model->SelectSingleRecord('cars','*',array("id"=>$row['title']),'id desc');
		//echo "<pre>"; print_r($carinfo); die;
		$cars[$key]['title'] = $carinfo->title;
		$cars[$key]['transmission'] = $carinfo->transmission;
		$cars[$key]['category'] = $carinfo->category;
		$cars[$key]['fuel_type'] = $carinfo->fuel_type;
		$cars[$key]['price'] = ($row['price']);
		$cars[$key]['image'] = $carphoto;
	    }
	    //echo "<pre>"; print_r($cars); die;
	    //$data->cars = $this->partner_model->joindataResult('c.id','cp.car_id',array("c.user_id"=>$this->session->userdata('user_id')),'c.*,cp.image','cars as c','car_photos as cp','c.id desc');
	    $data->cars = $cars;
		$data->page_heading = "My Cars";
		$data->page_link = "My-cars";		
		$this->load->view('header',$data);            
		$this->load->view('my-cars',$data);
		$this->load->view('footer',$data);			
        }
        
        public function add(){
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
            $data->cars = $this->partner_model->SelectRecord('cars',array(),array(),'id desc');
            //print_r($data->cars);die;							                            
            if(!empty($_POST)){
		$info = $this->partner_model->SelectRecord('partner',array(),array("user_id"=>$this->session->userdata('user_id')),array());
		
			    $udata = array(                                                    
					    'company_name'=>$this->input->post('company_name'),
					    'vat_number'=>$this->input->post('vat_number'),
					    'phone_number'=>$this->input->post('phone_number'),                           
					    'street'=>$this->input->post('street'),
					    'address'=>$this->input->post('address'),
					    'country'=>$this->input->post('country'),
					    'state'=>$this->input->post('state'),
					    'city'=>$this->input->post('city'),
					    'zipcode'=>$this->input->post('zipcode'),
					    'user_id'=>$this->session->userdata('user_id')
					);
			    
			    if(empty($info)){
				$this->partner_model->InsertRecord('partner',$udata);
			    }else{
				$this->partner_model->UpdateRecord('partner',$udata,array("user_id"=>$this->session->userdata('user_id')));
			    }
			    
			    
			    $price = [];
				foreach($this->input->post('price') as $key=>$val){
					$key1 = $key + 1;
					$val1 = ($val != '') ? $val : '1' ;
					$price[] = ['k'.$key1 => $val1];
				}
			    $cdata = array(                                                    
					    'title'=>$this->input->post('title'),
					    'description'=>$this->input->post('description'),					    
					    'no_of_cars'=>$this->input->post('no_of_cars'),					    
					    'year'=>$this->input->post('year'),
					    'price'=>json_encode($price), 
					    'user_id'=>$this->session->userdata('user_id')
					);
			    
			    //echo "<pre>"; print_r($cdata); die;
			    $last_id = $this->partner_model->InsertRecord('usercars',$cdata);			    			    
			    
			    $data->error=0;
			    $data->success=1;
			    $data->message='Car registered successfully';
			    $this->session->set_flashdata('item',$data);
			redirect('partner');
                }
		
		if($this->session->userdata('user_id')){			
			$data->companyinfo = $this->partner_model->SelectSingleRecord('partner','*',array("user_id"=>$this->session->userdata('user_id')),$orderby=array());
		}
		
		$data->page_heading = "Add New Car";
		$data->page_link = "Add-car";		
		$this->load->view('header',$data);            
		$this->load->view('add',$data);
		$this->load->view('footer',$data);
                
        }
	
	public function delete($id){		
		$id = base64_decode($id);
		$res = $this->partner_model->UpdateRecord('usercars',array("is_deleted"=>'2'),array("id"=>$id));
		if($res){
			$data->error=0;
			$data->success=1;
			$data->message='Car deleted successfully';
			$this->session->set_flashdata('item',$data);
		    redirect('My-cars');
		}
		
	}
        
        
}
?>
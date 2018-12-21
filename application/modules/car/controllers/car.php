<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Car extends HT_Controller 
{
	//private $connection;
        public function __construct(){ 
            parent::__construct();
            $this->load->model('car_model');
	    $this->load->library('paypal_lib');
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
	    //echo "<pre>"; print_r($cars); die; 
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
	
	
	public function booking($id=Null){
	    
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
		if(!$this->session->userdata('logged_in')){
			$data->error=1;
                        $data->success=0;
                        $data->message= "You must login first to book a car.";
			$this->session->set_flashdata('item',$data);  
			$this->session->set_userdata('return_uri',site_url('car/booking/'.$_POST['car_id']));
                        $this->session->set_userdata('bookingdata',$_POST);
			redirect('user');
		}
		$this->session->set_userdata('bookingdata',$_POST);
		$from = $this->input->post('frm_date').' '.$this->input->post('hour_from').':'.$this->input->post('minutes_from'); // or your date as well
		$to = $this->input->post('to_date').' '.$this->input->post('hour_from1').':'.$this->input->post('minutes_from1'); // or your date as well
		$datediff = strtotime($to) - strtotime($from);
		$data->pickup = $this->input->post('pickup');
		$data->dropoff = $this->input->post('dropoff');
		$days = round($datediff / (60 * 60 * 24));
		$days = ($days > 0) ? $days : 1 ;
		$day = ($days-1) ;
		$k = 'k'.$days;
		$cars = $this->car_model->SelectSingleRecord('cars','*',array('id'=>$this->input->post('car_id'),"is_deleted"=>'1'),'id desc');
		$data->price = json_decode($cars->price)[$day]->$k;
		$data->fdate = $from;
		$data->ldate = $to;
		$data->car = $cars;
		//print_r($data); die;
		$data->page_heading = "Book Car";
		$data->page_link = "Book-Car";		
		$this->load->view('header',$data);            
		$this->load->view('payment_view',$data);
		$this->load->view('footer',$data);
	    }else{
		if($this->session->userdata('bookingdata')){
			$data->bookingdata = $this->session->userdata('bookingdata');
			//print_r($data->bookingdata); die;
			//$this->session->unset_userdata('bookingdata');
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
		    $data->cars = $this->car_model->SelectRecord('cars','*',array("is_deleted"=>'1'),'id desc');	
		    $data->car = $cars[0];
		    //echo "<pre>"; print_r($data->cars); die;
		    $data->page_heading = "Book Car";
		    $data->page_link = "Book-Car";		
		    $this->load->view('header',$data);            
		    $this->load->view('booking',$data);
		    $this->load->view('footer',$data);
	    }
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
	
	public function buy(){
            $data=new stdClass();            
            $this->session->unset_userdata('bookingdata');            
            $order_no = $this->create_order_no();//"ORDER_".uniqid();
            $amt = $this->input->post('amount');
		$fdate = $this->input->post('fdate');
		$ldate = $this->input->post('ldate');
		$carid = $this->input->post('car_id');
		$pickup = $this->input->post('pickup');
		$dropoff = $this->input->post('dropoff');
		
	    $datediff = strtotime($ldate) - strtotime($fdate);
		
	    $days = round($datediff / (60 * 60 * 24));
	    $days = ($days > 0) ? $days : 1 ;
	    $day = ($days-1) ;
	    $k = 'k'.$days;
	    $cars = $this->car_model->SelectSingleRecord('cars','*',array('id'=>$carid,"is_deleted"=>'1'),'id desc');
	    $amt = json_decode($cars->price)[$day]->$k;	
		
	    
            $udata['order_no'] = $order_no;
            $udata['amount'] = $amt;
            $udata['payment_type'] = $this->input->post('payment_method');
            $udata['user_id'] = $this->session->userdata('user_id');
	    
	    //echo "<pre>"; print_r($udata); die;
			
            if($this->input->post('payment_method') == 'paypal'){
                    if($lastid = $this->car_model->InsertRecord('order',$udata)){                        
                            
                            $odata['order_id'] = $order_no;
			    $odata['product_id'] = $carid;
                            $odata['amount'] = $amt;
                            $odata['qty'] = 1;
                            
                            $this->car_model->InsertRecord('order_detail',$odata);
																					  													
				$bdata['user_id'] = $this->session->userdata('user_id');
				$bdata['carid'] = $carid;
				$bdata['fdate'] = $fdate;
				$bdata['ldate'] = $ldate;
				$bdata['pickup'] = $pickup;
				$bdata['dropoff'] = $dropoff;
				$bdata['status'] = 1;
				$bdata['order_id'] = $order_no;
				$this->car_model->InsertRecord('booking',$bdata);								  
							
                        
                    }
                    //Set variables for paypal form
                    $returnURL = base_url().'Booking/success'; //payment success url
                    $cancelURL = base_url().'Booking/cancel'; //payment cancel url
                    $notifyURL = base_url().'Booking/ipn'; //ipn url
                    //get particular product data
                    //$product = $this->product->getRows($id);
                    
                    $userID = $this->session->userdata('user_id'); //current user id
                    $logo = base_url().'assets/images/codexworld-logo.png';
                    
                    $this->paypal_lib->add_field('return', $returnURL);
                    $this->paypal_lib->add_field('cancel_return', $cancelURL);
                    $this->paypal_lib->add_field('notify_url', $notifyURL);
                    $this->paypal_lib->add_field('item_name', $cars->title);
                    $this->paypal_lib->add_field('custom', $order_no);
                    $this->paypal_lib->add_field('item_number',  $userID);            
                    $this->paypal_lib->add_field('amount',  $amt);		
                    $this->paypal_lib->image($logo);
                    
                    $this->paypal_lib->paypal_auto_form();
            }
            
        }
        
        public function success(){
            $data=new stdClass();
            $paypalInfo = $this->input->get();
                //print_r($paypalInfo); die;
                $data->user_id = $paypalInfo['item_number'];
                $data->plan_id = $paypalInfo['item_name']; 
                $data->txn_id = $paypalInfo["tx"];
                $data->payment_amt = $paypalInfo["amt"];
                $data->currency_code = $paypalInfo["cc"];
                $data->order_id = $paypalInfo["cm"];
                $data->status = $paypalInfo["st"];
                                
                $amt = $data->payment_amt;                
                
                $is_txn = $this->car_model->SelectSingleRecord('transactions','*',array('txn_id'=>$data->txn_id),'id desc');
                if(empty($is_txn)){
                    $udata['user_id'] = $data->user_id;            
                    $udata['txn_id'] = $data->txn_id;
                    $udata['order_id'] = $data->order_id;
                    $udata['payment_amt'] = $data->payment_amt;
                    $udata['currency_code'] = $data->currency_code;
                    $udata['status'] = $data->status;
                    $udata['payment_type'] = '2';
                    $udata['payment_mode'] = 'Paypal';
                    if($this->car_model->InsertRecord('transactions',$udata)){
                        $this->car_model->UpdateRecord('order',array("transaction_id"=>$data->txn_id,"payment_status"=>"2"),array("order_no"=>$data->order_id));                            
                            				
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Your Order has been placed successfully";
                        $this->session->set_flashdata('item',$data);
                        redirect('Booking/thankyou');
                    }
                }
        }
        
        public function cancel(){
                $data=new stdClass();                                
                
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Payment Failed , Plese Try Again.";
                    $this->session->set_flashdata('item',$data);
                    redirect('Booking/thankyou');
        }
        
        public function create_order_no(){
            $order = "ORDER_".uniqid();                   
            if($this->car_model->SelectRecord('order','*',array("order_no"=>$order),$orderby=array())){
                $this->create_order_no();
            }
            return $order;
        }
        
	public function thankyou(){
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
		$data->page_heading = "Book Car";
		$data->page_link = "Book-Car";		
		$this->load->view('header',$data);            
		$this->load->view('thankyou',$data);
		$this->load->view('footer',$data);			
	}
        
        
}
?>
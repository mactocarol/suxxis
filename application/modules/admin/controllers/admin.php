<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends HT_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('admin_model');           
        }
        public function index(){
            
            if($this->session->userdata('logged_in') && $this->session->userdata('user_group_id') == 1){
                redirect('admin/dashboard');
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
            
            $this->load->view('login_view',$data);			
        }                        
        
        
        public function login_check()
        {
            $data=new stdClass();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');       
            if ($this->form_validation->run() == FALSE)
            {
                $data->error=1;
                $data->success=0;
                $data->message=validation_errors();
            }
            else
            {
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));
                $Selectdata = array('id','email','username','image');
                $udata = array("email"=>$email,"password"=>md5($password));                
                $result = $this->admin_model->SelectSingleRecord('admin',$Selectdata,$udata,$orderby=array());
                
                $udata = array("username"=>$email,"password"=>md5($password));                
                $result1 = $this->admin_model->SelectSingleRecord('admin',$Selectdata,$udata,$orderby=array());
                //echo "<pre>";
                //print_r($result); die;
                if($result || $result1)
                {
                    if($result){
                        $sess_array = array(
                        'user_id' => $result->id,
                        'email' => $result->username,
                        'image' => $result->image,
                        'user_group_id' => 1,
                        'logged_in' => TRUE
                        );
                    }else if($result1){
                        $sess_array = array(
                        'user_id' => $result1->id,
                        'email' => $result1->username,
                        'user_group_id' => 1,
                        'image' => $result->image,
                        'logged_in' => TRUE
                        );
                    }
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        redirect('admin/dashboard');	
                    
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid Username or Password.';
                    
                }
            }
            $this->session->set_flashdata('item',$data);            
            redirect('admin');
        }
        
        public function dashboard()
        {
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->msg=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $data->total_user = $this->admin_model->countrecords('users',array());
            $data->title = 'Dashboard';
            $data->field = 'Dashboard';
            $data->page = 'dashboard';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('dashboard_view',$data);
            $this->load->view('admin/includes/footer',$data);
        }
        
        
        public function update_profile(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){
                if($this->input->post('password') != ''){
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'email'=>$this->input->post('email'),
                        'username'=>$this->input->post('username'),
                        'password' => md5($this->input->post('password'))
                    );
                }else{
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'username'=>$this->input->post('username'),
                        'email'=>$this->input->post('email')					
                    );
                }
				if ($this->admin_model->UpdateRecord('admin',$udata,array("id"=>$this->session->userdata('user_id'))))
				{
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile Update Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/update_profile');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            
            $data->title = 'Admin Profile';
            $data->field = 'Admin Profile';
            $data->page = 'profile';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('profile_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function upload_image(){
            $data=new stdClass();
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            if($_FILES){
                //print_r($_FILES); die;
                $config=[	'upload_path'	=>'./upload/profile_image/',
                        'allowed_types'	=>'jpg|gif|png|jpeg',
                        'file_name' => strtotime(date('y-m-d h:i:s')).$_FILES["profile_pic"]['name']
                    ];
                //print_r(_FILES_); die;
                $this->load->library ('upload',$config);
                
                if ($this->upload->do_upload('profile_pic'))
                {
                    $adminpic=$this->admin_model->SelectSingleRecord('admin','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());                                        
                    unlink('./upload/'.$adminpic->image);
                    unlink('./upload/thumb/'.$adminpic->image);
                    $udata = $this->upload->data();                    
                                    //resize profile image
                                    $config10['image_library'] = 'gd2';
                                    $config10['source_image'] = $udata['full_path'];
                                    $config10['new_image'] = './upload/profile_image/thumb/'.$udata['file_name'];
                                    $config10['maintain_ratio'] = TRUE;
                                    $config10['width']         = 200;
                                    $config10['height']       = 200;
                                    
                                    $this->load->library('image_lib', $config10);
                                    
                                    $this->image_lib->resize();
                    //print_r($udata); die;
                    $image_path= $udata['file_name'];
                    $this->admin_model->UpdateRecord('admin',array("image"=>$image_path),array("id"=>$this->session->userdata('user_id')));
                    $data->error=0;
                    $data->success=1;
                    $data->message='Uploaded Successfully'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('admin/upload_image');	
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Only jpeg/png/gif/jpg allowed!'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('admin/upload_image');	
                }
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Admin Profile Image';
            $data->field = 'Dashboard';
            $data->page = 'upload_image';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('profile_pic_view',$data);
            $this->load->view('admin/includes/footer',$data);

		}
        
        public function logout()
        {
            $data=new stdClass();
            if($this->session->userdata('logged_in')){
                $this->session->sess_destroy();    
            }
            
            $data->error=0;
            $data->success=1;
            $data->message='Logged Out Successfully';
            $this->session->set_flashdata('item',$data);            
            redirect('admin');
        }
			
        public function pro_price(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){
               
                    $udata=array(
                        'pro_price'=>$this->input->post('price')                        
                    );
               
				if ($this->admin_model->UpdateRecord('admin',$udata,array("id"=>$this->session->userdata('user_id'))))
				{
                    $data->error=0;
                    $data->success=1;
                    $data->message='Pro Price Update Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/pro_price');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            
            $data->title = 'Pro Price';
            $data->field = 'Pro Price';
            $data->page = 'pro_price';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('pro_price',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function add(){
            if($this->session->userdata('user_group_id') != 1){
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
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
                $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),                        
                        'email'=>$this->input->post('email'),
                        'username'=>$this->input->post('username'),
                        'password'=>$this->input->post('password')
                    );
               if($this->admin_model->InsertRecord('users',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="User Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('admin/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Add User';
            $data->field = 'Add User';
            $data->page = 'add_user';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_user_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }
        
        public function lists(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
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
            $data->results = $this->admin_model->SelectRecord('users','*',array("user_type"=>'2'),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Users';
            $data->field = 'Datatable';
            $data->page = 'list_user';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_user_view',$data);
            $this->load->view('admin/includes/footer',$data);		
        }
        
        public function edit($id){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){
                
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),                        
                        'email'=>$this->input->post('email')					
                    );
               
				if ($this->admin_model->UpdateRecord('users',$udata,array("id"=>$id)))
				{
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile Update Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/edit/'.$id);
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $udata = array("id"=>$id);                
            $data->reslt = $this->admin_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'Edit User';
            $data->field = 'Edit User';
            $data->page = 'list_user';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_user_view',$data);
            $this->load->view('admin/includes/footer',$data);			
	}
        
        public function status($id,$userid){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($id); die;
			if($userid){
                $id = ($id == 1) ? '0' : '1';
                //echo $userid; die;
                    $udata=array(
                        'is_verified'=>$id                        
                    );
               
				if ($this->admin_model->UpdateRecord('users',$udata,array("id"=>$userid)))
				{
                    //echo $this->db->last_query(); die;
                    $data->error=0;
                    $data->success=1;
                    $data->message='Status Update Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/lists/');
			//print_r($this->session->flashdata('item')); die;	
			}
                       			
		}
        
        public function delete($id){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            $data=new stdClass();
            if($this->admin_model->delete_record('users',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="User Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('admin/lists');
        }
        
	//**************** Partners **************
	public function ListPartner(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
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
            $data->results = $this->admin_model->SelectRecord('users','*',array("user_type"=>'3'),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Partners';
            $data->field = 'Datatable';
            $data->page = 'list_partner';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_partner_view',$data);
            $this->load->view('admin/includes/footer',$data);		
        }
	
	public function AddPartner(){
            if($this->session->userdata('user_group_id') != 1){
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
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
                $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),                        
                        'email'=>$this->input->post('email'),
                        'username'=>$this->input->post('username'),
                        'password'=>($this->input->post('password') != '') ? $this->input->post('password') : 'e10adc3949ba59abbe56e057f20f883e',
			'user_type' => '3'
                    );
               if($lastid = $this->admin_model->InsertRecord('users',$udata)){
		
			$cdata=array(
				'company_name'=>$this->input->post('company_name'),
				'vat_number'=>$this->input->post('vat_number'),                        
				'phone_number'=>$this->input->post('phone_number'),
				'street'=>$this->input->post('street'),
				'address'=>$this->input->post('address'),
				'country'=>$this->input->post('country'),                        
				'state'=>$this->input->post('state'),
				'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
				'user_id' => $lastid
			    );
			$this->admin_model->InsertRecord('partner',$cdata);
                    $data->error=0;
                    $data->success=1;
                    $data->message="Partner Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('admin/AddPartner');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Add Partner';
            $data->field = 'Add Partner';
            $data->page = 'add_partner';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_partner_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }
	
	public function EditPartner($id){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
		if($_POST){
		$udata = array("id"=>$id);                
		$reslt = $this->admin_model->SelectSingleRecord('users','*',$udata,$orderby=array());	
		    $pass = ($this->input->post('password') != '') ? $this->input->post('password') : $reslt->password;
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),                        
                        'email'=>$this->input->post('email'),
                        'username'=>$this->input->post('username'),
                        'password'=>$pass,							
                    );
               
		if ($this->admin_model->UpdateRecord('users',$udata,array("id"=>$id)))
		{
		    $cdata=array(
			'user_id'=>$id,
                        'company_name'=>$this->input->post('company_name'),
			'vat_number'=>$this->input->post('vat_number'),                        
			'phone_number'=>$this->input->post('phone_number'),
			'street'=>$this->input->post('street'),
			'address'=>$this->input->post('address'),
			'country'=>$this->input->post('country'),                        
			'state'=>$this->input->post('state'),
			'city'=>$this->input->post('city'),
			'zipcode'=>$this->input->post('zipcode'),							
                    );
		    $is_partner = $this->admin_model->SelectSingleRecord('partner','*',array("user_id"=>$id),$orderby=array());
		    if(!empty($is_partner)){
			$this->admin_model->UpdateRecord('partner',$cdata,array("user_id"=>$id));
		    }else{
			$this->admin_model->InsertRecord('partner',$cdata);
		    }
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile Update Sucessfully.';
                     					
		}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/EditPartner/'.$id);
			//print_r($this->session->flashdata('item')); die;	
	    }
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
	    $joinreslt = $this->admin_model->joindataResult('u.id','p.user_id',array('u.id'=>$id),array('u.*','p.company_name','p.phone_number','p.vat_number','p.street','p.address as c_address','p.country as c_country','p.state as c_state','p.city as c_city','p.zipcode as c_zipcode'),'users as u','partner as p','u.id desc');
	    if(!empty($joinreslt)){
		$data->reslt = $joinreslt;
	    }else{		
		$userreslt = $this->admin_model->SelectRecord('users','*',array("id"=>$id),$orderby=array());
		$data->reslt = $userreslt[0];
	    }
	    $data->id = $id;
	    //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Edit Partner';
            $data->field = 'Edit Partner';
            $data->page = 'list_partner';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_partner_view',$data);
            $this->load->view('admin/includes/footer',$data);			
	}
	
	
	public function PartnerCars($id){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;	
            
            $udata = array("id"=>$this->session->userdata('user_id'));
	    $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                        		    
	    
	    $data->user = $this->admin_model->SelectSingleRecord('users','*',array("id"=>$id),$orderby=array());                        		    
	    $data->usercar = $this->admin_model->SelectRecord('usercars','*',array("user_id"=>$id),$orderby=array());	    
	    //print_r($usercar); die;	    
	    //print_r($cars); die;
	    foreach($data->usercar as $key=>$row){
		$info = $this->admin_model->SelectSingleRecord('cars','*',array("id"=>$row['title']),'id desc');		
		$data->usercar[$key]['info'] = $info;
	    }
	    	    
	    //echo "<pre>"; print_r($data->usercar); die;
            $data->title = 'Partner Cars';
            $data->field = 'Datatable';
            $data->page = 'list_partner';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('partner_cars_view',$data);
            $this->load->view('admin/includes/footer',$data);			
	}
	
        public function list_payment(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
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
            $data->results = $this->admin_model->joindataResult('p.user_id','u.id',array(),array('p.*','u.username'),'booking as p','users as u','p.id desc');            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Paymnet';
            $data->field = 'Datatable';
            $data->page = 'list_payment';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_payment_view',$data);
            $this->load->view('admin/includes/footer',$data);		
        }
        
        
        public function upgrade_cost(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){
                //echo "<pre>"; print_r($_POST); die;
                   for($i=1; $i<=7; $i++){ 
                        $udata=array(
                            'level'=>$this->input->post('level'.$i),
                            'cost'=>$this->input->post('cost'.$i)                        			
                        );
                        $this->admin_model->UpdateRecord('upgrade_cost',$udata,array("id"=>$this->input->post('id'.$i)));
                   }
                    
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/upgrade_cost/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->admin_model->SelectRecord('upgrade_cost','*',array(),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Upgrade Cost';
            $data->field = 'upgrade cost';
            $data->page = 'upgrade_cost';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('upgrade_cost_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function loan_upgrade_cost(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){
                //echo "<pre>"; print_r($_POST); die;
                   for($i=1; $i<=3; $i++){ 
                        $udata=array(
                            'level'=>$this->input->post('level'.$i),
                            'cost'=>$this->input->post('cost'.$i),
                            'limit'=>$this->input->post('limit'.$i),
                            'max_period'=>$this->input->post('max_period'.$i),
                            'rate'=>$this->input->post('rate'.$i),
                            'loan_allowed'=>$this->input->post('loan_allowed'.$i),
                            'min_lend_required'=>$this->input->post('min_lend_required'.$i)
                        );
                        $this->admin_model->UpdateRecord('loan_cost',$udata,array("id"=>$this->input->post('id'.$i)));
                   }
                    
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/loan_upgrade_cost/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->admin_model->SelectRecord('loan_cost','*',array("id !="=>4),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Loan Upgrade Cost';
            $data->field = 'loan upgrade cost';
            $data->page = 'loan_upgrade_cost';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('loan_upgrade_cost_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function about_us(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                                   
                        $udata=array(
                            'description'=>$this->input->post('desc')                            
                        );
                        $this->admin_model->UpdateRecord('pages',$udata,array("title"=>"about-us"));                                       
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/about_us/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->admin_model->SelectSingleRecord('pages','*',array("title"=>"about-us"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set About us Page';
            $data->field = 'About us';
            $data->page = 'about_us';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('about_us_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function contact_us(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                
                        $udata=array(
                            'description'=>$this->input->post('desc'),
                            'email'=>$this->input->post('email'),
                            'phone'=>$this->input->post('phone')
                        );
                        $this->admin_model->UpdateRecord('pages',$udata,array("title"=>"contact-us"));                    
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('admin/contact_us/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->admin_model->SelectSingleRecord('pages','*',array("title"=>"contact-us"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Contact us Page';
            $data->field = 'Contact us';
            $data->page = 'contact_us';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('contact_us_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        function check_email_exists($id)
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->admin_model->email_exists($this->input->post('email'),$id) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        public function loan_request(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->admin_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            
                $udata = array("up.status !="=>'1');
                $data->pending = $this->admin_model->joindataResult('up.user_id','u.id',array(),('up.*,u.email'),'loan_payment as up','users as u','up.id');
                    
            //$data->pending = $this->loan_model->SelectRecord('user_payment','*',$udata,$orderby=array());
                $udata = array("up.status"=>'0');
                $pending = $this->admin_model->joindataResult('up.sender_id','u.id',$udata,('up.*,u.email,u.id as userid'),'loan_invest as up','users as u','up.id');
                foreach($pending as $key=>$p){
                    $matrix = $this->admin_model->SelectSingleRecord('matrix','*',array("user_id"=>$p['userid']),$orderby=array());
                    $loan_cost = $this->admin_model->SelectSingleRecord('loan_cost','*',array("name"=>$matrix->level),$orderby=array());
                    $pending[$key]['loan_cost'] = $loan_cost;
                    $current_loan = $this->admin_model->SelectRecord('loan_payment','*',array("lender_id"=>$p['userid'],"status"=>1),$orderby=array());
                    $pending[$key]['loan_cost']->current_loan = count($current_loan);
                }
                $data->invest_list = $pending;
            //echo "<pre>"; print_r($pending); die;
            $data->title = 'Loan Request';
            $data->field = 'Datatable';
            $data->page = 'loan_request';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('pending_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function investment_request(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->admin_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            
                $udata = array("up.status"=>'0');
                $data->pending = $this->admin_model->joindataResult('up.sender_id','u.id',$udata,('up.*,u.email,u.id as userid'),'loan_invest as up','users as u','up.id');
                //echo "<pre>"; print_r($data->pending); die;
                foreach($data->pending as $key=>$p){
                    $matrix = $this->admin_model->SelectSingleRecord('matrix','*',array("user_id"=>$p['userid']),$orderby=array());
                    $loan_cost = $this->admin_model->SelectSingleRecord('loan_cost','*',array("name"=>$matrix->level),$orderby=array());
                    $data->pending[$key]['loan_cost'] = $loan_cost;
                    $current_loan = $this->admin_model->SelectRecord('loan_payment','*',array("lender_id"=>$p['userid'],"status"=>4),$orderby=array());
                    $current_loan1 = $this->admin_model->SelectRecord('loan_payment','*',array("lender_id"=>$p['userid'],"status"=>1),$orderby=array());
                    $data->pending[$key]['loan_cost']->current_loan = count($current_loan) +count($current_loan1);
                }            
            
            //echo "<pre>"; print_r($data->pending); die;
            $data->title = 'Investment Request';
            $data->field = 'Datatable';
            $data->page = 'invest_request';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('investment_request_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function assign_loan(){
            $data=new stdClass();
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            if($_POST){
                $loan_id = $this->input->post('loan');
                $lender_id = $this->input->post('lender');
                $invest_id = $this->input->post('invest_id');

                if($this->admin_model->UpdateRecord('loan_payment',array("lender_id"=>$lender_id,"status"=>4,"updated_at"=>date('Y-m-d h:i:s')),array("id"=>$loan_id))){
                    $loan = get_current_loan_stage($lender_id); 
                    $current_loan1 = $this->admin_model->SelectRecord('loan_payment','*',array("lender_id"=>$lender_id,"status"=>1),$orderby=array());
                    $current_loan2 = $this->admin_model->SelectRecord('loan_payment','*',array("lender_id"=>$lender_id,"status"=>4),$orderby=array());
                    $current_loan = count($current_loan1) + count($current_loan2) ;
                    
                        if($current_loan >= $loan->loan_allowed){
                            $this->admin_model->UpdateRecord('loan_invest',array("status"=>1),array("id"=>$invest_id));
                        }
                    $data->error=0;
                    $data->success=1;
                    $data->message='Lender Assigned Sucessfully.';                                                                                
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';
                }                
            }
            $this->session->set_flashdata('item',$data);
            redirect('admin/loan_request');
        }
        
        public function decline_loan($loan_id){
            $data=new stdClass();
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            if($loan_id){                
                if($this->admin_model->UpdateRecord('loan_payment',array("status"=>3),array("id"=>$loan_id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message='Loan Declined Sucessfully.';                                                                                
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';
                }                
            }
            $this->session->set_flashdata('item',$data);
            redirect('admin/loan_request');
        }
        
        public function decline_invest($id){
            $data=new stdClass();
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            if($id){                
                if($this->admin_model->UpdateRecord('loan_invest',array("status"=>2),array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Investor's request Declined Sucessfully.";                                                                                
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';
                }                
            }
            $this->session->set_flashdata('item',$data);
            redirect('admin/investment_request');
        }
        
        public function loan_payment(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->admin_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                        
                                
            $data->payment = $this->admin_model->SelectRecord('loan_distribution','*',array(),$orderby=array());
              
            //echo "<pre>"; print_r($pending); die;
            $data->title = 'Loan Payments';
            $data->field = 'Datatable';
            $data->page = 'loan_payment';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('loan_payment_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
}
?>
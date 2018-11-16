<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('user_model');
            $page = '';
        }
        public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata('user_group_id') == 3){
                redirect('user/dashboard');
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
                $udata = array("email"=>$email,"password"=>md5($password),"is_verified"=>'1');                
                $result = $this->user_model->SelectSingleRecord('users',$Selectdata,$udata,$orderby=array());
                
                
                $udata = array("username"=>$email,"password"=>md5($password),"is_verified"=>'1');                
                $result1 = $this->user_model->SelectSingleRecord('users',$Selectdata,$udata,$orderby=array());
                
                if($result) { $matrix = $this->user_model->SelectSingleRecord('matrix',array('level'),array('user_id'=>$result->id),$orderby=array()); }
                if($result1) { $matrix = $this->user_model->SelectSingleRecord('matrix',array('level'),array('user_id'=>$result1->id),$orderby=array()); }
                
                //echo $matrix->level; die;
                //echo "<pre>";
                //print_r($result); die;
                if(($result || $result1) && ($matrix->level >= 7))
                {
                    if($result){
                        $sess_array = array(
                        'user_id' => $result->id,
                        'email' => $result->username,
                        'image' => $result->image,
                        'user_group_id' => 3,
                        'logged_in' => TRUE
                        );
                    }else if($result1){
                        $sess_array = array(
                        'user_id' => $result1->id,
                        'email' => $result1->username,
                        'image' => $result->image,
                        'user_group_id' => 3,
                        'logged_in' => TRUE
                        );
                    }
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        redirect('user/dashboard');	
                    
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid Username or Password.';
                    
                }
            }
            $data->msg = 1;
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
        
        public function dashboard()
        {        
            if($this->session->userdata('user_group_id') != 3){
                redirect('user');
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
                    $data->msg=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
                
            $data->parents = $this->user_model->SelectSingleRecord('users','*',array("id"=>$data->result->parent_id),$orderby=array());
            
            $data->upgrade_cost = $this->user_model->SelectRecord('upgrade_cost','*',array(),$orderby=array());
                                
            $data->current_loan = $this->user_model->SelectSingleRecord('loan_invest','*',array("sender_id"=>$this->session->userdata('user_id'),"status"=>0),$orderby=array());
            //echo "<pre>"; print_r($data->current_loan); die;
            $data->title = 'Dashboard';
            $data->field = 'Dashboard';
            $data->page = 'dashboard';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('dashboard_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        
        public function update_profile(){
            if($this->session->userdata('user_group_id') != 3){
                redirect('user');
            }
            $data=new stdClass();
			            
			if($_POST){
                //print_r($_POST); die;
                if($this->input->post('password') != ''){
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('phone'),
                        'gender'=>$this->input->post('gender'),
                        'dob'=>$this->input->post('dob'),
                        'country'=>$this->input->post('country'),
                        'password' => md5($this->input->post('password'))
                    );
                }else{
                    $udata=array(
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('phone'),
                        'gender'=>$this->input->post('gender'),
                        'dob'=>$this->input->post('dob'),
                        'country'=>$this->input->post('country')
                    );
                }
				if ($this->user_model->UpdateRecord('users',$udata,array("id"=>$this->session->userdata('user_id'))))
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
            redirect('user/update_profile');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
                        
            $data->parents = $this->user_model->SelectSingleRecord('users','*',array("id"=>$data->result->parent_id),$orderby=array());
            $data->countries = $this->user_model->SelectRecord('countries','*',array(),$orderby=array());
            
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('profile_view',$data);
            $this->load->view('user/includes/footer',$data);			
		}
        
        public function save_profile_setting(){
            if($this->session->userdata('user_group_id') != 3){
                redirect('user');
            }
            $data=new stdClass();
			            
			if($_POST){
                //print_r($_POST); die;
                if($this->input->post('show_email') !='') $udata['show_email'] = $this->input->post('show_email');
                if($this->input->post('show_avatar') !='') $udata['show_avatar'] = $this->input->post('show_avatar');
                if($this->input->post('show_links') !='') $udata['show_links'] = $this->input->post('show_links');
                if($this->input->post('show_skype') !='') $udata['show_skype'] = $this->input->post('show_skype');
                if($this->input->post('show_phone') !='') $udata['show_phone'] = $this->input->post('show_phone');
                    
                
				if ($this->user_model->UpdateRecord('users',$udata,array("id"=>$this->session->userdata('user_id'))))
				{
                    $data->error=0;
                    $data->success=1;
                    $data->message='Settings Saved Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('user/update_profile');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
                        
            $data->parents = $this->user_model->SelectSingleRecord('users','*',array("id"=>$data->result->parent_id),$orderby=array());
            $data->countries = $this->user_model->SelectRecord('countries','*',array(),$orderby=array());
            
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('profile_view',$data);
            $this->load->view('user/includes/footer',$data);			
		}
        
        public function upload_image(){
            if($this->session->userdata('user_group_id') != 3){
                redirect('user');
            }
            $data=new stdClass();
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
                    $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());                                        
                    unlink('./upload/'.$userpic->image);
                    unlink('./upload/thumb/'.$userpic->image);
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
                    $this->user_model->UpdateRecord('users',array("image"=>$image_path),array("id"=>$this->session->userdata('user_id')));
                    $data->error=0;
                    $data->success=1;
                    $data->message='Uploaded Successfully'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('user/update_profile');	
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Only jpeg/png/gif/jpg allowed!'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('user/update_profile');	
                }
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'User Profile Image';
            $data->field = 'Dashboard';
            $data->page = 'upload_image';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('profile_pic_view',$data);
            $this->load->view('user/includes/footer',$data);

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
            redirect('user');
        }
			
        public function update_notification($id){
            if($this->session->userdata('user_group_id') != 3){
                redirect('user');
            }
            $data=new stdClass();
			    $udata = array("id"=>$id);                
                $url = $this->user_model->SelectSingleRecord('notifications','*',$udata,$orderby=array());        
				if ($this->user_model->UpdateRecord('notifications',array("status"=>1),array("id"=>$id)))
				{                                         					
				}else{
                    
                }
            redirect(site_url().''.$url->url);
			
		}
}
?>
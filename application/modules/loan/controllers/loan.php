<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loan extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('loan_model');            
            $this->load->helper('ht_helper');
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->current_stage = get_current_loan_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $parent_id = 1;
            
            $data->upgrade_cost = get_loan_cost($this->session->userdata('user_id'));
                        
            $data->parents = $this->loan_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image'),'wallet as up','admin as u','up.id');
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));    
            $data->payment = $this->loan_model->SelectSingleRecord('user_payment','*',$udata,('id desc'));
            $data->no_of_payment = $this->loan_model->SelectRecord('loan_payment','*',array("lender_id"=>$this->session->userdata('user_id'),"status"=>1),('id desc'));
            
            $data->title = 'Lend Loan';
            $data->field = 'Lend Loan';
            $data->page = 'lend_loan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('upgrade_account_view',$data);
            $this->load->view('admin/includes/footer',$data);		
        }
        
        
        
        public function pay_lending(){
            $data=new stdClass();
            $subscription_validity = get_subscription_validity($this->session->userdata('user_id'));
            $your_date = date('Y-m-d H:i:s',strtotime('+30 days',strtotime($subscription_validity->created_at)));
            $amount = get_upgrade_cost($this->session->userdata('user_id'));            
            $userdata1 = array("user_id"=>$this->session->userdata('user_id'),                              
                              "amount" => $this->input->post('amount'),//$amount->cost,
                              "wallet_address"=> $this->input->post('address'),
                              "txn_hash" => $this->input->post('hash'),
                              "created_at" => $your_date,
                              "is_lending_fee"=>1
                             );
            //echo "<pre>"; print_r($your_date); die;
            if($this->loan_model->InsertRecord('user_payment',$userdata1)){                                
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Payment info has been submitted successfully, your payment will be renew after verification, please wait upto 2 days.";
                    $this->session->set_flashdata('item',$data);
                    redirect('loan');
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Network Error";
                $this->session->set_flashdata('item',$data);
                redirect('loan');
            }
            
        }
        
        
        
       
        
        public function pending_request(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            
                $udata = array("up.lender_id"=>$this->session->userdata('user_id'),"up.status !="=>'1');
                $data->pending = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','admin as u','up.id');
                    
            //$data->pending = $this->loan_model->SelectRecord('user_payment','*',$udata,$orderby=array());
            
            //print_r($data->pending); die;
            $data->title = 'Pending Loan Request';
            $data->field = 'Datatable';
            $data->page = 'pending_request';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('pending_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function approve($id){            
            $data=new stdClass();            
            $udata = array("id"=>$id);
            $result = $this->loan_model->SelectSingleRecord('loan_payment','*',$udata,$orderby=array());
            //print_r($result); die;
            if(!empty($result) && $result->status == 0){               
                $udata=array(
                        'status'=>1,
                        'updated_at'=> date('Y-m-d h:i:s')
                    );
                    if($this->loan_model->UpdateRecord('loan_payment',$udata,array('id'=>$id))){                                                                            
                                        
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Loan Amount has been Approved successfully";                            
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Network Error";                        
                    }
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Not Permitted";
            }
            $this->session->set_flashdata('item',$data);
            redirect('loan/pending_request');
        }
        
        public function decline($id){            
            $data=new stdClass();            
            $udata = array("id"=>$id);
            $result = $this->loan_model->SelectSingleRecord('loan_payment','*',$udata,$orderby=array());
            
            if(!empty($result) && $result->status == 0){
               // print_r($_POST);die;
                $udata=array(
                        'status'=>2,
                        'updated_at'=> date('Y-m-d h:i:s')
                    );
                    if($this->loan_model->UpdateRecord('loan_payment',$udata,array('id'=>$id))){                                
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Loan has been Declined successfully";                            
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Network Error";                        
                    }
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Not Permitted";
            }
            $this->session->set_flashdata('item',$data);
            redirect('loan/pending_request');
        }
        
        public function current_loan(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                        
            
                $udata = array("up.lender_id"=>$this->session->userdata('user_id'),"up.status "=>'1');            
                $data->recieved = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','admin as u','up.id desc');
                        
            $data->title = 'Current Loan';
            $data->field = 'Datatable';
            $data->page = 'current_loan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('current_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function completed_request(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                        
            
                $udata = array("up.lender_id"=>$this->session->userdata('user_id'),"up.status "=>'3');            
                $data->recieved = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','admin as u','up.id desc');
                        
            $data->title = 'Completed Request';
            $data->field = 'Datatable';
            $data->page = 'completed_request';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('completed_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function apply(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            $loan_cost = $this->loan_model->SelectRecord('loan_cost','*',array(),$orderby=array());
            //print_r($loan_cost); die;
            if($_POST){                
                $amt = $this->input->post('amount');
                if($amt > $loan_cost[2]['limit'] || $amt <100){
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Loan amount must be between 100 and ".$loan_cost[2]['limit'];
                        $this->session->set_flashdata('item',$data);
                        redirect('loan/apply');
                }
                
                
                if($amt <= $loan_cost[0]['limit']) { $level = 7; $period = 60; }
                if($amt > $loan_cost[0]['limit'] && $amt <= $loan_cost[1]['limit']) { $level = 7.2; $period = 90; }
                if($amt > $loan_cost[1]['limit'] && $amt <= $loan_cost[2]['limit']) { $level = 7.3; $period = 120; }
                //echo $level; die;
                $admin = $this->loan_model->joindataResult('m.user_id','u.id',array("m.level >="=> $level),('m.*,u.username,u.email'),'matrix as m','admin as u','m.id desc');
                $upline = get_upline_members($this->session->userdata('user_id')); 
                $lending_admin = [];
                //print_r($admin); die;
                foreach($admin as $u){
                    $user_current_stage = get_current_loan_stage($u['user_id']);                    
                    $current_loan = $this->loan_model->SelectRecord('loan_payment','*',array("lender_id"=> $u['user_id'],"status"=>1),$orderby=array());
                    if($user_current_stage->limit >= $amt && count($current_loan) < $user_current_stage->loan_allowed){                    
                        if(in_array($u['user_id'],$upline))
                         {
                            $lending_admin[] = $u;
                         }
                    }
                }
                $data->lenders = $lending_admin;
                $data->amount = $amt;
                
                if($this->input->post('amt')){
                    if($this->input->post('lender')){
                        $rate = get_current_loan_stage($this->input->post('lender'))->rate;
                        $userdata1 = array("user_id"=>$this->session->userdata('user_id'),                              
                              "amount" => $this->input->post('amt'),
                              "wallet_address"=> '',
                              "txn_hash" => '',                              
                              "lender_id"=>$this->input->post('lender'),
                              "duration" => $this->input->post('duration'), 
                              "rate" => $rate,
                              "due_amount" => (($rate/100)*$this->input->post('amt'))+$this->input->post('amt'),
                             );                        
                        if($this->loan_model->InsertRecord('loan_payment',$userdata1)){                                
                                $data->error=0;
                                $data->success=1;
                                $data->message= "Loan request has been submitted successfully, your loan will be issued after verification.";
                                $this->session->set_flashdata('item',$data);
                                redirect('loan/apply');
                        }
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "You must select atleast one lender";
                        $this->session->set_flashdata('item',$data);                        
                    }
                }
                                           
            }
            
            //print_r($data->pending); die;
            $data->title = 'Apply Loan';
            $data->field = 'loan';
            $data->page = 'apply_loan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('apply_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function my_loan(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            
                $udata = array("up.user_id"=>$this->session->userdata('user_id'));
                $data->loan = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','admin as u','up.id');
                    
            //$data->pending = $this->loan_model->SelectRecord('user_payment','*',$udata,$orderby=array());
            
            //print_r($data->pending); die;
            $data->title = 'My Loan';
            $data->field = 'Datatable';
            $data->page = 'my_loan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('my_loan_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
        
        public function load_duration(){
            $user_id = $this->input->post('userid');
            $user_current_stage = get_current_loan_stage($user_id);
            //print_r($user_current_stage->max_period);
            for($i=1; $i<=($user_current_stage->max_period/30);$i++)
            {
                echo '<option value="'.($i*30).'">'.($i*30).' days</option>';
            }
        }
        
        
	
}
?>
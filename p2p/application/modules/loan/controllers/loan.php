<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loan extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('loan_model');            
            $this->load->helper('ht_helper');
            if( $this->session->userdata('user_group_id') != 2){
               // redirect('user');
            }
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->current_stage = get_current_loan_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $parent_id = 1;
            
            $data->upgrade_cost = get_loan_cost($this->session->userdata('user_id'));
                        
            $data->parents = $this->loan_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image'),'wallet as up','users as u','up.id');
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));    
            $data->payment = $this->loan_model->SelectSingleRecord('user_payment','*',$udata,('id desc'));
            $data->no_of_payment = $this->loan_model->SelectRecord('loan_payment','*',array("lender_id"=>$this->session->userdata('user_id'),"status"=>1),('id desc'));
            
            $data->title = 'Lend Loan';
            $data->field = 'Lend Loan';
            $data->page = 'lend_loan';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('upgrade_account_view',$data);
            $this->load->view('user/includes/footer',$data);		
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
        
        
         public function apply(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
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
                
                
                if($amt <= $loan_cost[0]['limit']) { $period = $loan_cost[0]['max_period']; $rate = $loan_cost[0]['rate'];}
                if($amt > $loan_cost[0]['limit'] && $amt <= $loan_cost[1]['limit']) { $period = $loan_cost[1]['max_period']; $rate = $loan_cost[1]['rate']; }
                if($amt > $loan_cost[1]['limit'] && $amt <= $loan_cost[2]['limit']) { $period = $loan_cost[2]['max_period']; $rate = $loan_cost[2]['rate']; }
                //echo $level; die;
                
                $data->lenders = 1;
                $data->duration = $period/30;
                $data->amount = $amt;
                if($_POST['lender']){
                    $amt = $this->input->post('amt');
                        $userdata1 = array("user_id"=>$this->session->userdata('user_id'),                              
                              "amount" => $amt,
                              "wallet_address"=> '',
                              "txn_hash" => '',                              
                              "lender_id"=>0,
                              "duration" => $this->input->post('duration'), 
                              "rate" => $rate,
                              "due_amount" => ((($rate/100)*$amt) * ($this->input->post('duration')/30))+$amt,
                             );
                        //echo "<pre>"; print_r($userdata1); die;
                        if($this->loan_model->InsertRecord('loan_payment',$userdata1)){                                
                                $data->error=0;
                                $data->success=1;
                                $data->message= "Loan request has been submitted successfully, your loan will be issued after verification.";
                                $this->session->set_flashdata('item',$data);
                                redirect('loan/apply');
                        }
                }                                                       
            }
            
            //print_r($data->pending); die;
            $data->title = 'Apply Loan';
            $data->field = 'loan';
            $data->page = 'apply_loan';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('apply_loan_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
        public function my_investment(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());                        
            
                $udata = array("up.lender_id"=>$this->session->userdata('user_id'));            
                $data->recieved = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','users as u','up.id desc');
                        
            $data->title = 'My Investment';
            $data->field = 'Datatable';
            $data->page = 'current_loan';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('my_investment_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
                               
        
        public function borrow(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
                $udata = array("up.user_id"=>$this->session->userdata('user_id'));
                $data->loan = $this->loan_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'loan_payment as up','users as u','up.id');
                    
            //$data->pending = $this->loan_model->SelectRecord('user_payment','*',$udata,$orderby=array());
            
            //print_r($data->pending); die;
            $data->title = 'My Borrowed Loan';
            $data->field = 'Datatable';
            $data->page = 'my_loan';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('borrow_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
        
        public function invest(){            
            $data=new stdClass();
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $matrix = $this->loan_model->SelectSingleRecord('matrix','*',$udata,$orderby=array());
            
                $loan_cost = $this->loan_model->SelectSingleRecord('loan_cost','*',array("name"=>$matrix->level),$orderby=array());
                
                //echo "<pre>"; print_r($loan_cost); die;
                $limit = $loan_cost->limit;
                $loan_allowed = $loan_cost->loan_allowed;
                $min_lend_req = $loan_cost->min_lend_required;
                
                
                $current_loan = $this->loan_model->SelectRecord('loan_payment','*',array("lender_id"=>$this->session->userdata('user_id'),"status"=>1),$orderby=array());
                $current_loan1 = $this->loan_model->SelectRecord('loan_payment','*',array("lender_id"=>$this->session->userdata('user_id'),"status"=>4),$orderby=array());
                //echo $loan_allowed; die;
                if($loan_allowed > (count($current_loan) + count($current_loan1))){
                    $this->loan_model->InsertRecord('loan_invest',["sender_id"=>$this->session->userdata('user_id'),'status'=>0]);
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Your request to lend the loan has been submitted to admin.";
                    $this->session->set_flashdata('item',$data);
                    redirect('user/dashboard');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message= "You are not eligible to lend the loan.";
                    $this->session->set_flashdata('item',$data);
                    redirect('user/dashboard');
                }                           
        }
        
        
        public function send_money($loan_id){
            if(!$loan_id) redirect('loan/my_investment');
            
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
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->current_stage = get_current_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());            
                                    
            $data->loan = $this->loan_model->SelectSingleRecord('loan_payment','*',array("id"=>$loan_id),$orderby=array());
            if(empty($data->loan)) redirect('loan/my_investment');
            if($data->loan->status == 1 || $data->loan->status == 3) redirect('loan/my_investment');
            $parent_id = $data->loan->user_id;                        
            $data->parents = $this->loan_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image,u.phone,u.show_phone,u.show_email,u.show_avatar'),'wallet as up','users as u','up.id');
            $data->loan_id = $loan_id;
            //echo "<pre>"; print_r($data->parents); die;
            if($_POST){
                if($_POST['amount'] >= $data->loan->amount){
                        $userdata1['sender_id'] = $this->session->userdata('user_id');
                        $userdata1['wallet_address'] = $this->input->post('address');
                        $userdata1['txn_hash'] = $this->input->post('hash');
                        $userdata1['amount'] = $this->input->post('amount');
                        $userdata1['status'] = 1;
                        $userdata1['receiver_id'] = $this->input->post('receiver_id');
                        $this->loan_model->InsertRecord('loan_distribution',$userdata1);
                            $this->loan_model->UpdateRecord('loan_payment',array("status"=>'1'),array("id"=>$loan_id));
                            //echo $this->db->last_query(); die;
                    $data->error=0;
                    $data->success=1;
                    $data->message="Money has been sent successfully";
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Please send proper Amount';
                }
                $this->session->set_flashdata('item',$data);
                redirect('loan/my_investment');
            }
            //echo "<pre>"; print_r($data); die;                        
            $data->title = 'Send Money';
            $data->field = 'upgrade Account';
            $data->page = 'upgrade';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('send_money_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        public function send_back_money($loan_id){
            if(!$loan_id) redirect('loan/borrow');
            
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
            $data->result = $this->loan_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->current_stage = get_current_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->loan_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());            
                                    
            $data->loan = $this->loan_model->SelectSingleRecord('loan_payment','*',array("id"=>$loan_id),$orderby=array());
            if(empty($data->loan)) redirect('loan/borrow');
            if($data->loan->status != 1) redirect('loan/borrow');
            $parent_id = $data->loan->lender_id;                        
            $data->parents = $this->loan_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image,u.phone,u.show_phone,u.show_email,u.show_avatar'),'wallet as up','users as u','up.id');
            $data->loan_id = $loan_id;
            //echo "<pre>"; print_r($data->parents); die;
            if($_POST){
                if($_POST['amount'] >= $data->loan->due_amount){
                        $userdata1['sender_id'] = $this->session->userdata('user_id');
                        $userdata1['wallet_address'] = $this->input->post('address');
                        $userdata1['txn_hash'] = $this->input->post('hash');
                        $userdata1['amount'] = $this->input->post('amount');
                        $userdata1['status'] = 1;
                        $userdata1['receiver_id'] = $this->input->post('receiver_id');
                        $this->loan_model->InsertRecord('loan_distribution',$userdata1);
                            $this->loan_model->UpdateRecord('loan_payment',array("status"=>'3'),array("id"=>$loan_id));
                            //echo $this->db->last_query(); die;
                    $data->error=0;
                    $data->success=1;
                    $data->message="Money has been sent successfully";
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Please send proper Amount';
                }
                $this->session->set_flashdata('item',$data);
                redirect('loan/borrow');
            }
            //echo "<pre>"; print_r($data); die;                        
            $data->title = 'Send Money';
            $data->field = 'upgrade Account';
            $data->page = 'upgrade';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('send_money_back_view',$data);
            $this->load->view('user/includes/footer',$data);
        }

}
?>
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upgrade_account extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('upgrade_account_model');
            $this->load->library('paypal_lib');
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
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->current_stage = get_current_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $parent_id = !empty($data->current_stage) ? get_current_upline_parent($this->session->userdata('user_id'),$data->current_stage->level) : get_current_upline_parent($this->session->userdata('user_id'),0);            
            //print_r($data->current_stage); die;
            $data->upgrade_cost = get_upgrade_cost($this->session->userdata('user_id'));
            
            $data->subscription_validity = get_subscription_validity($this->session->userdata('user_id'));
            
            $data->parents = $this->upgrade_account_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image,u.phone,u.show_phone,u.show_email,u.show_avatar'),'wallet as up','users as u','up.id');
            
            $udata = array("user_id"=>$this->session->userdata('user_id'),"is_lending_fee"=>NULL);    
            $data->payment = $this->upgrade_account_model->SelectSingleRecord('user_payment','*',$udata,('id desc'));
            
            $data->title = 'Upgrade Account';
            $data->field = 'Ipgrade Account';
            $data->page = 'upgrade';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('upgrade_account_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function subscription(){             
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
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->current_stage = get_current_stage($this->session->userdata('user_id'));
            $udata = array("user_id"=>$this->session->userdata('user_id')); 
            $data->my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            $parent_id = !empty($data->current_stage) ? get_current_upline_parent($this->session->userdata('user_id'),($data->current_stage->level - 1)) : get_current_upline_parent($this->session->userdata('user_id'),0);
            //$parent_id = get_current_upline_parent($this->session->userdata('user_id'),($data->current_stage->level - 1));
            //print_r($parent_id); die;
            $data->upgrade_cost = get_current_cost($this->session->userdata('user_id'));
            
            $data->subscription_validity = get_subscription_validity($this->session->userdata('user_id'));
            
            $data->parents = $this->upgrade_account_model->joindata('up.user_id','u.id',array("up.user_id"=>$parent_id),('up.*,u.email,u.username,u.image'),'wallet as up','users as u','up.id');
                        
            $udata = array("user_id"=>$this->session->userdata('user_id'));    
            $data->payment = $this->upgrade_account_model->SelectSingleRecord('user_payment','*',$udata,('id desc'));
            
            $data->title = ' Account subscription';
            $data->field = 'Account subscription';
            $data->page = 'subscription';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('subscription_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function pay(){
            $data=new stdClass();
            
            $amount = get_upgrade_cost($this->session->userdata('user_id'));            
            $userdata1 = array("user_id"=>$this->session->userdata('user_id'),                              
                              "amount" => $this->input->post('amount'),//$amount->cost,
                              "wallet_address"=> $this->input->post('address'),
                              "txn_hash" => $this->input->post('hash')
                             );
            if($this->upgrade_account_model->InsertRecord('user_payment',$userdata1)){                                
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Payment info has been submitted successfully, you would be upgraded after verification, please wait upto 2 days.";
                    $this->session->set_flashdata('item',$data);
                    redirect('upgrade_account');
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Network Error";
                $this->session->set_flashdata('item',$data);
                redirect('upgrade_account');
            }
            
        }
        
        public function pay_subscription(){
            $data=new stdClass();
            $subscription_validity = get_subscription_validity($this->session->userdata('user_id'));
            $your_date = date('Y-m-d H:i:s',strtotime('+30 days',strtotime($subscription_validity->created_at)));
            $amount = get_upgrade_cost($this->session->userdata('user_id'));            
            $userdata1 = array("user_id"=>$this->session->userdata('user_id'),                              
                              "amount" => $this->input->post('amount'),//$amount->cost,
                              "wallet_address"=> $this->input->post('address'),
                              "txn_hash" => $this->input->post('hash'),
                              "created_at" => $your_date,
                              "is_subscription_fee" => 1,
                             );
            //echo "<pre>"; print_r($your_date); die;
            if($this->upgrade_account_model->InsertRecord('user_payment',$userdata1)){                                
                    $data->error=0;
                    $data->success=1;
                    $data->message= "Payment info has been submitted successfully, your subscription will be renew after verification, please wait upto 2 days.";
                    $this->session->set_flashdata('item',$data);
                    redirect('upgrade_account/subscription');
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Network Error";
                $this->session->set_flashdata('item',$data);
                redirect('upgrade_account/subscription');
            }
            
        }
        
        
        
       public function wallet(){            
            $data=new stdClass();
            
            if(!empty($_POST)){
               // print_r($_POST);die;
                $udata=array(
                        'user_id'=>$this->input->post('user_id'),
                        'website'=>$this->input->post('website'),                        
                        'address'=>$this->input->post('address')                        
                    );
                    if($this->upgrade_account_model->InsertRecord('wallet',$udata)){                                
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Your wallet has been added successfully";
                            $this->session->set_flashdata('item',$data);
                            redirect('upgrade_account');
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Network Error";
                        $this->session->set_flashdata('item',$data);
                        redirect('upgrade_account');
                    }
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $data->title = 'Bitcoin Wallet';
            $data->field = 'wallet';
            $data->page = 'wallet';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('bitcoin_wallet_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
        public function edit_wallet(){            
            $data=new stdClass();
            
            if(!empty($_POST)){
               // print_r($_POST);die;
                $udata=array(
                        'website'=>$this->input->post('website'),                        
                        'address'=>$this->input->post('address')                        
                    );
                    if($this->upgrade_account_model->UpdateRecord('wallet',$udata,array('user_id'=>$this->input->post('user_id')))){                                
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Your wallet has been Updated successfully";
                            $this->session->set_flashdata('item',$data);
                            redirect('upgrade_account/wallet');
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message= "Network Error";
                        $this->session->set_flashdata('item',$data);
                        redirect('upgrade_account/wallet');
                    }
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $data->title = 'Bitcoin Wallet';
            $data->field = 'wallet';
            $data->page = 'wallet';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('bitcoin_wallet_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
        public function pending_fee(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            if($data->my_wallet){
                $udata = array("up.wallet_address"=>$data->my_wallet->address,"up.status !="=>'1');
                $data->pending = $this->upgrade_account_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'user_payment as up','users as u','up.id');
            }        
            //$data->pending = $this->upgrade_account_model->SelectRecord('user_payment','*',$udata,$orderby=array());
            
            //print_r($data->pending); die;
            $data->title = 'Pending Membership Fee';
            $data->field = 'Datatable';
            $data->page = 'pending_fee';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('pending_fee_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
        public function approve($id){            
            $data=new stdClass();
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $udata = array("id"=>$id,"wallet_address"=>$my_wallet->address);
            $result = $this->upgrade_account_model->SelectSingleRecord('user_payment','*',$udata,$orderby=array());
            //print_r($result); die;
            if(!empty($result) && $result->status == 0){               
                $udata=array(
                        'status'=>1                                                
                    );
                    if($this->upgrade_account_model->UpdateRecord('user_payment',$udata,array('id'=>$id))){
                                        // Upgrading User to new level
                                        $amount = get_upgrade_cost($result->user_id);                                        
                                        $userdata = array("user_id"=>$result->user_id,
                                                      "level"  => $amount->id,
                                                      "invest" => $amount->cost
                                                     );
                                        
                                        if(get_current_stage($result->user_id)->level >= 7){
                                            $amount = get_loan_cost($result->user_id);
                                            $userdata = array("user_id"=>$result->user_id,
                                                      "level"  => $amount->name,
                                                      "invest" => $amount->cost
                                                     );
                                        }
                                        //print_r($amount); die;
                                        $reslt = $this->upgrade_account_model->SelectSingleRecord('matrix','*',array("user_id"=>$result->user_id),$orderby=array());
                                        //print_r($reslt); die;
                                        if(!$result->is_subscription_fee){
                                            if(empty($reslt)) {  $this->upgrade_account_model->InsertRecord('matrix',$userdata); }else {  $this->upgrade_account_model->UpdateRecord('matrix',$userdata,array("id"=>$reslt->id));}    
                                        }
                                        
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Payment has been Approved successfully";                            
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
            redirect('upgrade_account/pending_fee');
        }
        
        public function decline($id){            
            $data=new stdClass();
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            $udata = array("id"=>$id,"wallet_address"=>$my_wallet->address);
            $result = $this->upgrade_account_model->SelectSingleRecord('user_payment','*',$udata,$orderby=array());
            
            if(!empty($result) && $result->status == 0){
               // print_r($_POST);die;
                $udata=array(
                        'status'=>2                                               
                    );
                    if($this->upgrade_account_model->UpdateRecord('user_payment',$udata,array('id'=>$id))){                                
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Payment has been Declined successfully";                            
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
            redirect('upgrade_account/pending_fee');
        }
        
        public function completed_fee(){            
            $data=new stdClass();
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->upgrade_account_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->my_wallet = $this->upgrade_account_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            if($data->my_wallet){
                $udata = array("up.wallet_address"=>$data->my_wallet->address,"up.status "=>'1');            
                $data->recieved = $this->upgrade_account_model->joindataResult('up.user_id','u.id',$udata,('up.*,u.email'),'user_payment as up','users as u','up.id desc');
            }
            $udata = array("up.user_id"=>$this->session->userdata('user_id'),"up.status "=>'1');            
            $data->sent = $this->upgrade_account_model->joindataResult('up.wallet_address','u.address',$udata,('up.*,u.user_id'),'user_payment as up','wallet as u','up.id desc');
            //print_r($data->pending); die;
            $data->title = 'Completed Membership Fee';
            $data->field = 'Datatable';
            $data->page = 'completed_fee';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('completed_fee_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
	
}
?>
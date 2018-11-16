<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Referal_link extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('referal_link_model');            
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
            $data->result = $this->referal_link_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));    
            $data->reslt = $this->referal_link_model->SelectSingleRecord('matrix','*',$udata,$orderby=array());
            $data->wallet = $this->referal_link_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
            
            $data->title = 'Referal Link';
            $data->field = 'referal link';
            $data->page = 'referal_link';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('referal_link_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function generate(){
            $data=new stdClass();
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            $key= (uniqid()); 
            $link = $key;
            $udata = array("id"=>$this->session->userdata('user_id'));
            $result = $this->referal_link_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            if($result->referal_link == ''){
                    if($this->referal_link_model->UpdateRecord('users',array("referal_link"=>$link),$udata)){
                        $data->error=0;
                        $data->success=1;
                        $data->message="Link Generated Successfully";
                    }else{
                        $data->error=1;
                        $data->success=0;
                        $data->message="Network error";
                    }
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Already Generated";
            }
           $this->session->set_flashdata('item',$data);
           redirect('referal_link');
        }
        
        
        
        public function my_referal(){
            $data=new stdClass();
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
           
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->result = $this->referal_link_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $udata = array("user_id"=>$this->session->userdata('user_id'));
            $data->reslt = $this->referal_link_model->SelectRecord('downline','*',$udata,$orderby=array());
            
            $data->level1 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$this->session->userdata('user_id')),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
            //echo "<pre>"; print_r($data->level1); die;
            foreach($data->level1 as $key => $l1){
                $level2 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$l1['child_id']),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
                $data->level1[$key]['referal_count'] = count($level2);
                $data->level1[$key]['level2'] = $level2;
                    foreach($level2 as $key2 => $l2){                        
                        $level3 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$l2['child_id']),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
                        $data->level1[$key]['level2'][$key2]['referal_count'] = count($level3);
                        $data->level1[$key]['level2'][$key2]['level3'] = $level3;
                        foreach($level3 as $key3 => $l3){                        
                            $level4 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$l3['child_id']),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
                            $data->level1[$key]['level2'][$key2]['level3'][$key3]['referal_count'] = count($level4);
                            $data->level1[$key]['level2'][$key2]['level3'][$key3]['level4'] = $level4;
                            foreach($level4 as $key4 => $l4){                        
                                $level5 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$l4['child_id']),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
                                $data->level1[$key]['level2'][$key2]['level3'][$key3]['level4'][$key4]['referal_count'] = count($level5);
                                $data->level1[$key]['level2'][$key2]['level3'][$key3]['level4'][$key4]['level5'] = $level5;
                                foreach($level5 as $key5 => $l5){                        
                                    $level6 = $this->referal_link_model->joindataResult(('d.child_id'),('u.id'),array("d.user_id"=>$l5['child_id']),array('d.*','u.username','u.email','u.image'),'downline as d','users as u','d.id');
                                    $data->level1[$key]['level2'][$key2]['level3'][$key3]['level4'][$key4]['level5'][$key5]['referal_count'] = count($level6);
                                    $data->level1[$key]['level2'][$key2]['level3'][$key3]['level4'][$key4]['level5'][$key5]['level6'] = $level6;
                                }
                            }
                        }
                    }
            }
            //echo "<pre>"; print_r($data); die;
            //echo $this->db->last_query();
            
            $data->title = 'My Referals';
            $data->field = 'My referals';
            $data->page = 'my referals';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('my_referals_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
	
}
?>
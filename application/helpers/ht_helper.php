<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed');

	
	
    function phpmailer($to,$sub,$msg){        
        require("./PHPMailer/class.phpmailer.php");

            $email = 'info@mactosys.com';
            $password = 'info@12345';
            $to_id = $to;
            $message = $msg;
            $subject = $sub;
            $mail = new PHPMailer;
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host = "mail.mactosys.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "info@mactosys.com";
            $mail->FromName = "Suxxis";            
            $mail->Username = $email;
            $mail->Password = $password;
            if(is_array($to)){
                foreach($to as $val){
                    $mail->addAddress($val);        
                }
            }else{
                $mail->addAddress($to_id);    
            }            
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            //print_r($mail); die;
            $mail->send();
    }
    
    function mail_multiple($to,$sub,$msg){        
        require("./PHPMailer/class.phpmailer.php");

            $email = 'info@mactosys.com';
            $password = 'info@12345';
            $to_id = $to;
            $message = $msg;
            $subject = $sub;
            $mail = new PHPMailer;
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host = "mail.mactosys.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "info@mactosys.com";
            $mail->FromName = "Suxxis";            
            $mail->Username = $email;
            $mail->Password = $password;
            if(is_array($to)){
                foreach($to as $val){
                    $mail->addAddress($val);        
                }
            }else{
                $mail->addAddress($to_id);    
            }            
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            //print_r($mail); die;
            $mail->send();
    }
        
    function get_upgrade_cost($userid){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $query = $CI->db->get('mlm_matrix');            
            $reslt = $query->row();
            
            if(empty($reslt)){
                $CI->db->select('*');
                $CI->db->where(array('id'=>1));
                $query = $CI->db->get('upgrade_cost');            
                $amount = $query->row();                
            }else{
                $level = $reslt->level;
                $CI->db->select('*');
                $CI->db->where(array('id'=>$level+1));
                $query = $CI->db->get('upgrade_cost');            
                $amount = $query->row();                
            }                        
            return $amount;
    }
    
    
    function isPartner($userid){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $query = $CI->db->get('partner');            
            $reslt = $query->row();
            
                                   
            return $reslt;
    }
    
    function get_subscription_validity($userid){
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $CI->db->where(array('status'=>1));
            $CI->db->where(array('is_lending_fee'=>NULL));
            $CI->db->order_by('id','desc');
            $query = $CI->db->get('user_payment');            
            $reslt = $query->row();
            //print_r($reslt); die;
            return $reslt;
    }
    
    function get_user($userid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$userid));
            $query = $CI->db->get('users');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_current_upline_parent($userid, $level){            
            $res = get_parent($userid,$level);
            if($level >= 1){ $res = get_parent($res,$level);}
            if($level >= 2){ $res = get_parent($res,$level);}
            if($level >= 3){ $res = get_parent($res,$level);}
            if($level >= 4){ $res = get_parent($res,$level);}
            if($level >= 5){ $res = get_parent($res,$level);}
            if($level >= 6){ $res = get_parent($res,$level);}
            //print_r($level); die;
            $id = is_user_eligible($res,$level);
            return $id;
            
    }
    
    function get_parent($userid, $level){
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('child_id'=>$userid));
            $query = $CI->db->get('downline');            
            $reslt = $query->row();
            if(!empty($reslt)){
                return $reslt->user_id;                
            }else{
                return 1;
            }            
    }
    
    function is_user_eligible($userid,$level){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $query = $CI->db->get('matrix');            
            $reslt = $query->row();
            if($userid == 1) { return $userid;}
                if($reslt->level > $level)                                
                 {
                    return $userid;                    
                 }else{
                    $p_id = get_parent($userid, $level);
                    return is_user_eligible($p_id,$level);                    
                 }
    }
    
    
    
    function get_current_cost($userid){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $query = $CI->db->get('mlm_matrix');            
            $reslt = $query->row();
            
            if(empty($reslt)){
                $CI->db->select('*');
                $CI->db->where(array('id'=>1));
                $query = $CI->db->get('upgrade_cost');            
                $amount = $query->row();                
            }else{
                $level = $reslt->level;
                $CI->db->select('*');
                $CI->db->where(array('id'=>$level));
                $query = $CI->db->get('upgrade_cost');            
                $amount = $query->row();                
            }                        
            return $amount;
    }
    
    function get_latest_payments(){
            $CI =& get_instance();
            $CI->db->select('up.*,u.username,u.image');
            $CI->db->from('user_payment as up');
            $CI->db->join('users as u','up.user_id = u.id','left');
            $CI->db->where('status','1');
            $CI->db->order_by('id','desc');
            $CI->db->limit(10);
            $query = $CI->db->get();            
            $reslt = $query->result();
            return $reslt;          
    }
    
    function get_loan_cost($userid){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $query = $CI->db->get('mlm_matrix');            
            $reslt = $query->row();
            //print_r($reslt); die;
            if(($reslt->level == 7 || $reslt->level == 7.1)){ 
                $CI->db->select('*');
                $CI->db->where(array('id'=>2));
                $query = $CI->db->get('loan_cost');            
                $amount = $query->row();                
            }else if($reslt->level == 7.2){
                
                $CI->db->select('*');
                $CI->db->where(array('id'=>3));
                $query = $CI->db->get('loan_cost');            
                $amount = $query->row();                
            }else{
                $amount = 0;
            }
            return $amount;
    }
    
    function get_current_loan_stage($userid){                   
            $CI =& get_instance();
            $CI->db->select('lc.*');
            $CI->db->from('matrix as m');
            $CI->db->join('loan_cost as lc','m.level = lc.name','left');
            $CI->db->where(array('m.user_id'=>$userid));
            $query = $CI->db->get('');            
            $reslt = $query->row();
            
                                   
            return $reslt;
    }
    
    function get_time_ago( $time )
    {
        $time_difference = time() - $time;
    
        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    function get_wallet_user($wallet){                   
            $CI =& get_instance();
            $CI->db->select('u.*');
            $CI->db->from('wallet as w');
            $CI->db->join('users as u','w.user_id = u.id','left');
            $CI->db->where(array('w.address'=>$wallet));
            $query = $CI->db->get();            
            $reslt = $query->row();
            
                                   
            return $reslt;
    }
	
    
    function get_upline_members($userid,$reslt=array()){            
            $res = get_parent($userid,0);            
            if($res == 1){
                $reslt[] = $res;
                return $reslt;
            }else{
                $reslt[] = $res;
                return get_upline_members($res,$reslt);
            }
            
    }
    
    function get_notifications($userid){                   
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));
            $CI->db->where(array('status'=>0));
            $query = $CI->db->get('notifications');            
            $reslt = $query->result();
            
                                   
            return $reslt;
    }
?>
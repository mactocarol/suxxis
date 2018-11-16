<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <?php $this->load->view('user/includes/sidebar');?> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcum_outer">
                              <ul>
                                  <li><a href="#">Home</a></li>
                                  <li><?=$page?></li>
                              </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if($this->session->flashdata('item')) {
                                        $items = $this->session->flashdata('item');
                                        if($items->success){
                                        ?>
                                            <div class="alert alert-success">
                                                    <strong>Success!</strong> <?php print_r($items->message); ?>
                                            </div>
                                        <?php
                                        }else{
                                        ?>
                                            <div class="alert alert-danger">
                                                    <strong>Error!</strong> <?php print_r($items->message); ?>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>                                                                                              
                        </div>
                    </div>
                                                                                    
                    
                    <div class="row">
                <div class="col-md-3">
                	<div class="profile_img_outer text-center">
                        <form role="form" id="profile_pic_form" name="" method="post" action="<?php echo base_url().'user/upload_image'; ?>" enctype="multipart/form-data">
                                                 <!-- text input -->
                            <div class="profile_img ">
                                <img src="<?php echo base_url('upload/profile_image/thumb/'.$result->image);?>">
                                <input type="file" class="form-control" name="profile_pic" required >
                                <button type="submit" class="btn btn-primary">change Profile</button>
                            </div>
                        </form>
                    <form role="form" id="profile_pic_form" name="" method="post" action="<?php echo base_url().'user/save_profile_setting'; ?>">    
                    <div class="dashboard-list-box profile_option">
                    	<h4>profile option</h4>
                        <ul>
                    	<li>
                        	<div class="col-md-6">email address</div>
                            <div class="col-md-6">
                            	<div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on <?php if($result->show_email == 1) echo 'active';?>">
                                    <input value="1" name="show_email" type="radio">ON</label>
                                    <label class="btn btn-default btn-off <?php if($result->show_email == 0) echo 'active';?>">
                                    <input value="0" name="show_email" type="radio">OFF</label>
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="col-md-6">avtar</div>
                            <div class="col-md-6">
                            	<div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on <?php if($result->show_avatar == 1) echo 'active';?>">
                                    <input value="1" name="show_avatar" type="radio">ON</label>
                                    <label class="btn btn-default btn-off <?php if($result->show_avatar == 0) echo 'active';?>">
                                    <input value="0" name="show_avatar" type="radio">OFF</label>
                                  </div>
                            </div>
                        </li>
                        <li>
                        	<div class="col-md-6">Social links</div>
                            <div class="col-md-6">
                            	<div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on <?php if($result->show_links == 1) echo 'active';?>">
                                    <input value="1" name="show_links" type="radio">ON</label>
                                    <label class="btn btn-default btn-off <?php if($result->show_links == 0) echo 'active';?>">
                                    <input value="0" name="show_links" type="radio">OFF</label>
                                  </div>
                            </div>
                        </li>
                         <li>
                        	<div class="col-md-6">Sky id</div>
                            <div class="col-md-6">
                            	<div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on <?php if($result->show_skype == 1) echo 'active';?> ">
                                    <input value="1" name="show_skype" type="radio">ON</label>
                                    <label class="btn btn-default btn-off <?php if($result->show_skype == 0) echo 'active';?> ">
                                    <input value="0" name="show_skype" type="radio">OFF</label>
                                  </div>
                            </div>
                        </li>
                         <li>
                        	<div class="col-md-6">phone number</div>
                            <div class="col-md-6">
                            	<div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on <?php if($result->show_phone == 1) echo 'active';?> ">
                                    <input value="1" name="show_phone" name="show_phone" type="radio">ON</label>
                                    <label class="btn btn-default btn-off <?php if($result->show_phone == 0) echo 'active';?> ">
                                    <input value="0" name="show_phone" name="show_phone" type="radio">OFF</label>
                                  </div>
                            </div>
                        </li>
                    </ul>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                    
                    <!--<a href="<?php //echo site_url('referal_link');?>"><button class="btn btn-primary">My Link</button></a>
                    <a href="<?php //echo site_url('referal_link/my_referal');?>"><button class="btn btn-primary">My Referrals</button></a>-->
                    <h6>Invited By: <?=$parents->username.' '.$parents->email ?></h6>
                   </div> 
                </div>
                <div class="col-md-9">
                	<div class="dashboard-list-box margin-top-0">
					<h4>Registration Details</h4>
					<!-- panel-group -->
                     <form action="<?php echo base_url().'user/update_profile'; ?>" method="post" id="profile_form" class="registration_form">
                     	<div class="col-md-12">
                        	 <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" class="form-control input-text" id="usename" value="<?php echo isset($result->username)? $result->username:'';?>" disabled >
                              </div>
                        </div>
                        <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="fname">First name</label>
                                <input type="text" class="form-control input-text" id="f_name" name="f_name" value="<?php echo isset($result->f_name)? $result->f_name:'';?>">
                              </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="lname">Last name</label>
                                <input type="text" class="form-control input-text" id="l_name" name="l_name" value="<?php echo isset($result->l_name)? $result->l_name:'';?>">
                              </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="email">Email id</label>
                                <input type="email" class="form-control input-text" id="email" name="email" value="<?php echo isset($result->email)? $result->email:'';?>">
                              </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control input-text" name="phone" id="phone" value="<?php echo isset($result->phone)? $result->phone:'';?>">
                              </div>
                        </div>
                        <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="gender">Gender</label>
                                Female <input type="radio" name="gender" value="Female" <?php echo ($result->gender == 'Female')? 'checked':'';?>>
                                Male <input type="radio" name="gender" value="Male" <?php echo ($result->gender == 'Male')? 'checked':'';?>>
                              </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="phone">Date of Birth</label>
                                <input class="form-control" type="text" name="dob" id="datepicker" placeholder="Date Of Birth" value="<?php echo isset($result->dob)? $result->dob:'';?>" >                                 
                              </div>
                        </div>
                        <div class="col-md-6">
                        	 <div class="form-group">
                                <label for="joined">joined</label>
                                <input type="text" class="form-control input-text" id="joined" value="<?php echo isset($result->created_at)? date('d-M-Y h:i:s',strtotime($result->created_at)):'';?>" disabled>
                              </div>
                        </div>
                         <div class="col-md-6">                        	 
                             <div class="form-group">
                                <label for="country">country</label>                                    
                                    <select name="country" class="form-control input-text">
                                        <option value="">Select Country</option>
                                        <?php foreach($countries as $c):?>
                                        <option value="<?=$c['name']?>" <?php if($c['name'] == $result->country)echo 'selected';?>><?=$c['name']?></option>
                                        <?php endforeach;?>                                         
                                   </select>                                    
                             </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="(Should be blank if not want to change)" value="">
                             </div>
                        </div>
                         <div class="col-md-6">
                        	 <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="(Should be blank if not want to change)" value="">
                             </div>
                        </div>
                                                                               
                         <div class="col-md-12"> <button type="submit" class="btn btn-default">Submit</button></div>
                        </form> 
    
                   
                </div>    
				</div>
                </div>
                            

<div class="nav-side-menu">
                                <div class="brand">
                                  <div class="center_img">
                                    <img src="<?php echo base_url('upload/profile_image/'.$result->image);?>" class="img-circle">
                                  </div>
                                  <div class="side-nav-txt">
                                  <h3><?php echo ($result->username) ? $result->username : ''; ?></h3>
                                  <p><?php echo ($result->email) ? $result->email : ''; ?></p>
                                </div>
                                </div>
                            <ul class="accordion-menu">
                              <li>
                                <div class="dropdownlink"><a href="dashboard.html">Dashboard</a></div>
                              </li>
                              <li>
                                <div class="dropdownlink"><a href="booking-detail.html">Bookings</a>
                                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <ul class="submenuItems">
                                  <li><a href="booking.html">Bookings Made</a></li>
                                  <li><a href="booking.html">Bookings Received</a></li>
                                </ul>
                              </li>
                              <!-- <li>
                                <div class="dropdownlink">Messages
                                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <ul class="submenuItems">
                                  <li><a href="#">Messaage received</a></li>
                                </ul>
                              </li> -->
                              <li>
                                <div class="dropdownlink"><a href="<?php echo site_url('Update-profile');?>">Profile</a>
                                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <ul class="submenuItems">
                                  <li><a href="<?php echo site_url('Update-profile');?>">Profile Settings</a></li>
                                  <li><a href="data_preferences.html">Data Preferences</a></li>
                                  <li><a href="read_and_replay.html">Read and Reply to Feedback</a></li>
                                </ul>
                              </li>
                              <li>
                                <div class="dropdownlink"><a href="billing.html">Billing</a>
                                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <ul class="submenuItems">
                                  <li><a href="billing.html">Transactions</a></li>
                                  <li><a href="paymentsource.html">Payment Sources</a></li>
                                </ul>
                              </li>
                              
                              <?php
                              $isPartner = isPartner($this->session->userdata('user_id'));
                              if(!empty($isPartner)){ 
                              ?>
                              <li>
                                <div class="dropdownlink"><a href="<?php echo site_url('My-cars'); ?>">My Cars</a>
                                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </div>
                                <ul class="submenuItems">
                                  <li><a href="<?php echo site_url('My-cars'); ?>">List</a></li>
                                  <li><a href="<?php echo site_url('Add-car'); ?>">Add New</a></li>
                                </ul>
                              </li>
                              <?php } ?>
                            </ul>
                            </div><!-- End of nav side menu -->
                            <div class="pro_Cmplte">
                                <div class="park_panel">
                              <div class="panel_heading">
                                <h4>Profile Completeness<span class="que"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span></h4>
                                </div>
                                <div class="Dta_table">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-danger" style="width: 45%;">
                                          <div class="progress-value">45%</div>
                                      </div>
                                  </div>
                                  <div class="dash_sbt sec">
                                    <button type="button" class="verfy">Update Your Profile</button>
                                  </div>
                                </div>
                                   
                            </div>
                              </div><!--End of Profile -->
                            
                              <div class="pro_Cmplte">
                                <div class="park_panel">
                              <div class="panel_heading">
                                <h4>Trust Centre<span class="que"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span></h4>
                                </div>
                                <div class="trst_wrapper">
                                  <div class="trst_bdr">
                                  <div class="trst">
                                    <div class="trst_icn">
                                      <img src="<?php echo base_url('assets/front');?>/images/check.png">
                                    </div>
                                    <div class="trst_icn_txt checked"><p>Email Address</p></div>
                                  </div>
                                  <div class="bdr_btm"></div>
                                </div>
                                <div class="trst_bdr">
                                  <div class="trst">
                                    <div class="trst_icn">
                                      <img src="<?php echo base_url('assets/front');?>/images/error.png">
                                    </div>
                                    <div class="trst_icn_txt unchecked"><p>Facebook Connected</p></div>
                                  </div>
                                  <div class="bdr_btm"></div>
                                </div>
                                <div class="trst_bdr">
                                  <div class="trst">
                                    <div class="trst_icn">
                                      <img src="<?php echo base_url('assets/front');?>/images/error.png">
                                    </div>
                                    <div class="trst_icn_txt unchecked"><p>Profile Photo</p></div>
                                  </div>
                                  <div class="bdr_btm"></div>
                                </div>
                                <div class="trst_bdr">
                                  <div class="trst">
                                    <div class="trst_icn">
                                      <img src="<?php echo base_url('assets/front');?>/images/error.png">
                                    </div>
                                    <div class="trst_icn_txt unchecked"><p>Phone Number</p></div>
                                  </div>
                                  <div class="bdr_btm"></div>
                                </div>
                                </div>
                            </div>
                        </div>
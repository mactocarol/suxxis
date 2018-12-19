<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Partner's Cars
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Partner's Cars</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
                <?php
                if($this->session->flashdata('item')) {
                    $items = $this->session->flashdata('item');
                    if($items->success){
                    ?>
                        <div class="alert alert-success" id="alert">
                                <strong>Success!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }else{
                    ?>
                        <div class="alert alert-danger" id="alert">
                                <strong>Error!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }
                }
                ?>
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/ListPartner" style="color:white">List Partners</a></button>&nbsp;
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List <b><?=$user->username?>'s</b>  Cars</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Model</th>
                      <th>No. Of Cars</th>                                            
                      <th>Year</th>
                      <th style="width:70%">Price</th>                                        
                      <!--<th style="width:5px">Action</th> -->                   
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($usercar)) {
                                $count = 0;                              
                                foreach($usercar as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['info']->title) ? $row['info']->title : ''; ?>                                    
                                  </td>
                                <td>
                                    <?php echo isset($row['no_of_cars']) ? $row['no_of_cars'] : '';   ?>
                                </td>                               
                                <td>
                                    <?php echo isset($row['year']) ? $row['year'] : '';   ?>
                                </td>
                                <td>

                                    <div class="table-responsive mytb">
                                      <table class="table table-bordered">
                                        <thead>
                                          <th colspan="7">Number Of Days</th>
                                        </thead>
                                      <tbody>
                                        <tr>
                                          <td><span>1</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[0]->k1 : ''; ?>">
                                          </div></td>
                                          <td><span>2</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[1]->k2 : ''; ?>">
                                          </div></td>
                                          <td><span>3</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[2]->k3 : ''; ?>">
                                          </div></td>
                                          <td><span>4</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[3]->k4 : ''; ?>">
                                          </div></td>
                                          <td><span>5</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[4]->k5 : ''; ?>">
                                          </div></td>
                                          <td><span>6</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[5]->k6 : ''; ?>">
                                          </div></td>
                                          <td><span>7</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[6]->k7 : ''; ?>">
                                          </div></td>
                                  
                                        </tr>
                                        <tr>
                                          <td><span>8</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[7]->k8 : ''; ?>">
                                          </div></td>
                                          <td><span>9</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[8]->k9 : ''; ?>">
                                          </div></td>
                                          <td><span>10</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[9]->k10 : ''; ?>">
                                          </div></td>
                                          <td><span>11</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[10]->k11 : ''; ?>">
                                          </div></td>
                                          <td><span>12</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[11]->k12 : ''; ?>">
                                          </div></td>
                                          <td>13<div>
                                            <input type="number" name="price[]" class="num" min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[12]->k13 : ''; ?>">
                                          </div></td>
                                          <td><span>14</span><div>
                                            <input type="number" name="price[]" class="num" min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[13]->k14 : ''; ?>">
                                          </div></td>
                                        </tr>
                                        <tr>
                                          <td><span>15</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[14]->k15 : ''; ?>">
                                          </div></td>
                                          <td><span>16</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[15]->k16 : ''; ?>">
                                          </div></td>
                                          <td><span>17</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[16]->k17 : ''; ?>">
                                          </div></td>
                                          <td><span>18</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[17]->k18 : ''; ?>">
                                          </div></td>
                                          <td><span>19</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[18]->k19 : ''; ?>">
                                          </div></td>
                                          <td><span>20</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[19]->k20 : ''; ?>">
                                          </div></td>
                                          <td><span>21</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[20]->k21 : ''; ?>">
                                          </div></td>
                                        </tr>
                                        <tr>
                                          <td><span>22</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[21]->k22 : ''; ?>">
                                          </div></td>
                                          <td><span>23</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[22]->k23 : ''; ?>">
                                          </div></td>
                                          <td><span>24</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[23]->k24 : ''; ?>">
                                          </div></td>
                                          <td><span>25</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[24]->k25 : ''; ?>">
                                          </div></td>
                                          <td><span>26</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[25]->k26 : ''; ?>">
                                          </div></td>
                                          <td><span>27</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[26]->k27 : ''; ?>">
                                          </div></td>
                                          <td><span>28</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[27]->k28 : ''; ?>">
                                          </div></td>
                                        </tr>
                                        <tr>
                                          <td><span>29</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[28]->k29 : ''; ?>">
                                          </div></td>
                                          <td><span>30</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[29]->k30 : ''; ?>">
                                          </div></td>
                                          <td><span>31</span><div>
                                            <input type="number" name="price[]" class="num"  min="1" value="<?php echo isset($row['price']) ? json_decode($row['price'])[30]->k31 : ''; ?>">
                                          </div></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                                                              
                            </tr>                          
                    <?php  } }?>                      
                                                       
                    </tfoot>
                  </table>
                 
              
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  
<section class="mycar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="credit">
             <h4><span>My Car</span></h4>
            </div>
            </div>
        </div><!--End of row -->
        <div class="mycar_dtl product_list list">
           <?php
                    // display error & success messages
                    if(isset($message)) {					
                        if($success){
                        ?>
                          <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> <?php print_r($message); ?>
                          </div>						
                        <?php
                        }else{
                        ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> <?php print_r($message); ?>
                            </div>						
                        <?php
                        }
                    }
                    ?> 
          <?php if(!empty($cars)) {
                foreach($cars as $row){?>  
          <div class="mycar_list">
          <div class="row">
            <div class="col-md-12">
              <div class="thumbnail-container">
                <div class="col-md-11">
                <div class="product-image">
                  <a href="" class="thumbnail product-thumbnail">
                   <?php if(isset($row['image']) && !empty($row['image'])) { ?>
                    <img class="img-fluid" src="<?php echo base_url('upload/'.$row['image'][0]);?>" alt="Ferrari SP38" data-full-size-image-url="<?php echo base_url('assets/front');?>/images/list3.jpg"></a>
                   <?php } else { ?>
                    <img class="img-fluid" src="<?php echo base_url('upload');?>/no-car.jpg" alt="Ferrari SP38" data-full-size-image-url="<?php echo base_url('assets/front');?>/images/list3.jpg"></a>
                  <?php } ?>
                </div>
                <div class="product-meta">
              <h2 class="h3 product-title" itemprop="name"><a href=""><?=$row['title']?></a></h2>
               <div class="product-price-and-shipping ">
                  <!--<span class="price" itemprop="offers" itemscope="" itemtype="">
                    <span itemprop="priceCurrency" content="USD"></span><span itemprop="price" content="23.9">$<?=$row['price']?></span>
                  </span>
                    <span class="leo_day">/day</span>-->
                </div>
                   <div class="leo-info">
                    <div class="product-basic">
                      <div class="leo-extra" data-day="Day">
                        <ul>
                          <li>
                              <img src="<?php echo base_url('assets/front');?>/images/img_536532.png">
                              <span>Automatic transmission: <?php echo ($row['transmission']) ? 'Yes' : 'No'; ?></span>
                            </li>
                            <li>
                              <i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>
                              <span>Number of cars: <?=$row['no_of_cars']?></span>
                            </li>
                            <li>
                              <img src="<?php echo base_url('assets/front');?>/images/tank.png">
                              <span>Fuel type: <?=$row['fuel_type']?></span>
                            </li>
                            <li>
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
                            </li>
                          </ul>
                      </div>
                    </div>
              </div>
              <div class="product-description-short" itemprop="description">
              <?=$row['description']?></div>
              </div>
              </div>
              <div class="col-md-1">
                <a href="<?php echo site_url('Delete-car/'.base64_encode($row['id'])); ?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </div>  
          </div>
      </div>
          </div>
        </div>
          
        <?php } } else { ?>
        <h3>No Car added</h3>
        <?php } ?>
               
        </div>
    </div>
</section>
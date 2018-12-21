<section class="mycar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="credit">
             <h4><span>Thank you</span></h4>
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
               
        </div>
    </div>
</section>
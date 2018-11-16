                            <footer>
                                <p>@2018 suxxis. All Right Reserved</p>
                            </footer>
                        </div>
                        
                    </div>
                    <!-- /#page-content-wrapper -->
                </div>
            </div>
            <!-- /#wrapper -->
    <script src="<?php echo base_url('theme');?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('theme');?>/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript">
        $("#wrapper").toggleClass("toggled");
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script src="<?php echo base_url('theme');?>/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable( );
        $('#example1').DataTable( );
    } );
    </script>
    <script>    
        $(document).ready(function() {
            setTimeout(function(){ $("#alert").css("display","none");}, 10000);
        //alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
        $('#profile_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                f_name: {
                    validators: {
                        notEmpty: {
                            message: 'The First name is required and cannot be empty'
                        },
                    }
                },
                l_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Last name is required and cannot be empty'
                        },
                    }
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: 'The Gender is required.'
                        },
                    }
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: 'The Date of Birth is required.'
                        },
                    }
                },
                
                country: {
                    validators: {
                        notEmpty: {
                            message: 'The Country is required.'
                        },
                    }
                },           
                email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required and cannot be empty '
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_email_exists1",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },    
                
                password: {
                    validators: {					
                        identical: {
                            field: 'con_pass',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                repassword: {
                    validators: {					
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
            }
        });
    
        });
      </script>
    <script>
$(document).ready(function() {
   function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
} );
</script>
      <script type="text/javascript" src="<?php echo site_url('assets');?>/js/smk-accordion.js"></script> 
        <script type="text/javascript">
                jQuery(document).ready(function($){
                    $(".accordion_example").smk_Accordion({
							
				closeAble: true,
				
						
						});			
                });
            </script>
        
        <script src="<?php echo base_url('theme');?>/js/jquery-ui.js"></script>
            <script>
            $( function() {
              $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
            } );
            </script>
            
            <script src="<?php echo base_url('theme');?>/js/jquery.liMarquee.js"></script>
            
            
            <!-- Initialization of plugin -->
            <script>
            $(window).on('load',function(){
                $('.str9').liMarquee({
                    direction: 'right',
                    circular:true,
                    startShow:true,
					loop:-1,			
					scrolldelay: 0,		
					scrollamount:20,	
					drag: true			
                });
            })
            </script> 
    
    </body>
    </html>
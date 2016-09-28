<?php 
/*
 * Template     : File/change password view 
 * Descripttion : Change password Home Page.
 */
?>

<!-- extend the master layout | /app/modules/layout/master.blade.php -->
@extends('layout::master')


<!-- Set the title here -->
@section('title')    
    <title>Change Password </title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Change Password</li>
@stop


<!-- main content area start here -->
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i> 
                <strong> Change Password : </strong>
                <span>
                    Update password 
                </span>
            </h1>
        </div>        
    </div>

    
    <?php if($errors->any()){ ?>
        <article class="col-sm-12">
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert">
                    ×
                </button>
                <i class="fa-fw fa fa-info "></i>
                    <?php echo $errors->first(); ?>
            </div>
        </article>       
   <?php } ?>
    <?php if(isset($success)){ ?>
        <article class="col-sm-12">
            <div class="alert alert-danger fade in">
                <button class="close" data-dismiss="alert">
                    ×
                </button>
                <i class="fa-fw fa fa-info "></i>
                    <?php echo $success; ?>
            </div>
        </article>       
   <?php } ?>

    <!-- change password content goes here -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                    <h2>Change Password</h2>

                </header>

                <!-- widget div-->
                <div>
                    
                    <!-- widget content -->
                    <div class="widget-body">

                        <form class="form-horizontal" name="changePasswordForm" id="changePasswordForm" method="post" action="/user-change-password" role="form" data-toggle="validator"  novalidate="novalidate">


                            <div class="form-group">
                               <label class="col-md-2 control-label">Old Password</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Enter old/current password" type="password" name="cp_old_password" id="cp_old_password" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-group">
                               <label class="col-md-2 control-label">New Password</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Enter new password" type="password" name="cp_new_password" id="cp_new_password" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-group">
                               <label class="col-md-2 control-label">Confirm Password</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Confirm password" type="password" name="cp_confirm_password" id="cp_confirm_password" value="" required>
                               </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" id="submitButton" name="submitButton">
                                            <i class="fa fa-save"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->
        
    </div>
    <!-- change password content end here -->
    
     <script type="text/javascript">
            //runAllForms();
            
            $(function() {
                
                // Validation
                $("#changePasswordForm").validate({
                    // Rules for form validation
                    rules : {
                        cp_old_password : {                        
							required    : true,
							minlength   : 5
							
						},
                        cp_new_password : {
							required    : true,
							minlength   : 5
							
						},
                        cp_confirm_password : {
							required    : true,
							minlength   : 5,
                            equalTo     : "#cp_new_password"
							
						}
                        
                    },
                    // Messages for form validation
                    messages: {
                        cp_old_password : {
                            required: '* This is required field !'                            
                        },
                        cp_new_password : {
                            required: '* This is required field !'                            
                        },
                        cp_confirm_password : {
                            required: '* This is required field !'                            
                        },
                    },
                    
                    highlight: function(element) {
                        $(element).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    errorElement: 'span',
                    errorClass: 'help-block',
                    errorPlacement: function(error, element) {
                        if(element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
            });
                    
        </script>

@stop

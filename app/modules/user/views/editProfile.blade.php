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
    <title>Edit Password </title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Edit Profile</li>
@stop


<!-- main content area start here -->
@section('content')
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i> 
                <strong> Edit Profile : </strong>
                <span>
                    change your profile information here.
                </span>
            </h1>
        </div>        
    </div>
    
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

                        <form class="form-horizontal" name="editProfileForm" id="editProfileForm" method="post" action="" role="form" data-toggle="validator"  novalidate="novalidate">


                            <div class="form-group">
                               <label class="col-md-2 control-label">Username</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Enter old/current password" type="password" name="cp_old_password" id="cp_old_password" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-group">
                               <label class="col-md-2 control-label">Email</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Enter new password" type="password" name="cp_new_password" id="cp_new_password" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-group">
                               <label class="col-md-2 control-label">Password</label>
                               <div class="col-md-8">
                                   <input class="form-control" placeholder="Re-enter new password" type="password" name="cp_re_new_password" id="cp_re_new_password" value="" required>
                               </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="brandId" id="brandId" value="">
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
							required : true,
							minlength : 5
							
						},
                        cp_new_password : {
							required : true,
							minlength : 5
							
						},
                        cp_re_new_password : {
							required : true,
							minlength : 3
							
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
                        cp_re_new_password : {
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
            }).attr('novalidate', 'novalidate')
                .submit(function(e) {
                    var form = $(this);
                    // client-side validation OK.
                    if (!e.isDefaultPrevented()) {
                        
                        e.preventDefault();
                        
//                        $.post(formAction, postArray, function(data) {
//                            //if correct login detail
//
//                            if (data == 'yes') {
//                                //document.location = "/brand";
//                                getBrandList();
//                                getBrandForm();
//                                var message = '';
//
//                                if(action =='add') {
//                                    message += ' Brand has been added';
//                                } else if(action =='update') {
//                                    message += ' Brand has been updated';
//                                }
//
//                                $("#message").show()
//                                    .removeClass()
//                                    .css( "display","block" )
//                                    .addClass("alert alert-success fade in").
//                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Success</strong>' + message);
//
//
//                            } else if(data == 'duplicate') { 
//
//                            } else {
//                                if (action == "add") {   
//                                    $("#message").show()
//                                    .removeClass()
//                                    .css( "display","block" )
//                                    .addClass("alert alert-danger fade in").
//                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not added');
//
//                                } else if (action == "update") {   
//                                    $("#message").show()
//                                    .removeClass()
//                                    .css( "display","block" )
//                                    .addClass("alert alert-danger fade in").
//                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not updated');
//
//                                } else {
//                                    $("#message").show()
//                                        .removeClass()
//                                        .css( "display","block" )
//                                        .addClass("alert alert-danger fade in").
//                                        html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not add/update succesfully');
//                                }
//                            }
//                        });
                    }
               });
                    
        </script>

@stop

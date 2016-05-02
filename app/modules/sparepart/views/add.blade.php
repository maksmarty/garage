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
    <title>Garage | Add Spare Part</title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Add Spare Part</li>
@stop


<!-- main content area start here -->
@section('content')
    {{ HTML::script('js/application.js');  }}
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i>

                @if($item->spare_part_id)
                    <strong> Update Spare Part : </strong>
                    <span>
                        Update Spare Part here.
                    </span>
                @else
                    <strong> Add Spare Part : </strong>
                    <span>
                        Add Spare Part here.
                    </span>
                @endif



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
                    @if($item->spare_part_id)
                        <h2>Update Spare Part</h2>
                    @else
                        <h2>Add Spare Part</h2>
                    @endif

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        @if($item->spare_part_id)
                            <form class="form-horizontal" name="addUpdateSparePartForm" id="addUpdateSparePartForm" method="post" action="{{route('sparepart.post.update',$item->spare_part_id)}}" enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" name="addUpdateSparePartForm" id="addUpdateSparePartForm" method="post" action="{{route('sparepart.post.add')}}" enctype="multipart/form-data">
                        @endif

                        @include('layout::partials.alerts.errors')

                        @include('layout::partials.alerts.message')



                                {{--role="form" data-toggle="validator"  novalidate="novalidate"--}}


                            {{--@if(Session::has('message'))--}}
                                {{--<div class="alert alert-box alert-success">--}}
                                    {{--<h2>{{ Session::get('message') }}</h2>--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Spare Make</label>
                                <div class="col-md-8">
                                        {{ Form::select('showroom_make_id', $make, $item->showroom_make_id, ['class' => 'form-control make_arequest','required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Branch Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update Branch Name" type="text" name="branch_name" id="branch_name" value="{{$item->branch_name}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Phone</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update phone" type="text" name="phone" id="phone" value="{{$item->phone}}" >

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Internal Phone</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update phone" type="text" name="internal_phone" id="internal_phone" value="{{$item->internal_phone}}" >

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Address" rows="3" name="address" >{{$item->address}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Working Hours</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Working Hours" rows="3" name="working_time" >{{$item->working_time}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Status </label>
                                <div class="col-md-8">
                                    {{ Form::select('status', ['1'=>'Active','0'=>'Inactive'] , $item->status, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="spare_part_id" id="spare_part_id" value="">
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

//            $(function() {
//                $('#add-more').on('click',function(e){
//                    e.preventDefault();
//                    var imageContainer = $(this).closest('.image-groups-custom');
//                    var firstImage = imageContainer.children(":nth-child(5)").clone();
//                    imageContainer.append(firstImage);
//                });
//            });
            
           /* $(function() {
                
                // Validation
                $("#addUpdateCategoryForm___").validate({
                    // Rules for form validation
                    rules : {
                        name : {
							required : true
						}
                        
                    },
                    // Messages for form validation
                    messages: {
                        name : {
                            required: '* This is required field !'                            
                        }
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
                        var formAction = '/category/add';
                        var postArray = {
                            name : $('#name').val()

                        };

                        $.post(formAction, postArray, function(data) {
                            //if correct login detail

                            if (data == 'yes') {
                                //document.location = "/brand";
                                var message = '';

                                if(action =='add') {
                                    message += ' Brand has been added';
                                } else if(action =='update') {
                                    message += ' Brand has been updated';
                                }

                                $("#message").show()
                                    .removeClass()
                                    .css( "display","block" )
                                    .addClass("alert alert-success fade in").
                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Success</strong>' + message);


                            } else if(data == 'duplicate') {

                            } else {
                                if (action == "add") {
                                    $("#message").show()
                                    .removeClass()
                                    .css( "display","block" )
                                    .addClass("alert alert-danger fade in").
                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not added');

                                } else if (action == "update") {
                                    $("#message").show()
                                    .removeClass()
                                    .css( "display","block" )
                                    .addClass("alert alert-danger fade in").
                                    html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not updated');

                                } else {
                                    $("#message").show()
                                        .removeClass()
                                        .css( "display","block" )
                                        .addClass("alert alert-danger fade in").
                                        html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error!</strong> Brand not add/update succesfully');
                                }
                            }
                        });
                    }
               });*/
                    
        </script>

@stop

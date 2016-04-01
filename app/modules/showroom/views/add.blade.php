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
    <title>Add Car | Show Room</title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Add Car</li>
@stop


<!-- main content area start here -->
@section('content')
    {{ HTML::script('js/application.js');  }}
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i>

                @if($item->showroom_car_id)
                    <strong> Update Car : </strong>
                    <span>
                        Update Car here.
                    </span>
                @else
                    <strong> Add Car : </strong>
                    <span>
                        Add Car here.
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
                    @if($item->showroom_car_id)
                        <h2>Update Car</h2>
                    @else
                        <h2>Add Car</h2>
                    @endif

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        @if($item->showroom_car_id)
                            <form class="form-horizontal" name="addUpdateCarsForm" id="addUpdateCarsForm" method="post" action="{{route('showroom.post.update',$item->showroom_car_id)}}" enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" name="addUpdateCarsForm" id="addUpdateCarsForm" method="post" action="{{route('showroom.post.add')}}" enctype="multipart/form-data">
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
                                <label class="col-md-2 control-label" for="select-1">Make</label>
                                <div class="col-md-8">
                                        {{ Form::select('showroom_make_id', $make, $item->showroom_make_id, ['class' => 'form-control make_arequest','required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Parent Model</label>
                                <div class="col-md-8">
                                    {{ Form::select('parent_model', $parentModel, $item->parent_model, ['class' => 'form-control parent_model_arequest','required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Has Child ? </label>
                                <div class="col-md-8">
                                    {{ Form::select('hasChild', [''=>'Select one'] + \Config::get('constant.parent') , $item->hasChild, ['class' => 'form-control','required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Model</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update Model" type="text" name="model" id="model" value="{{$item->model}}" required>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Year</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update year" type="number" name="year" id="year" value="{{$item->year}}" >

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Engine</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update engine" type="text" name="engine" id="engine" value="{{$item->engine}}" >

                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Transmission</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update transmission" type="text" name="transmission" id="transmission" value="{{$item->transmission}}" >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Payment System</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update payment" type="text" name="payment" id="payment" value="{{$item->payment}}" >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Price</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update price" type="text" name="price" id="price" value="{{$item->price}}" >

                                    </div>
                                </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Description" rows="3" name="description" >{{$item->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Contact</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Contact" rows="3" name="contact" >{{$item->contact}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Working Hours</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Working Hours" rows="3" name="working_hours" >{{$item->working_hours}}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Warranty</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Warranty" rows="3" name="warranty" >{{$item->warranty}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Display type</label>
                                <div class="col-md-8">
                                    {{ Form::select('display', [''=>'Select display type'] + \Config::get('constant.showroom_display'), $item->display, ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Status </label>
                                <div class="col-md-8">
                                    {{ Form::select('status', ['1'=>'Active','0'=>'Inactive'] , $item->status, ['class' => 'form-control']) }}
                                </div>
                            </div>


                            <div class="image-groups-custom">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image[]" onchange="this.parentNode.nextSibling.value = this.value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image[]" onchange="this.parentNode.nextSibling.value = this.value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image[]" onchange="this.parentNode.nextSibling.value = this.value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image[]" onchange="this.parentNode.nextSibling.value = this.value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image[]" onchange="this.parentNode.nextSibling.value = this.value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-8">
                                        <a id="add-more" href="">Add More</a>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">

                                    @if($photos)

                                        @foreach ($photos as $photo)

                                            <div class="row" style="padding: 10px;">

                                                <label class="col-md-2"></label>
                                                <div class="col-md-2">
                                                <img src="{{Helpers::build_image ( $photo->photo_name, 'showroom', '100' )}}">
                                                </div>
                                            </div>


                                        @endforeach

                                    @endif

                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="showroom_car_id" id="showroom_car_id" value="">
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
                $('#add-more').on('click',function(e){
                    e.preventDefault();
                    var imageContainer = $(this).closest('.image-groups-custom');
                    var firstImage = imageContainer.children(":nth-child(5)").clone();
                    imageContainer.append(firstImage);
                });
            });
            
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

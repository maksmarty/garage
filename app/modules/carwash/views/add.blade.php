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
    <title>Add Car wash | Garage</title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Add Car wash</li>
@stop


<!-- main content area start here -->
@section('content')
    {{ HTML::script('js/application.js');  }}
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i>

                @if($item->boat_fishing_id)
                    <strong> Update Car wash : </strong>
                    <span>
                        Update Car wash here.
                    </span>
                @else
                    <strong> Car wash : </strong>
                    <span>
                        Car wash here.
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
                    @if($item->car_wash_id)
                        <h2>Update Car wash</h2>
                    @else
                        <h2>Add Car wash</h2>
                    @endif

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        @if($item->car_wash_id)
                            <form class="form-horizontal" name="addUpdateCarwashForm" id="addUpdateCarwashForm" method="post" action="{{route('carwash.post.update',$item->boat_fishing_id)}}" enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" name="addUpdateCarwashForm" id="addUpdateCarwashForm" method="post" action="{{route('carwash.post.add')}}" enctype="multipart/form-data">
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
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update Name" type="text" name="name" id="name" value="{{$item->name}}" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Description</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update description" type="text" name="description" id="description" value="{{$item->description}}" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Phone</label>
                                    <div class="col-md-8">
                                        <input class="form-control" placeholder="Add/Update Phone" type="text" name="phone" id="phone" value="{{$item->phone}}" required>

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
                                                <img src="{{Helpers::build_image ( $photo->photo_name, 'carwash', '100' )}}">
                                                </div>
                                            </div>


                                        @endforeach

                                    @endif

                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="boat_fishing_id" id="boat_fishing_id" value="">
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

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
    <title>Item</title>
@stop	
 
<!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Add Item</li>
@stop


<!-- main content area start here -->
@section('content')
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i>

                @if($item->item_id)
                    <strong> Update Item : </strong>
                    <span>
                        Update Item here.
                    </span>
                @else
                    <strong> Add Item : </strong>
                    <span>
                        Add Item here.
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
                    @if($item->item_id)
                        <h2>Update Item</h2>
                    @else
                        <h2>Add Item</h2>
                    @endif

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        @if($item->item_id)
                            <form class="form-horizontal" name="addUpdateItemsForm" id="addUpdateItemsForm" method="post" action="{{route('item.post.update',$item->item_id)}}" enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" name="addUpdateItemsForm" id="addUpdateItemsForm" method="post" action="{{route('item.post.add')}}" enctype="multipart/form-data">
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
                                <label class="col-md-2 control-label" for="select-1">Categories</label>
                                <div class="col-md-8">

                                    @if($item->item_id)
                                        {{$item->category_name}}
                                    @else
                                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control','required' => 'required']) }}
                                    @endif


                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label">Phone</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update Phone" type="tel" name="phone" id="phone" value="{{$item->phone}}" required>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Phone 2</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update Phone" type="tel" name="phone1" id="phone1" value="{{$item->phone1}}" required>

                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-2 control-label">Phone 3</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Add/Update Phone" type="tel" name="phone2" id="phone2" value="{{$item->phone2}}" required>

                                </div>
                            </div>





                            <div class="form-group">
                                <label class="col-md-2 control-label">Description</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Add/Update Description" rows="3" name="description" required>{{$item->description}}</textarea>
                                </div>
                            </div>

{{--                            <div class="form-group">
                                <label class="col-md-2 control-label">Image</label>
                                <div class="col-md-8">
                                    <input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">
                                </div>


                            </div>--}}



                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="item_id" id="item_id" value="">
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

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

@section('scripts')
{{ HTML::script('js/ajax_redraw.js'); }}
{{ HTML::script('js/search.js'); }}
{{ HTML::script('js/jquery.typing-0.2.0.min.js'); }}
@stop


        <!-- Set the breadcrumb here -->
@section('breadcrumb')   
    <li>Home</li><li>Items</li>
@stop


<!-- main content area start here -->
@section('content')
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-edit fa-fw "></i> 
                <strong> List Item : </strong>
                <span>
                    Add/Update listed items here.
                </span>
            </h1>
        </div>        
    </div>

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->



                <!-- widget div-->


                <div class="dt-toolbar">
                    <div class="col-xs-12 col-sm-12">
                        <div class="dataTables_filter">
                            <label class="pull-left">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-search"></i>
                        </span>
                                <input type="text" id="filter__item_list" name="filter__item_list" class="search fr form-control" placeholder="Search by phone ..." />
                            </label>


                            <label class="pull-right">

                                <a class="btn btn-success" href="{{route('item.add')}}">
                                    <i class="fa fa-plus"></i> <span class="hidden-mobile">Add New Item</span>
                                </a>
                            </label>

                        </div>
                    </div>
                </div>

                <div>
                    @include('layout::partials.alerts.errors')

                    @include('layout::partials.alerts.message')


                            <!-- widget content -->
                    <div id = "list__item_list"></div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->





            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->



    </div>

    <!-- end row -->



</section>
<!-- end widget grid -->




<script type="text/javascript">
    var field = "item_list";
    var section = "";
    var attorney_listId = '';

    $(document).ready(function() {
        //getFilesList();

    });


    function getFilesList() {

        record_id = "<?php echo Request::segment(3); ?>";

        var field = "item_list";

        listSpecificParams = {
            section: section
        }

        if (window.location.hash) {
            str = window.location.hash;
            str = str.substr(2);
            arr = str.split('&');
            postArray = {};
            var extraParam = {};
            var page = q = '';
            for (i = 0; i < arr.length; i++) {
                queryString = arr[i];
                arr2 = queryString.split('=');
                var key = '';
                var value = '';
                if (arr2[0]) {
                    key = arr2[0];
                }
                if (arr2[1]) {
                    value = arr2[0];
                }

                if (arr2[0] == 'page') {
                    page = arr2[1];
                } else if (arr2[0] == 'q') {
                    q = arr2[1];
                } else if (arr2[0] == 'sort') {
                    extraParam[arr2[0]] = arr2[1];
                } else if (arr2[0] == 'order') {
                    extraParam[arr2[0]] = arr2[1];
                }
            }

            if (q != '') {
                filter = "filter__" + field;
                filterObjString = "#" + filter;

                $(filterObjString).val(q);
            }

            postArray = {
                page: page,
                q: q,
            }

            $.extend(postArray, extraParam);
            buildDynamicList(field, record_id, postArray);
            reinitializeFilterBox(field);
        } else {
            postArray = {
                section: section
            }

            buildDynamicList(field, record_id, postArray);
            reinitializeFilterBox(field);
        }
    }



    $(document).ready(function() {
        /*Refresh the list automatically after 5 min.*/
        //setInterval(function() {
        getFilesList();
        //console.log('hi i am runnig');
        //}, 300000);
    });


    /* Refresh the list*/
    var refresh = function() {
        getFilesList();
    }
</script>







@stop

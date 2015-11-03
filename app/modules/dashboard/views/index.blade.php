<?php
/*
 * Template     : Dashboard/index view
 * Descripttion : Dashboard Home Page.
 * @Author      : Akbar
 */
?>

<!-- extend the master layout | /app/modules/layout/master.blade.php -->
@extends('layout::master')


@section('title')
<!-- Set the title here -->
<title>Garage | Dashboard </title>
@stop

@section('scripts')

{{--{{ HTML::style('js/select2/select2.css'); }}--}}
{{--{{ HTML::script('js/select2/select2.min.js'); }}--}}

{{--{{ HTML::script('js/highcharts.js'); }}--}}
{{--{{ HTML::script('js/bar_data.js'); }}--}}
{{--{{ HTML::script('js/drilldown.js'); }}--}}
{{--{{ HTML::script('js/moment.js'); }}--}}
{{--<script src="http://code.highcharts.com/modules/exporting.js"></script>--}}

{{--<!-- Include Date Range Picker -->--}}
{{--<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>--}}
{{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />--}}

        <!-- CSS/JS FILE INCLUDE HERE -->
@include('layout::dashboard_chart')


@stop

<!-- Set the breadcrumb here -->
<!--@section('breadcrumb')
<span class="fa fa-home"> Home </span> > <span>Dashboard</span>

@stop-->

<!-- main content area start here -->
@section('content')


<div class="row padding-10">

    @include('dashboard::dashboard')

</div>

@stop
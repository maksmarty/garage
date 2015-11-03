<?php 
/*
 * Template     : Left Sidebar
 * Descripttion : Contain the left verticle navigation menu.
 */
?>		
	
    <!-- =============== CSS FILE INCLUDE HERE =============== -->
    
    <!-- Basic Styles -->
    
    {{--{{ HTML::style('css/style.css') }}--}}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}

    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    {{ HTML::style('css/smartadmin-production.min.css') }}
    {{ HTML::style('css/smartadmin-skins.min.css') }} 

    <!-- SmartAdmin RTL Support is under construction
             This RTL CSS will be released in version 1.5
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    {{--{{ HTML::style('css/demo.min.css') }}--}}

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico'); }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('img/favicon/favicon.ico'); }}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;lang=en" rel="stylesheet">
    <!--link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">-->

    <!-- #APP SCREEN / ICONS -->
    <!-- Specifying a Webpage Icon for Web Clip 
             Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
    
    
    
    

    
    <!-- ================================= JS FILE INCLUDE HERE ============================= -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

   <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    {{ HTML::script('js/jquery.min.js'); }}
    <script>
            if (!window.jQuery) {
                    document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
            }
    </script>

    {{ HTML::script('js/jquery-ui.min.js'); }}
    <script>
            if (!window.jQuery.ui) {
                    document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
            }
    </script>

    <!-- IMPORTANT: APP CONFIG -->
    {{ HTML::script('js/app.config.js'); }}
   

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
    {{ HTML::script('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js'); }}
    

    <!-- BOOTSTRAP JS -->
    {{ HTML::script('js/bootstrap/bootstrap.min.js'); }}

    <!-- CUSTOM NOTIFICATION -->
    {{ HTML::script('js/notification/SmartNotification.min.js'); }}

    <!-- JARVIS WIDGETS -->
    {{ HTML::script('js/smartwidgets/jarvis.widget.min.js'); }}
   
    <!-- EASY PIE CHARTS -->
    {{ HTML::script('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'); }}
    {{--<script src="js/plugin/morris/raphael.min.js"></script>--}}
		{{--<script src="js/plugin/morris/morris.min.js"></script>--}}
    

    <!-- SPARKLINES -->
    {{ HTML::script('js/plugin/sparkline/jquery.sparkline.min.js'); }}
    
    <!-- JQUERY VALIDATE -->
    {{ HTML::script('js/plugin/jquery-validate/jquery.validate.min.js'); }}

    <!-- JQUERY MASKED INPUT -->
    {{ HTML::script('js/plugin/masked-input/jquery.maskedinput.min.js'); }}
  
    <!-- JQUERY SELECT2 INPUT -->
    {{ HTML::script('js/plugin/select2/select2.min.js'); }}   

    <!-- JQUERY UI + Bootstrap Slider -->
    {{ HTML::script('js/plugin/bootstrap-slider/bootstrap-slider.min.js'); }}
    
    <!-- browser msie issue fix -->
    {{ HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js'); }}
    
    <!-- FastClick: For mobile devices -->
    {{ HTML::script('js/plugin/fastclick/fastclick.min.js'); }}    

    <!--[if IE 8]>

    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

    <![endif]-->

    <!-- Demo purpose only -->
    {{--{{ HTML::script('js/demo.min.js'); }}    --}}

    <!-- MAIN APP JS FILE -->
    {{ HTML::script('js/app.min.js'); }}


   

    <script type="text/javascript">

            $(document).ready(function() {

                    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
                     *
                     * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
                     *
                     * // activate tooltips
                     * $("[rel=tooltip]").tooltip();
                     *
                     * // activate popovers
                     * $("[rel=popover]").popover();
                     *
                     * // activate popovers with hover states
                     * $("[rel=popover-hover]").popover({ trigger: "hover" });
                     *
                     * // activate inline charts
                     * runAllCharts();
                     *
                     * // setup widgets
                     * setup_widgets_desktop();
                     *
                     * // run form elements
                     * runAllForms();
                     *
                     ********************************
                     *
                     * pageSetUp() is needed whenever you load a page.
                     * It initializes and checks for all basic elements of the page
                     * and makes rendering easier.
                     *
                     */

                     pageSetUp();

                    /*
                     * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
                     * eg alert("my home function");
                     * 
                     * var pagefunction = function() {
                     *   ...
                     * }
                     * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
                     * 
                     * TO LOAD A SCRIPT:
                     * var pagefunction = function (){ 
                     *  loadScript(".../plugin.js", run_after_loaded);	
                     * }
                     * 
                     * OR
                     * 
                     * loadScript(".../plugin.js", run_after_loaded);
                     */

            })

    </script>

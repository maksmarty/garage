<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
                <meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Include Site Title Here -->
        @yield('title')


		<!-- CSS/JS FILE INCLUDE HERE -->
		@include('layout::assets')


		<!-- PAGE-WISE CSS/JS INCLUDE HERE-->
        @yield('scripts')


	</head>
	<body class="">
		<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

		<!-- HEADER INCLUDE HERE-->
		@include('layout::header')
		<!-- END HEADER -->

		<!-- LEFT VERTICAL SIDEBAR NAVIGATION INCLUDE HERE -->
		@include('layout::sidebar')
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL START HERE -->
		<div id="main" role="main">

			<!-- HEADER INCLUDE HERE-->
			@include('layout::ribbon')

			<!-- MAIN CONTENT START HERE -->
			<div id="content">
                @yield('content')
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER INCLUDE HERE -->
		@include('layout::footer')
        <!-- END PAGE FOOTER -->

	</body>


</html>
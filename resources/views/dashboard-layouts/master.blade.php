<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		@if(isset($page)){{ $title }}  
		@else
		{{config('app.name') }} | {{$title}}
		@endif 
			
	</title>


	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('public/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<!--bootstrap export css-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"> 
	<!--bootstrap export css-->
    <!--selectize css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>

    <!--summernote css-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">	
	<link href="{{url('public/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link href="{{url('public/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!--jquery alert popup css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

	<!--custom css-->
	<style type="text/css">
		.invalid-feedback{
			text-align: center;
		}
		.car-gallery{
			margin-bottom: 20px;
		}
		.car-gallery img {
			height: 140px;
			width: 100%;
		}
		.avatar{
			width: 120px;
			height: 120px;
		}
		.select2-container--default .select2-selection--multiple .select2-selection__choice  {
			background: #555357 !important;
		}
		.btn-secondary {
			background-color:#2196F3 !important; 
		}
		.dt-buttons {
			float: left !important;
			margin: 10px !important;
		}		

		#example_filter {
			float: right !important;
			margin: 10px !important;
		}
		.dataTables_paginate .paginate_button {
			margin:0px !important;
			padding:0px !important;
		}
		.canvasjs-chart-canvas{
			position: initial !important;

		}
		#overall_exp, #timely_resp, #our_support, #overall_satisf{
			height: 320px;
		}
/*overlay css*/	
.overlay {
    left: 0;
    top: 0;
    width: 100%;
    height:100%;
    position: fixed;
    background: #222222b5;
    z-index: 1150;
 	display: none;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
   position: absolute;
   left: 50%;
   top: 50%;
   height:60px;
   width:60px;
   margin:0px auto;
   -webkit-animation: rotation .6s infinite linear;
   -moz-animation: rotation .6s infinite linear;
   -o-animation: rotation .6s infinite linear;
   animation: rotation .6s infinite linear;
   border-left:8px solid rgba(0,174,239,.15);
   border-right:8px solid rgba(0,174,239,.15);
   border-bottom:8px solid rgba(0,174,239,.15);
   border-top:8px solid rgba(0,174,239,.8);
   border-radius:100%;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}	
/*overlay css end*/		
	</style>
	<!--custom css-->
</head>

<body>

	<!-- Main navbar -->
		@include('dashboard-layouts.main-nav')
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->
		<!--main side bar-->
			@include('dashboard-layouts.sidebar')
		<!--main side bar end-->	
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->

			<div class="page-header page-header-light">
<!--
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>
-->

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							
							<span class="breadcrumb-item active">Dashboard</span>
							<a class="breadcrumb-item"> {{$title}}</a>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

<!--

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
	
			<!-- /page header -->
		<!--main content-->	
			@yield('content')
		<!--main content end-->	

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020. <a href="#">{{ config('app.name') }}</a> by <a href="https://brlbd.com" target="_blank">Babylon Resources Ltd</a>
					</span>
					<!--
					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				-->
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<!-- Core JS files -->

	<script src="{{url('public/global_assets/js/main/jquery.min.js')}}"></script>


	<script src="{{url('public/js/dashboard_app.js')}}"></script>
	<!-- /core JS files -->
	    <!--selectize js-->

	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

	<!-- Theme JS files -->
	<script src="{{url('public/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{url('public/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>

	<!-- Theme JS files -->
    <!--selectize js end--> 	
	<!--confirm js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>	
	@yield('js')
</body>
</html>

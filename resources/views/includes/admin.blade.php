<!-- **********************************************************************************************
							designed by	satoseries an optisoft project

		 			    optisoft official website -> https://optisoft.ng/


					  satoseries github repo -> https://github.com/satowind

							****************************************

	 				 satoseries twitter page -> https://twitter.com/Satowind

				  satoseries facebook page -> https://www.facebook.com/satoseries
	  
	 	 satoseries linkedin page -> https://www.linkedin.com/in/ogugua-tochukwu-900495113/
	************************************************************************************************ -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="City cyber solutions" />
	<meta name="author" content="" />

	<link href="{{asset('images/favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon">

	<title>BetaBET admin</title>

	<link rel="stylesheet" href="{{asset('admins/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/font-icons/entypo/css/entypo.css')}}">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{asset('admins/assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/neon-core.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/neon-theme.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/neon-forms.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/css/font-icons/font-awesome/css/font-awesome.min.css')}}">

	<script src="{{asset('admins/assets/js/jquery-1.11.3.min.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	

	<!--[if lt IE 9]><script src="{{asset('admins/assets/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
<style>
	input[type=text]:focus {
    background-color: lightblue;
    
    
   }

   input[type=text]{
   	border-radius: 20px;
   	padding-left: 30px
   }
</style>

</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="{{url('/')}}">
						<h2 style="color:red">BETABET</h2>
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
				

			<ul id="main-menu" class="main-menu">
				<li>
					<a href="{{url('admin/index')}}">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
					@if( $privillage->company_structure == 1 )
				<li class="has-sub">
					<a href="extra-icons">
						<i class="fa fa-institution"></i>
						<span class="title">Company Structure </span>
						<span class="badge badge-info badge-roundless">Control</span>
					</a>
					<ul>
						<li >
							<a href="{{url('admin/head_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Head Office</span>
							</a>
						</li>
						<li >
							<a href="{{url('admin/regional_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Regional Office</span>
							</a>
						</li>
						<li >
							<a href="{{url('admin/area_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Area Office</span>
							</a>
						</li>
						<li >
							<a href="{{url('admin/hub1_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Hub 1 Office</span>
							</a>
						</li>
						<li >
							<a href="{{url('admin/hub2_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Hub 2 Office</span>
							</a>
						</li>
						<li >
							<a href="{{url('admin/branch_office')}}">
								<i class="fa fa-building"></i>
								<span class="title">View/Edit Branch Office</span>
							</a>
						</li>
					</ul>
				</li>
				@endif


				<li>
					<a href="https://dashboard.tawk.to/#/admin/59eb42094854b82732ff6db0" target="_blank">
						<i class="fa fa-wechat"></i>
						<span class="title">Chat Update</span>
					</a>
				</li>




				@if( $privillage->withdrawal == 1 || $privillage->funding == 1 )
				<li class="has-sub">
					<a href="layout-api">
						<i class="fa fa-tasks"></i>
						<span class="title">Tasks</span>
					</a>
					<ul>
						@if(  $privillage->funding == 1 )
						<li>
							<a href="{{url('admin/fundTable')}}">
								<i class="fa fa-money"></i>
								<span class="title">Funding</span>
							</a>
						</li>
						@endif

						@if( $privillage->withdrawal == 1  )
						<li>
							<a href="{{url('admin/withTable')}}">
								<i class="fa fa-money"></i>
								<span class="title">Withdrawals</span>
							</a>
						</li>
						@endif


					</ul>
				</li>
				@endif



				@if( $privillage->customers == 1 || $privillage->approve_reg == 1 || $privillage->approved_account_number)

				<li class="has-sub">
					<a href="extra-icons">
						<i class="fa fa-user"></i>
						<span class="title">Customers Database</span>
						<span class="badge badge-info badge-roundless">Control</span>
					</a>
					<ul>
						@if( $privillage->customers == 1  )
						
						<li >
							<a href="{{url('admin/customers')}}">
								<i class="fa fa-users"></i>
								<span class="title">View/Edit Customers</span>
							</a>
						</li>

						@endif
						@if(  $privillage->approve_reg == 1 )
						<li >
							<a href="{{url('admin/approvereg')}}">
								<i class="fa fa-user-plus"></i>
								<span class="title">Approve Registration</span>
							</a>
						</li>
						@endif

						@if( $privillage->approved_account_number == 1  )
						<li>
							<a href="{{url('admin/account_number')}}">
								<i class="fa fa-bank"></i>
								<span class="title">Approve Account Numbers</span>
							</a>
						</li>
						@endif
						
					</ul>
				</li>
				@endif

				@if(  $privillage->blogs == 1 )
				<li >
					<a href="{{url('admin/blog')}}">
						<i class="fa fa-newspaper-o"></i>
						<span class="title">Blog/News letter</span>
					</a>
				</li>
				@endif

				@if( $privillage->social_icon == 1 || $privillage->contact_us_page == 1 || $privillage->faq == 1 || $privillage->how_to == 1 )

				<li class="has-sub">
					<a href="extra-icons">
						<i class="entypo-bag"></i>
						<span class="title">Control</span>
						<span class="badge badge-info badge-roundless">Front Page</span>
					</a>
					<ul>
						@if(  $privillage->social_icons == 1 )
						<li>
									<a href="{{url('admin/social')}}">
										<i class="fa fa-facebook"></i>
										<span class="title">Social Icon Control</span>
									</a>
						</li>
						@endif

						@if(  $privillage->contact_us_page == 1 )
						<li>
									<a href="{{url('admin/contact')}}">
										<i class="fa fa-info"></i>
										<span class="title">Contact us Control</span>
									</a>
						</li>
						@endif

						@if(  $privillage->faq == 1 )
						<li>
							<a href="{{url('admin/FAQ')}}">
								<i class="fa fa-question-circle"></i>
								<span class="title">View/Edit FAQ</span>
							</a>
						</li>
						@endif

						@if(  $privillage->how_to == 1 )
						<li>
							<a href="{{url('admin/howto')}}">
								<i class="fa fa-question"></i>
								<span class="title">View/Edit How To </span>
							</a>
						</li>
						@endif

					</ul>
				</li>
				@endif




				@if( $privillage->manage_admin == 1 || $privillage->create_unit == 1 )
				<li class="has-sub">
						<a href="extra-icons">
							<i class="fa fa-user"></i>
							<span class="title">Admin Management</span>
							<span class="badge badge-info badge-roundless">Vital</span>
						</a>
						<ul>
						@if( $privillage->manage_admin == 1 )
						<li >
							<a href="{{url('admin/madmin')}}">
								<i class="fa fa-user-plus"></i>
								<span class="title">Add\edit Staff</span>
							</a>
						</li>
						@endif

						@if(  $privillage->create_unit == 1 )
						<li >
							<a href="{{url('/admin/units')}}">
								<i class="fa fa-university"></i>
								<span class="title">Add Edit and Delete Units</span>
							</a>
						</li>
						@endif
					</ul>
				</li>
				@endif

				@if( $privillage->tickets == 1 || $privillage->inbox == 1  || $privillage->set_tickets == 1  )
				<li class="has-sub">
					<a href="extra-icons">
						<i class="fa fa-envelope-square"></i>
						<span class="title">Inbox / Tickets</span>
						{{--<span class="badge badge-info badge-roundless">Vital</span>--}}
					</a>
					<ul>
						@if( $privillage->inbox == 1 )

							<li>
								<a href="{{url('admin/inbox')}}">
									<i class="fa fa-envelope"></i>
									<span class="title">Manage Inboxes</span>
								</a>
							</li>

						@endif


						@if( $privillage->tickets == 1 || $privillage->set_tickets == 1  )
							<li class="has-sub">
								<a href="#">
									<i class="fa fa-question"></i>
									<span class="title">Manage Tickets</span>
								</a>
								<ul>
									@if(  $privillage->set_tickets == 1  )

										<li>
											<a href="{{url('/admin/ticket_category')}}">
												<i class="fa fa-question-circle"></i>
												<span class="title">Set Ticket Titles</span>
											</a>
										</li>

									@endif


									@if( $privillage->tickets == 1  )
										<li>
											<a href="{{url('/admin/tickets')}}">
												<i class="fa fa-question-circle"></i>
												<span class="title">View / Manage Tickets </span>
											</a>
										</li>
									@endif

								</ul>
							</li>
						@endif
					</ul>
				</li>

				@endif

				@if( $privillage->basic_settings == 1 || $privillage->activate_know_your_customer == 1)
					<li class="has-sub">
						<a href="#">
							<i class="fa fa-cogs"></i>
							<span class="title">Options</span>
						</a>
						<ul>
							@if( $privillage->basic_settings == 1 )
								<li >
									<a href="{{url('admin/options')}}">
										<i class="fa fa-question-circle"></i>
										<span class="title">Basic settings</span>
									</a>
								</li>
							@endif


							@if( $privillage->activate_know_your_customer == 1)
								<li >
									<a href="{{url('admin/options2')}}">
										<i class="fa fa-phone"></i><i class="fa fa-envelope-square"></i>
										<span class="title">Activate know your customers</span>
									</a>
								</li>
							@endif

						</ul>
					</li>
				@endif
				<li>
					<a href="{{url('admin/change_password')}}">
						<i class="fa fa-lock"></i>
					Change Password
					</a>
				</li>
			</ul>
			
		</div>

	</div>

	<div class="main-content">
				
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{asset('admin/assets/images/thumb-1@2x.png')}}" alt="" class="img-circle" width="44" />
							{{ 'Hi   '.  $name->name }}
						</a>
		
						
					</li>
		
				</ul>
				
				
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
					<li>
						<a onclick="logout()">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
		
		<hr />




		  @yield('content')


 <footer class="main">
            
            &copy; 2017 <strong>BetaBET</strong>. All Rights Reserved City Cyber Solutions. <!-- Designed by <a href="http://optisoft.ng" target="_blank">Optisoft</a> -->
        
        </footer>





</div>

</div>

			<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{asset('admins/assets/js/jvectormap/jquery-jvectormap-1.2.2.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/js/rickshaw/rickshaw.min.css')}}">

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{asset('admins/assets/js/wysihtml5/bootstrap-wysihtml5.css')}}">
	<link rel="stylesheet" href="{{asset('admins/assets/js/selectboxit/jquery.selectBoxIt.css')}}">


	 <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{asset('admins/assets/js/datatables/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/js/select2/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/js/select2/select2.css')}}">


	<!-- Bottom scripts (common) -->
	<script src="{{asset('admins/assets/js/gsap/TweenMax.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/bootstrap.js')}}"></script>
	<script src="{{asset('admins/assets/js/joinable.js')}}"></script>
	<script src="{{asset('admins/assets/js/resizeable.js')}}"></script>
	<script src="{{asset('admins/assets/js/neon-api.js')}}"></script>
	<script src="{{asset('admins/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{asset('admins/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js')}}"></script>
	<script src="{{asset('admins/assets/js/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/rickshaw/vendor/d3.v3.js')}}"></script>
	<script src="{{asset('admins/assets/js/rickshaw/rickshaw.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/raphael-min.js')}}"></script>
	<script src="{{asset('admins/assets/js/morris.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/toastr.js')}}"></script>
	<script src="{{asset('admins/assets/js/neon-chat.js')}}"></script>


	 <!-- Imported scripts on this page -->
    <script src="{{asset('admins/assets/js/datatables/datatables.js')}}"></script>
    <script src="{{asset('admins/assets/js/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/neon-chat.js')}}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{asset('admins/assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
	<script src="{{asset('admins/assets/js/jquery.multi-select.js')}}"></script>
	<script src="{{asset('admins/assets/js/fileinput.js')}}"></script>
	<script src="{{asset('admins/assets/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('admins/assets/js/selectboxit/jquery.selectBoxIt.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/bootstrap-tagsinput.min.js')}}"></script>
	<script src="{{asset('admins/assets/js/neon-chat.js')}}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('admins/assets/js/neon-custom.js')}}"></script>


	<!-- Demo Settings -->
	<script src="{{asset('admins/assets/js/neon-demo.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="{{asset('admins/assets/js/lga.js')}}"></script>

<script>
    function logout(){


        $.confirm({
            animation: 'zoom',
            closeAnimation: 'scale',
            theme: 'supervan',
            title: 'Confirm!',
            icon: 'fa fa-question',
            content: 'Are You Sure You Want To Logout',
            buttons: {
                confirm: function () {

                    $.ajax({
                        type: 'GET',
                        url: "{{url('/admin/logout')}}",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {

                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/login')}}";

                        },

                    });


                },
                cancel: function () {

                }

            }
        });


    }
</script>

</body>
</html>

<!-- **********************************************************************************************
							designed by	satoseries an optisoft project

		 			    optisoft official website -> https://optisoft.ng/


					  satoseries github repo -> https://github.com/satowind

							****************************************

	 				 satoseries twitter page -> https://twitter.com/Satowind

				  satoseries facebook page -> https://www.facebook.com/satoseries
	  
	 	 satoseries linkedin page -> https://www.linkedin.com/in/ogugua-tochukwu-900495113/
	************************************************************************************************ -->
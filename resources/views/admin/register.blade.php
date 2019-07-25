
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


</head>
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<h1 style="color: RED">BETABET</h1>
		
			
			<p class="description">Create New Staff</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>


<style >
	
	body{
  /* Safari 4-5, Chrome 1-9 */
    background: -webkit-gradient(radial, center center, 0, center center, 460, from(#1a82f7), to(#2F2727));

  /* Safari 5.1+, Chrome 10+ */
    background: -webkit-radial-gradient(circle, #1a82f7, #2F2727);

  /* Firefox 3.6+ */
    background: -moz-radial-gradient(circle, #1a82f7, #2F2727);

  /* IE 10 */
    background: -ms-radial-gradient(circle, #1a82f7, #2F2727);
    height:600px;
}

.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

label.label-floatlabel {
    font-weight: bold;
    color: #46b8da;
    font-size: 11px;
}
</style>

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up Admin Control</h3>
			 			</div>
			 			<div class="panel-body">


		@if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
        @endif

			    		<form name="register-form" class="nobottommargin" action="" method="post" role="form">
			    		
			    				
			    			<div class="form-group">
			    				<small class="text-danger">* </small>
			                	<input type="text" name="name" id="first_name" class="form-control input-sm floatlabel" placeholder="Full Name" required>
			    			</div>
			    				
	    					<div class="form-group">
	    						<small class="text-danger">* </small>
	    						<input type="text" name="staff_id" id="last_name" class="form-control input-sm" placeholder="Staff Id" required>
	    					</div>

			    			<div class="form-group">
			    				<small class="text-danger">* </small>
			    				<input type="text" name="username" id="last_name" class="form-control input-sm" placeholder="User Name" required>
			    			</div>
			    				
			    			

			    			<div class="form-group">
			    				<small class="text-danger">* </small>
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
			    			</div>



							<div class="form-group">
			    				<small class="text-danger">* </small>
			    				<input type="number" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number" required>
			    			</div>
			    				
			    			

			    			 {{--  <div class="form-group">
			    				<small class="text-danger">* </small>
			    				<input type="text" name="branch" id="branch" class="form-control input-sm" placeholder="Staff Branch" required>
			    			</div>   --}}




			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<small class="text-danger">* </small>
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<small class="text-danger">* </small>
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<button type="submit" class="btn btn-danger btn-block" name="register">Register</button>
							<a href="{{url('admin/madmin')}}" type="submit" class="btn  btn-block" name="register">Cancel</a>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

    <script >$(function() {
  $('input').floatlabel({labelEndTop:0});
});</script>

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
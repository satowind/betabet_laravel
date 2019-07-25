<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find your first Picture on Facebook</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	
	 <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	 <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	 
			 <!-- Include jQuery and bootstrap JS plugins -->
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	 
	
	
</head>
<body>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
	  
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
      var accessToken = response.authResponse.accessToken;
      alert("hjghjhj");
    });
    window.open('http://www.webprogrammingtips.com/apps/first-photo-album.php', '_blank');
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '151454321886597',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      //document.getElementById('status').innerHTML =
        //'Thanks for logging in, ' + response.name + '!';
      
    });
   // window.open('http://www.webprogrammingtips.com/apps/first-photo-album.php', '_blank');
	
    
  }
</script>


<!-- Mobile !-->
        <div class="container">
		  <h3>  #ProgrammingTips</h3>
        
		</div>
		<div class="container" >
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
            <span class="glyphicon glyphicon-align-justify"></span>
        </button>
        <nav class="navbar-collapse collapse" role="navigation">
            <ul class="navbar-nav nav">
                <li><a href="http://webprogrammingtips.com/apps" >Home</a></li>
                <li><a href="https://www.facebook.com/webprogrammingtips" target="_blank">Facebook</a></li>
                <li><a href="https://www.youtube.com/channel/UCJFgpEeixBQ7nn0VYCZZgrg" target="_blank">Youtube</a></li>
                <li><a href="https://plus.google.com/u/0/+MijanurRahmanPayel" target="_blank">Google Plus</a></li>
                
            </ul>
        </nav>
    </div>

	
	<!-- Middle content section -->
<div class="middle">
    <div class="container">
        <div class="col-md-9 content">
            
            
            
             <h4><strong>Find First Photo on Facebook</strong></h4>
            <p style="text-align:justification">
				<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
					Find your first Photo on Facebook
					</fb:login-button>
					
					<div id="status">
					
					</div>
									                        
            </p> 
            
            <!-- 
            <div class="to-tutorial">
                <p><strong>Visit the tutorial now to learn more:</strong></p>
                <a href="http://www.revillweb.com/tutorials/bootstrap-tutorial/" class="btn btn-success">TO THE TUTORIAL</a>
            </div>
             -->
        </div>
        <div class="col-md-3">
            <h2>Resources</h2>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="http://www.dsebd.org/" target="_blank">Dhaka Stock exchange</a></li>
                <li><a href="prothom-alo.com" target="_blank">Prothom-Alo</a></li>
                <li><a href="http://mzamin.com" target="_blank">Manab Zamin</a></li>
                <li><a href="http://bdnews24.com/bn" target="_blank">BD News24</a></li>
                <li><a href="http://webprogrammingtips.com" target="_blank">#WebProgrammingTips</a></li>
                
            </ul>
        </div>
    </div>
</div>

<!-- Site footer!--> 
<div class="bottom">
    <div class="container">
        <div class="col-md-11">
            <h2></h2>
            
            <p>Copy Right to webprogrammingtips.com</p>
        </div>
        <!-- 
        <div class="col-md-4">
            <h3><span class="glyphicon glyphicon-star"></span> Footer section 2</h3>
            <p>Content for the second footer section.</p>
        </div>
        <div class="col-md-4">
            <h3><span class="glyphicon glyphicon-music"></span> Footer section 3</h3>
            <p>Content for the third footer section.</p>
        </div>
         -->
    </div>
</div>

</body>
</html>
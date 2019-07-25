@extends('includes.sato')
@section('content')


<div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
    <div class="uk-container uk-container-center">
        <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
            <div class="uk-width-1-1 uk-row-first">
                <div class="uk-panel">
                    <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('{{asset("images/head-bg.jpg")}}');">
                        <img class="uk-invisible" src="images/head-bg.jpg" alt="" height="290" width="1920">
                        <div class="uk-position-cover uk-flex uk-flex-center head-title">
                            <h1>
                                Login/Register
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			
	
  <br><br>
  

  <ul  class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="pill" href="login">LOGIN</a></li>
    <li><a href="register">REGISTER</a></li>
    
  </ul>
 
  <div class="tab-content well">
    <div id="home" class="tab-pane fade in active">
     	<div class="panel panel-default nobottommargin">
									<div class="panel-body" style="padding: 40px;">
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                                        @endif

                                        @if(Session::has('success'))
                                            <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                                        @endif
										<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

											<small class="text-danger">* </small>

											<h3>Login to your Account</h3>

											<div class="form-group">
												<label for="login-form-username">Username or Email:</label>
												<input class="form-control" type="text" id="login-form-username" name="username" value="" class="form-control" />
											</div>

											<div class="form-group">
												<label for="login-form-password">Password:</label>
												<input class="form-control" type="password" id="password" name="password" value="" class="form-control" />
											</div>

											<div class="form-group nobottommargin">
												<button class="btn btn-danger" id="login-form-submit" name="submit" value="login">Login</button>
												<a href="forget" class="pull-right">Forgot Password?</a>

											</div>

										</form>
									</div>
								</div>

    </div>
    
  
</div>

</div>
	</div>
@endsection
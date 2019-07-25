@extends('includes.sato')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <li ><a href="index">LOGIN</a></li>
    <li class="active"><a href="register">REGISTER</a></li>
    
  </ul>

  
  <div class="tab-content well">
    <div id="home" class="tab-pane fade in active">
     	<div class="panel panel-default nobottommargin">
									<div class="panel-body" style="padding: 40px;">
                                        <h3>Register for an Account</h3>



                                        <div id="ask">
                                          <div class="form-group">
                                              @if(Session::has('error'))
                                                  <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                                              @endif

                                              @if(Session::has('success'))
                                                  <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                                              @endif
        
                                          <label for="client-email"><h3 class="h3 text-danger"> Do you have a beta9ja account with city cyber solutions? </h3></label>
                                              <select class="form-control input-lg" id="choose" name="choose">
                                                  <option value="" >---Choose Yes or No---</option>
                                                  <option value="yes" >Yes</option>
                                                  <option value="no" >No</option>
                                              </select>
                                          </div>
                                        </div>

                                        <div id="yes" style="display: none;">
                                         <form id="register-form" name="register-form" class="nobottommargin" action="{{url('betabet/register')}}" method="post">
                                              <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-repassword"> Choose Your City </label>
                                                <select onchange="populateBranch(this)" class="form-control" name="city">
                                                  <option value="">--Choose Your City--</option>
                                                    @foreach($branch as $branches)
                                                        <option value="{{$branches->city}}" >{{$branches->city}}</option>
                                                    @endforeach



                                                </select>
                                            </div>

                                             <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-repassword"> Choose Your Branch </label>
                                                <select id="branchP" class="form-control" name="branch">
                                                  <option value="">--Choose your branch--</option>
                                                    @foreach($branch as $branches)
                                                        <option value="{{$branches->id}}" >{{$branches->name}}</option>
                                                    @endforeach


                                                </select>
                                            </div>

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-name">Bet9ja Id</label>
                                                <input class="form-control" type="text" id="name" name="id" value="" class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-email">Username</label>
                                                <input class="form-control" type="text" id="username" name="username" value="" class="form-control" />
                                            </div>

                                             <div class="form-group">
                                                 <small class="text-danger">* (Password should be atleast 6 characters and must contain atleast 1 capital letter, 1 small letter, 1 symbol and 1 number ) </small>
                                                 <label for="register-form-password">Choose Password:</label>
                                                 <input class="form-control" type="password" id="r" name="password" value="" class="form-control" />
                                             </div>

                                             <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                 <label for="register-form-repassword">Re-enter Password:</label>
                                                 <input class="form-control" type="password" id="" name="repassword" value="" class="form-control" />
                                             </div>

                                            <div class="form-group" align='left'>
                                              <label class="radio-inline">
                                                  <input type="checkbox" name="agree" id="agree" value="agree"> I have read the terms and conditions of this service
                                              </label>                      
                                            </div>

                                            <div class="form-group nobottommargin">
                                                <button class="btn btn-danger pull-right" id="submit" name="submit" value="register" disabled>Register Now</button>
                                            </div>

                                        </form>
                                        </div>















                                        <div id="no" style="display: none;">                
                                        <form id="register-form" name="register-form" class="nobottommargin" action="{{url('betabet/register2')}}" method="post">

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-name">Surname Name:</label>
                                                <input class="form-control" type="text" id="sname" name="sname" value="" class="form-control" />
                                            </div>
                                             <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-name">First Name:</label>
                                                <input class="form-control" type="text" id="fname" name="fname" value="" class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-email">Email Address:</label>
                                                <input class="form-control" type="email" id="email" name="email" value="" class="form-control" />
                                            </div>

                                             <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-email">Date Of Birth:</label>
                                                <input class="form-control" type="date" id="dob" name="dob" value="" class="form-control" />
                                            </div>
                                            

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-phone">Phone:</label>
                                                <input class="form-control" type="number" maxlength="15" id="phone" name="phone" value="" class="form-control" />
                                            </div>

                                             <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-username">Choose a Username: </label>
                                                <input class="form-control" type="text" id="username" name="username" value="" class="form-control" />
                                            </div>


                                            <div class="form-group">
                                                 <small class="text-danger">* (Password should be atleast 6 characters and must contain atleast 1 capital letter, 1 small letter, 1 symbol and 1 number ) </small>
                                                <label for="register-form-password">Choose Password:</label>
                                                <input class="form-control" type="password" id="r" name="password" value="" class="form-control" />
                                            </div>

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-repassword">Re-enter Password:</label>
                                                <input class="form-control" type="password" id="" name="repassword" value="" class="form-control" />
                                            </div>

                                            <div class="">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-gender">Gender:</label>
                                                 <input  type="radio" name="gender" value="male" checked> Male
                                                  <input  type="radio" name="gender" value="female"> Female
                                            </div>

                                            <div class="form-group">
                                                 <small class="text-danger">* </small>
                                                <label for="register-form-repassword">Address </label>
                                                <input class="form-control" type="text" id="" name="address" value="" class="form-control" />
                                            </div>

                                           <div class="form-group">
                                              <small class="text-danger">* </small>
                                              <label for="register-form-repassword">Country: </label>
                                                  <select class="form-control input-lg" id="national" name="nationality">
                                                      <option value="">-Choose Nationality-</option>
                                                      <option value="Nigerian">Nigeria</option>
                                                      <option value="Others">Others</option>
                                                  </select>
                                          </div>
                                          <div class="form-group">
                                              <small class="text-danger">* </small>
                                             <label for="register-form-repassword">State: </label>
                                              <select class="form-control input-lg" name="state" id="state">
                                              <option value="">---select state---</option>
                                          </select>
                                          </div>
                                          <div class="form-group">
                                              <small class="text-danger">* </small>
                                          <label for="register-form-repassword">Local Government Area </label>
                                              <select class="form-control input-lg" name="local" id="local">
                                                  <option value="">---select L.G---</option>
                                              </select>

                                          </div>

                                           
                                         <div class="form-group" align='left'>
                                              <label class="radio-inline">
                                                  <input type="checkbox" name="agree2" id="agree2" value="agree"> I have read the terms and conditions of this service
                                              </label>                      
                                            </div>
                                            <div class="form-group nobottommargin">
                                                <button class="btn btn-danger pull-right" id="register-form-submits" name="register-form-submit" value="register" disabled>Register Now</button>
                                            </div>

                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </div>


    
  
</div>

</div>
	</div>

  <script>
function populateBranch(sel){
 var city = sel.value;

  $.ajax({
    type:"POST",
       dataType:"JSON",
    data:{
      city:city
    },
    url:"./q.php",
    success:function(res){
      var bp = document.getElementById('branchP');
      for(var f=0;f<bp.options.length;f++)
        bp.options.remove(f);

      if(res.length>0){

        for(var i=0; i<res.length;i++){
          var cd = document.createElement("option");
        cd.setAttribute("value",res[i].name);
        cd.innerHTML=res[i].name;
        bp.appendChild(cd);
        }
        
      }
     
    },
    error:function(er){
      console.log(er);
    }
  });
}


    $('body').on('change', '#choose', function() {
            var yes = $("#yes");
            var no =$("#no");
            var choose =$("#choose");
//
        if(choose.val() === 'yes'){

            yes.css("display", "block");
             no.css("display", "none");
            }else if(choose.val() === 'no'){
                no.css("display", "block");
                 yes.css("display", "none");
            }else{
                yes.css("display", "none");
                 no.css("display", "none");
            }

})


</script>

<script>
    let agree =   document.getElementById('agree');
    let submit =  document.getElementById('submit');
    agree.onchange = function() {
        submit.disabled = !this.checked;
    }
</script>

<script>
    let agree2 =   document.getElementById('agree2');
    let submit2 =  document.getElementById('register-form-submits');
    agree2.onchange = function() {
        submit2.disabled = !this.checked;
    }
</script>


@endsection
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
                                    Forgot Password
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
                                <h3 style="color: black;font-family:'roboto'">Forgot Password</h3>
                                <form id="register-form" name="register-form" class="nobottommargin" action="{{url('/betabet/forgot')}}" method="post">



                                    <div class="form-group">
                                        <small class="text-danger"> </small>
                                        <label for="register-form-email" style="color: black; font-family:'operator mono'">Enter Your Email Address:</label>
                                        <input class="form-control" type="text" id="register-form-email" name="email" value="" class="form-control" required="true"/>
                                    </div>




                                    <div class="form-group nobottommargin">
                                        <button style="padding: 10px 15px; background:#d8704c; color: #fff; border-radius: 10px" class="btn-danger pull-right" id="register-form-submit" name="submit" value="register">Reset Password</button>
                                    </div>

                                </form>


                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
@endsection
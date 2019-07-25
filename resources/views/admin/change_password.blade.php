@extends('includes.admin')
@section('content')

<h1>Change Password</h1>


    @if(Session::has('error'))
        <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif



<div class="container ">
    <div class="row well">
        <div class="col-sm-6 col-sm-offset-3 ">

     
<form action="{{url('/admin/change_password')}}" method="post" class="row" id="myForm">

    <div class="col-sm-12">

        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-name"><h3 class="h3 text-danger"> Enter Old Password</h3></label>
            <input type="password" class="form-control input-lg" id="old_pass" name="old_pass" value="">
        </div>



        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-email"><h3 class="h3 text-danger">Enter New Password</h3></label>
            <input type="password" class="form-control input-lg" id="new_pass" name="new_pass" value="">
        </div>

        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-email"><h3 class="h3 text-danger">Re-enter New Password</h3></label>
            <input type="password" class="form-control input-lg" id="re_pass" name="re_pass" value="">
        </div>

    </div>


    <div class="col-sm-12">
        <hr>

        <div class="pull-right">

            <a href="{{url('admin')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="funds()"  class="btn btn-lg btn-danger" name="fund">Change Password</button>

        </div>
    </div>
</form>

   </div>
    </div>
</div>

<script>

    function funds(){

        var old = $('#old_pass').val();

        var pass = $('#re_pass').val();

        var re = $('#new_pass').val();



        if (old ==''|| pass=='' || re=='' ){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input!',
            });
        } else{

            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To Change Password',
                buttons: {
                    confirm: function () {
                        $('#myForm').submit();
                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }

                }
            });
        }
    }

</script>

@endsection
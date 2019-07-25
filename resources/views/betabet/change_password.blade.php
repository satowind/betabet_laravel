
@extends('includes.beta')
@section('content')

    @if(Session::has('error'))
        <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
<form class="well" action="{{url('/betabet/change_password')}}" id="myForm" method="post">

    <div class="form-group">
        <small class="text-danger">* </small>
        <label for="email">Enter Old Password</label>
        <input type="password" class="form-control" id="old_pass" name="old_pass">
    </div>

    <div class="form-group">
        <small class="text-danger">* </small>
        <label for="email">Enter New Password</label>
        <input type="password" class="form-control" id="new_pass" name="new_pass">
    </div>

    <div class="form-group">
        <small class="text-danger">* </small>
        <label for="email">Re-Enter New Password</label>
        <input type="password" class="form-control" id="re_pass" name="re_pass">
    </div>

      <button type="button" onclick="funds()"  class="btn btn-danger" name="fund">Change Password</button>

</form>

 <br><br>
   </div>
          </div>
     
       </section>

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

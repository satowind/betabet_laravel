@extends('includes.admin')
@section('content')

<h1>Edit Staff</h1>

 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
                @if($admins)
<form action="" method="post" class="row">
    <div class="col-sm-12">
        
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Staff Id</h3> </label>
        <input type="text" class="form-control input-lg" id="Staff_id" name="staff_id" value="{{$admins->staff_id}}" disabled>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Full Name</h3> </label>
        <input type="text" class="form-control input-lg" id="fname" name="fname" value="{{$admins->name}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="email" name="email" value="{{$admins->email}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Phone Number</h3></label>
        <input type="number" class="form-control input-lg" id="phone" name="phone" value="{{$admins->phone}}">
    </div>
    
   
    
     </div>
    <div class="col-sm-12">
        <hr>
        <button type="button" onclick="deletes()" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('admin/madmin')}}" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" onclick="update()" class="btn btn-lg btn-success" name="ass">Update</button>
        </div>
    </div>
</form>
    @endif
@if(!$admins)
    <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/madmin/errore')}}">Back</a></h3>
@endif
</div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script>
    function deletes(){
        var id = '{{$id}}';

        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Delete',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/delete_staff')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/madmin/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/madmin/deleted')}}";

                        },

                    });


                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });
    }


    function update(){
        var id = '{{$id}}';
        var fname = $('#fname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();


        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Update Staff Details',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/update_staff')}}",
                        data: {
                            id:id,
                            fname:fname,
                            email:email,
                            phone:phone,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/madmin/erroru')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/madmin/update')}}";

                        },

                    });


                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });
    }
</script>
@endsection
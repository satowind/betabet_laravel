@extends('includes.admin')
@section('content')

<h1>Edit Customers Details</h1>


 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
                @if(Session::has('error'))
                    <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($customers)
<form action="{{url('/admin/editusers2')}}" id="myForm" method="post" class="row">

    <div class="col-sm-12">
        <input type="hidden" value="{{$id}}" name="ids">
        
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Bet9ja Id</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="bet_id" value="{{$customers->bet9ja_id}}">
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Surname name</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="sname" value="{{$customers->surname}}">
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">First name</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="fname" value="{{$customers->firstname}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="email" value="{{$customers->email}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Phone Number</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="phone" value="{{$customers->phone}}">
    </div>
   
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Gender</h3></label>
       <select class="form-control input-lg" id="gender" name="gender">
                
                <option {{($customers->gender=='male'?'selected':'')}} value="male">Male</option>
                <option {{($customers->gender=='female'?'selected':'')}} value="female">Female</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Date of Birth</h3></label>
        <input type="date" class="form-control input-lg" id="client-address" name="dob" value="{{$customers->dob}}">
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Address No</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="address" value="{{$customers->address}}">
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
        <option value="{{$customers->state}}">{{$customers->state}}</option>
    </select>
    </div>
    <div class="form-group">
        <small class="text-danger">* </small>
    <label for="register-form-repassword">Local Government Area </label>
        <select class="form-control input-lg" name="local" id="local">
            <option value="{{$customers->lga}}">{{$customers->lga}}</option>
        </select>

    </div>

    
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Branch</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="branch" value="{{$customers->branch}}" >
    </div>
    
     </div>
    <div class="col-sm-12">
        <hr>
        {{--<button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>--}}
        <div class="pull-right">

            <a href="{{url('admin/approvereg')}}" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button onclick="updates()" type="button" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
@else
                    Opps an error occur <a class="btn-danger btn" href="{{url('admin/users_virtual/errore')}}">Back</a>
@endif
</div></div></div>

<script>

    function deletes(){
        var id = '{{$id}}';

        $.confirm({
            title: 'Confirm!',
            theme: 'supervan',
            type: 'red',
            typeAnimated: true,
            icon: 'fa fa-question',
            content: 'Are You Sure You Want To Delete',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/remove_blog')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/blog/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/blog/deleted')}}";

                        },

                    });


                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });
    }

    function updates(){

        {{--var id = '{{$id}}';--}}

        // var title = $('#title').val();
        // var tag = $('#tag').val();
        // var status = $('#status').val();
        // var contents = $('#contents').val();
        // var image = $('#image').val();




            $.confirm({

                title: 'Confirm!',
                theme: 'supervan',
                type: 'blue',
                typeAnimated: true,
                icon: 'fa fa-question',
                content: 'Are You Sure You Want To Update Customers Profile',
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




</script>
@endsection
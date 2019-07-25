@extends('includes.admin')
@section('content')

<h1>Edit Customers Details</h1>


 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
                @if($customers)
<form action="{{url('/admin/editusers')}}" id="myForm" method="post" class="row">
    <div class="col-sm-12">

        <input type="hidden" value="{{$id}}" name="ids">
        
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Bet9ja Id</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="id" value="{{$customers->bet9ja_id}}" disabled>
    </div>
     {{--<div class="form-group ">--}}
        {{--<label for="client-address"><h3 class="h3 text-danger">Bet9ja Code</h3> </label>--}}
        {{--<input type="text" class="form-control input-lg" id="client-address" name="code" value="{{$customers->bet9ja_code}}">--}}
    {{--</div>--}}
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Surname name</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="sname" value="{{$customers->surname}}" disabled>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">First name</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="fname" value="{{$customers->firstname}}" disabled>
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
       <select class="form-control input-lg" id="gender" name="gender" disabled>
                
                <option {{($customers->gender=='male'?'selected':'')}} value="male">Male</option>
                <option {{($customers->gender=='female'?'selected':'')}} value="female">Female</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Date of Birth</h3></label>
        <input type="date" class="form-control input-lg" id="client-address" name="dob" value="{{$customers->dob}}" disabled>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Address No</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="address" value="{{$customers->address}}" disabled>
    </div>
    
     {{--<div class="form-group">--}}
        {{--<small class="text-danger">* </small>--}}
        {{--<label for="register-form-repassword">Country: </label>--}}
            {{--<select class="form-control input-lg" id="national" name="nationality">--}}
                {{--<option value="">-Choose Nationality-</option>--}}
                {{--<option value="Nigerian">Nigeria</option>--}}
                {{--<option value="Others">Others</option>--}}
            {{--</select>--}}
    {{--</div>--}}
    <div class="form-group">
        <small class="text-danger">* </small>
       <label for="register-form-repassword">State: </label>
        <select class="form-control input-lg" name="state" id="state" disabled>
        <option value="">{{$customers->state}}</option>
    </select>
    </div>
    <div class="form-group">
        <small class="text-danger">* </small>
    <label for="register-form-repassword">Local Government Area </label>
        <select class="form-control input-lg" name="local" id="local" disabled>
            <option value="">{{$customers->lga}}</option>
        </select>

    </div>

    
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Branch</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="branch" value="{{$customers->branch}}" disabled>
    </div>
    
     </div>
    <div class="col-sm-12">
        <hr>
        <button type="button" onclick="deletes()" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('admin/customers')}}" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
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
                        url: "{{url('/admin/delete_user')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/customers/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/customers/deleted')}}";

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
@extends('includes.admin')
@section('content')

<h1>Edit Contact</h1>


 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="{{url('admin/update_contact')}}" method="post" class="row" id="myForm">

   
                
       
    <div class="col-sm-12">
        
   
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Header</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="header" value="{{$contact->header}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Sub Header</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="sub_header" value="{{$contact->sub_header}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Phone</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="phone" value="{{$contact->phone}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="email" value="{{$contact->email}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Address</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="address" value="{{$contact->address}}">
    </div>
   
    </div> 
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger ">Head Office Phone</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="ho_phone" value="{{$contact->ho_phone}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Head Office Email</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="ho_email" value="{{$contact->ho_email}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Head Office Address</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="ho_address" value="{{$contact->ho_address}}">
    </div>
    
    

    <div class="col-sm-12">
        <hr>
        {{--<button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>--}}
        <div class="pull-right">

            <a href="{{url('admin/contact')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
     </div>
        </div>
    </div>

<script>
    function updates(){






            $.confirm({

                title: 'Confirm!',
                theme: 'supervan',
                type: 'blue',
                typeAnimated: true,
                icon: 'fa fa-question',
                content: 'Are You Sure You Want To Update blog Details',
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
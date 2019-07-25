@extends('includes.admin')
@section('content')




<h1>Add Head Office</h1>
 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="#" method="post" class="row">
  <div class="col-sm-12">
    
      <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Name</h3></label>
        <input type="text" class="form-control input-lg" id="name" name="name" value="">
      </div>
       <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="email" name="email" value="">
      </div>
      <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-name"><h3 class="h3 text-danger">Phone</h3></label>
        <input type="text" class="form-control input-lg" id="phone" name="phone" value="">
      </div>
      <div class="form-group">
        <small class="text-danger">* </small>
        <label for="client-email"><h3 class="h3 text-danger">Address</h3></label>
        <Textarea class="form-control input-lg" id="address" name="address" value="">
        </Textarea>
    </div>
      <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-email"><h3 class="h3 text-danger">Country</h3></label>
            <select class="form-control input-lg" id="national" name="nationality">
                <option value="">-Choose Nationality-</option>
                <option value="Nigerian">Nigeria</option>
                <option value="Others">Others</option>
            </select>
    </div>
    <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-email"><h3 class="h3 text-danger">state</h3></label>
        <select class="form-control input-lg" name="state" id="state">
        <option value="">---select state---</option>
    </select>
    </div>
    <div class="form-group">
        <small class="text-danger">* </small>
   <label for="client-email"><h3 class="h3 text-danger">Local Government</h3></label> 
        <select class="form-control input-lg" name="local" id="local">
            <option value="">---select L.G.A---</option>
        </select>

    </div>

     <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">City</h3></label>
        <input type="text" class="form-control input-lg" id="city" name="city" value="">
      </div>

</div>
   
    <div class="col-sm-12">
        <br><br>
            <a href="head_office" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" onclick="add_headoffice()" class="btn btn-lg btn-success pull-right" name="addFAQ">Add</button>
    </div>
</form>
</div></div></div>

<script>
    function add_headoffice(){
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var national = $('#national').val();
        var state = $('#state').val();
        var local = $('#local').val();
        var city = $('#city').val();


        if (name=='' || email=='' || phone=='' || address=='' || local =="" || city==''){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input! including choosing state and local government',
            });
        } else{


            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To add Branch',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/add_headoffice')}}",
                            data: {

                                name:name,
                                email:email,
                                phone:phone,
                                address:address,
                                national:national,
                                state:state,
                                local:local,
                                city:city,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/head_office/errora')}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('/admin/head_office/add')}}";

                            },

                        });


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
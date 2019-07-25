@extends('includes.admin')
@section('content')


<h1>Create Staff Unit</h1>


 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="#" method="post" class="row">


   <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-name"><h3 class="h3 text-danger">Staff Unit</h3></label>
        <input type="text" class="form-control input-lg" id="staff_unit" name="staff_unit" value="" required>
      </div>
        
   
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Funding</h3></label>
       <select class="form-control input-lg" id="funding" name="funding">
                
                <option  value="1">Yes</option>
                <option value="0">No</option>
            </select>
    </div>


     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Withdrawal </h3></label>
       <select class="form-control input-lg" id="withdrawal" name="withdrawal">
                
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Company Structure</h3></label>
       <select class="form-control input-lg" id="company_structure" name="company_structure">
                
                <option value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Chat Setting</h3></label>
       <select class="form-control input-lg" id="chat_update" name="chat_update">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Edit Customers Profile</h3></label>
       <select class="form-control input-lg" id="customers" name="customers">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Approve Customrs Registration</h3></label>
       <select class="form-control input-lg" id="approve_reg" name="approve_reg">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Manage Admin</h3></label>
       <select class="form-control input-lg" id="manage_admin" name="manage_admin">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Contact Us</h3></label>
       <select class="form-control input-lg" id="contact_us" name="contact_us">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Blog</h3></label>
       <select class="form-control input-lg" id="blogs" name="blogs">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Social Icons</h3></label>
       <select class="form-control input-lg" id="social_icons" name="social_icons">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Frequently Asked Question</h3></label>
       <select class="form-control input-lg" id="faq" name="faq">
                
                <option  value="1">Yes</option>
                <option value="0">No</option>
            </select>
    </div>

     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">How to </h3></label>
       <select class="form-control input-lg" id="how_to" name="how_to">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Contact Us Page Edit</h3></label>
       <select class="form-control input-lg" id="contact_us_page" name="contact_us_page">
                
                <option  value="1">Yes</option>
                <option  value="0">No</option>
            </select>
    </div>

            </div>
    
    <div class="col-sm-12">
        <hr>
       
        


            <button type="button" class="btn btn-lg btn-success pull-right" onclick="add_unit()" name="add">Add New</button>
            <a href="{{url('admin/units')}}" type="button" class="btn btn-lg btn-default pull-left">Cancel</a>

            

    </div>

</form>


</div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script>
    function add_unit(){
    var staff_unit = $('#staff_unit').val();
    var funding = $('#funding').val();
    var withdrawal = $('#withdrawal').val();
    var chat_update = $('#chat_update').val();
    var blogs = $('#blogs').val();
    var contact_us = $('#contact_us').val();
    var contact_us_page = $('#contact_us_page').val();
    var how_to = $('#how_to').val();
    var faq = $('#faq').val();
    var social_icons = $('#social_icons').val();
    var manage_admin = $('#manage_admin').val();
    var approve_reg = $('#approve_reg').val();
    var customers = $('#customers').val();
    var company_structure = $('#company_structure').val();

    if (staff_unit==''){
        $.alert({
            title: 'Alert!',
            content: 'Please Enter Unit Name!',
        });
    } else{


        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To add new unit with the following privillages',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/p_add_unit')}}",
                        dataType:'text',
                        data: {

                            staff_unit:staff_unit,
                            funding:funding,
                            withdrawal:withdrawal,
                            chat_update:chat_update,
                            blogs:blogs,
                            contact_us:contact_us,
                            contact_us_page:contact_us_page,
                            how_to:how_to,
                            faq:faq,
                            social_icons:social_icons,
                            manage_admin:manage_admin,
                            approve_reg:approve_reg,
                            customers:customers,
                            company_structure:company_structure,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {

                           window.location = "{{url('/admin/units/errora')}}";
                        },

                        success: function(res) {

                            if(res.message) {
                                $.alert({
                                    title: 'Alert!',
                                    content: 'Unit Already Exist!',
                                });
                            }else{
                                window.location = "{{url('/admin/units/add')}}";
                            }


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
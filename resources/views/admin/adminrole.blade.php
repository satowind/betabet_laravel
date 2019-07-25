@extends('includes.admin')
@section('content')


<h1>Assign Staff Roles</h1>

 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
                @if($unit)
<form action="" method="post" class="row">
   <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-name"><h3 class="h3 text-danger">Staff Unit</h3></label>
        <input type="text" class="form-control input-lg" id="staff_unit" name="staff_unit" value="{{ $unit->staff_unit }}" disabled >
      </div>
        
    
   
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Funding</h3></label>
       <select class="form-control input-lg" id="funding" name="funding">
                
                <option {{ ($unit->funding === "1") ? "Selected" : ""  }}  value="1">Yes</option>
                <option {{ ($unit->funding === "0") ? "Selected" : ""  }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Withdrawal </h3></label>
       <select class="form-control input-lg" id="withdrawal" name="withdrawal">

           <option {{ ($unit->withdrawal === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->withdrawal === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Company Structure</h3></label>
       <select class="form-control input-lg" id="company_structure" name="company_structure">

           <option {{ ($unit->company_structure === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->company_structure === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Chat Setting</h3></label>
       <select class="form-control input-lg" id="chat_update" name="chat_update">

           <option {{ ($unit->chat_update === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->chat_update === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Edit Customers Profile</h3></label>
       <select class="form-control input-lg" id="customers" name="customers">

           <option {{ ($unit->customers === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->customers === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Approve Customrs Registration</h3></label>
       <select class="form-control input-lg" id="approve_reg" name="approve_reg">

           <option {{ ($unit->approve_reg === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->approve_reg === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Manage Admin</h3></label>
       <select class="form-control input-lg" id="manage_admin" name="manage_admin">

           <option {{ ($unit->manage_admin === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->manage_admin === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Contact Us</h3></label>
       <select class="form-control input-lg" id="contact_us" name="contact_us">

           <option {{ ($unit->contact_us === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->contact_us === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Blog</h3></label>
       <select class="form-control input-lg" id="blogs" name="blogs">

           <option {{ ($unit->blogs === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->blogs === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Social Icons</h3></label>
       <select class="form-control input-lg" id="social_icons" name="social_icons">

           <option {{ ($unit->social_icons === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->social_icons === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Frequently Asked Question</h3></label>
       <select class="form-control input-lg" id="faq" name="faq">

           <option {{ ($unit->faq === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->faq === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>
     <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">How to </h3></label>
       <select class="form-control input-lg" id="how_to" name="how_to">

           <option {{ ($unit->how_to === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->how_to === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Contact Us Page Edit</h3></label>
       <select class="form-control input-lg" id="contact_us_page" name="contact_us_page">

           <option {{ ($unit->contact_us_page === "1") ? "Selected" : "" }}  value="1">Yes</option>
           <option {{ ($unit->contact_us_page === "0") ? "Selected" : "" }} value="0">No</option>
            </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">	Approve Account Number</h3></label>
        <select class="form-control input-lg" id="approved_account_number" name="	approved_account_number">

            <option {{ ($unit->approved_account_number === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->approved_account_number === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">	Basic Settings</h3></label>
        <select class="form-control input-lg" id="basic_settings" name="basic_settings">

            <option {{ ($unit->basic_settings === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->basic_settings === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Activate Know Your Customer</h3></label>
        <select class="form-control input-lg" id="activate_know_your_customer" name="activate_know_your_customer">

            <option {{ ($unit->activate_know_your_customer === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->activate_know_your_customer === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Inbox</h3></label>
        <select class="form-control input-lg" id="inbox" name="inbox">

            <option {{ ($unit->inbox === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->inbox === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Tickets</h3></label>
        <select class="form-control input-lg" id="tickets" name="tickets">

            <option {{ ($unit->tickets === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->tickets === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>

    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Set Tickets</h3></label>
        <select class="form-control input-lg" id="set_tickets" name="set_tickets">

            <option {{ ($unit->set_tickets === "1") ? "Selected" : "" }}  value="1">Yes</option>
            <option {{ ($unit->set_tickets === "0") ? "Selected" : "" }} value="0">No</option>
        </select>
    </div>


    </form>
     
     </div>
    <div class="col-sm-12">
        <hr>
       
        <button type="button" class="btn btn-lg btn-danger pull-left" onclick="deletes()" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('admin/units')}}" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" class="btn btn-lg btn-success" onclick="update()" name="ass">Update Unit</button>
        </div>
    </div>
</form>
            @endif
            @if(!$unit)
                <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/units/errore')}}">Back</a></h3>
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
                        url: "{{url('/admin/delete_unit')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/units/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/units/deleted')}}";

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

        var tickets = $('#tickets').val();
        var inbox = $('#inbox').val();
        var activate_know_your_customer = $('#activate_know_your_customer').val();
        var basic_settings = $('#basic_settings').val();
        var approved_account_number = $('#approved_account_number').val();
        var set_tickets = $('#set_tickets').val();


        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Update Unit With the following privilages',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/update_unit')}}",
                        data: {
                            id:id,
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
                            tickets:tickets,
                            inbox:inbox,
                            activate_know_your_customer:activate_know_your_customer,
                            basic_settings:basic_settings,
                            set_tickets:set_tickets,
                            approved_account_number:approved_account_number,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/units/erroru')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/units/update')}}";

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
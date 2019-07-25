@extends('includes.admin')
@section('content')

<h1>Edit Branch Office</h1>


<div class="container ">
    <div class="row well">
        <div class="col-sm-6 col-sm-offset-3 ">

            @if($branch)
<form action="" method="post" class="row ">

     <div class="form-group">
        <small class="text-danger">* </small>
        <label for="client-email"><h3 class="h3 text-danger">Choose Branch Offices</h3></label>
            <select class="form-control input-lg" id="under" name="under">
                <option value="" >---Choose Branch Office---</option>
                @foreach($bra as $branches)
                    <option value="{{$branches->name}}" >{{$branches->name}}</option>
                @endforeach
               
            </select>
        </div>
   <div class="col-sm-12" id="all" style="display:none">
    <div class="form-group ">
       <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Name</h3></label>
        <input type="text" class="form-control input-lg" id="name" name="name" value="{{$branch->name}}">
      </div>
       <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Bet9ja Id</h3></label>
        <input type="text" class="form-control input-lg" id="ids" name="ids" value="{{$branch->bet9ja_id}}">
      </div>
      <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Bet9ja Code</h3></label>
        <input type="text" class="form-control input-lg" id="code" name="code" value="{{$branch->bet9ja_code}}">
      </div>
       <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="email" name="email" value="{{$branch->email}}">
      </div>
      <div class="form-group">
        <small class="text-danger">* </small>
       <label for="client-name"><h3 class="h3 text-danger">Phone</h3></label>
        <input type="text" class="form-control input-lg" id="phone" name="phone" value="{{$branch->phone}}">
      </div>
      <div class="form-group">
        <small class="text-danger">* </small>
        <label for="client-email"><h3 class="h3 text-danger">Address</h3></label>
        <Textarea class="form-control input-lg" id="address" name="address" value="">{{$branch->address}}
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
            <option value="">---select L.G---</option>
        </select>

    </div>

     <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">City</h3></label>
        <input type="text" class="form-control input-lg" id="city" name="city" value="{{$branch->city}}">
      </div>
    </div>
    <div class="col-sm-12">
        <hr>
        <button type="button" onclick="deletes()" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('/admin/branch_office')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>

            @endif
            @if(!$branch)
                <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/branch_office/errore')}}">Back</a></h3>
            @endif
   </div>
    </div>
</div>


<script>
    $('body').on('change', '#under', function() {
            var under = $("#under");
            var div =$("#all")

        if(under.val.length > 0){

            div.css("display", "block");

            }else{
            div.css("display", "none");

            }

    })

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
                        url: "{{url('/admin/delete_headoffice')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/branch_office/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/branch_office/deleted')}}";

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

        var id = '{{$id}}';
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var national = $('#national').val();
        var state = $('#state').val();
        var local = $('#local').val();
        var city = $('#city').val();
        var under = $('#under').val();
        var ids = $('#ids').val();
        var code = $('#code').val();

        if (name=='' || email=='' || phone=='' || address=='' || local =="" || city=='' || under=="" || ids=='' || code==""){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input! including choosing state and local government',
            });
        } else{

            $.confirm({

                title: 'Confirm!',
                theme: 'supervan',
                type: 'blue',
                typeAnimated: true,
                icon: 'fa fa-question',
                content: 'Are You Sure You Want To Update Office Details',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/update_branchoffice')}}",
                            data: {
                                id:id,
                                name:name,
                                email:email,
                                phone:phone,
                                address:address,
                                national:national,
                                state:state,
                                local:local,
                                city:city,
                                under:under,
                                ids:ids,
                                code:code,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/branch_office/erroru')}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('/admin/branch_office/update')}}";

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
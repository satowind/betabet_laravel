@extends('includes.admin')
@section('content')




<h1>Add New Message</h1>
 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="#" method="post" class="row">
  <div class="col-sm-12">
    
      <div class="form-group">  
        <small class="text-danger">* </small>
        <label for="client-name"><h3 class="h3 text-danger">Message Header</h3></label>
        <input type="text" class="form-control input-lg" id="head" name="head" value="">
      </div>

      <div class="form-group">
        <small class="text-danger">* </small>
        <label for="client-email"><h3 class="h3 text-danger">Message Body</h3></label>
        <Textarea class="form-control input-lg" id="body" name="body" value="">
        </Textarea>
      </div>

      <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-email"><h3 class="h3 text-danger">Branch</h3></label>
            <select class="form-control input-lg" id="branch" name="branch">

                <option value="">-Choose Branch-</option>

                @foreach( $branches as $branch)

                    <option value="{{ $branch->id }}">{{$branch->name}}</option>

                @endforeach

            </select>
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
        var branch = $('#branch').val();
        var body = $('#body').val();
        var head = $('#head').val();



        if (branch =='' || body =='' || head =='' ){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input!',
            });
        } else{


            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To add Branch',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/add_inbox')}}",
                            data: {

                                branch:branch,
                                head:head,
                                body:body,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/inbox/errora')}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('/admin/inbox/add')}}";

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
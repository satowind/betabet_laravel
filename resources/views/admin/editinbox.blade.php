@extends('includes.admin')
@section('content')

<h1>Edit Head Office</h1>


<div class="container ">
    <div class="row well">
        <div class="col-sm-6 col-sm-offset-3 ">
@if($inbox)
     
<form action="" method="post" class="row ">

    <div class="col-sm-12">

        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-name"><h3 class="h3 text-danger">Message Head</h3></label>
            <input type="text" class="form-control input-lg" id="head" name="head" value="{{$inbox->header}}">
        </div>

        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-email"><h3 class="h3 text-danger">Message Body</h3></label>
            <Textarea class="form-control input-lg" id="body" name="body" value="">{{$inbox->body}}
        </Textarea>
        </div>

        <div class="form-group">
            <small class="text-danger">* </small>
            <label for="client-email"><h3 class="h3 text-danger">Branch</h3></label>
            <select class="form-control input-lg" id="branch" name="branch">

                <option value="{{$inbox->id}}">{{$inbox->name}}</option>

                @foreach( $branches as $branch )

                    <option value="{{ $branch->id }}">{{$branch->name}}</option>

                @endforeach

            </select>
        </div>

    </div>


    <div class="col-sm-12">
        <hr>
        <button type="button" onclick="deletes()" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('admin/inbox')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
@endif
    @if(!$inbox)
        <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/head_office/errore')}}">Back</a></h3>
    @endif
   </div>
    </div>
</div>

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
                        url: "{{url('/admin/delete_inbox')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/inbox/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/inbox/deleted')}}";

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
       var head = $('#head').val();
       var body = $('#body').val();
       var branch = $('#branch').val();

       if (head=='' || body=='' || branch==''){
           $.alert({
               title: 'Alert!',
               content: 'Please fill all the form input!',
           });
       } else{

       $.confirm({
           title: 'Confirm!',
           content: 'Are You Sure You Want To Update Message Details',
           buttons: {
               confirm: function () {
                   $.ajax({
                       type: 'POST',
                       url: "{{url('/admin/update_inbox')}}",
                        data: {
                            id:id,
                            head:head,
                            body:body,
                            branch:branch,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                           window.location = "{{url('/admin/inbox/erroru')}}";
                        },
                        dataType: 'text',
                        success: function() {
                           window.location = "{{url('/admin/inbox/update')}}";

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
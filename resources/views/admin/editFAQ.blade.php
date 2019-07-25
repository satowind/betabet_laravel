@extends('includes.admin')
@section('content')

<h1>Edit FAQ</h1>


 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">

<form action="{{url('admin/editFAQ')}}" method="post" class="row" id="myForm">
    <div class="col-sm-12">

        <input type="hidden" value="{{$id}}" name="id">
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Question</h3></label>
        <input type="text" class="form-control input-lg" id="question" name="question" value="{{$faq->question}}">
    </div>
    <div class="form-group ">
        <label for="client-company"><h3 class="h3 text-danger">Answer</h3></label>
        <input type="text" class="form-control input-lg" id="answer" name="answer" value="{{$faq->reply}}">
    </div>
     </div>
    <div class="col-sm-12">
        <hr>
        <button type="button" onclick="deletes()" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="{{url('admin/FAQ')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
</div>
</div>
 </div>

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
                        url: "{{url('/admin/remove_faq')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/FAQ/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/FAQ/deleted')}}";

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

        var title = $('#question').val();
        var contents = $('#answer').val();



        if ( title =='' || contents =='' ){
            $.alert({
                title: 'Alert!',
                content: 'Content or Title cant be empty',
            });
        } else{

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
    }

</script>
@endsection
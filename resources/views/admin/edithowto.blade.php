@extends('includes.admin')
@section('content')

<h1>Edit How to Text</h1>


<div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="{{url('admin/edithowto')}}" method="post" id="myForm" class="row">
    <div class="col-sm-12">

        <input type="hidden" value="{{ $id }}">
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">How to Text</h3> </label>
        <textarea rows="30" class="form-control input-lg" id="client-address" name="how" value="">{{$how->how_to}}</textarea>
    
    
     </div>
    <div class="col-sm-12">
        <hr>
        {{--<button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>--}}
        <div class="pull-right">

            <a href="{{url('admin/howto')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()"  class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
    </div>
</form>
</div>
</div>
</div>
<script>
    function updates(){

        var id = '{{$id}}';




            $.confirm({

                title: 'Confirm!',
                theme: 'supervan',
                type: 'blue',
                typeAnimated: true,
                icon: 'fa fa-question',
                content: 'Are You Sure You Want To Update How To',
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
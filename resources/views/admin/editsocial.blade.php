@extends('includes.admin')
@section('content')

<h1>Edit Social Icons</h1>


<div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="{{url('admin/editsocial')}}" method="post" class="row" id="myForm">
    <div class="col-sm-12">
        
   
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Facebook</h3> </label>
        <input type="text" class="form-control input-lg" id="client-address" name="facebook" value="{{$social->facebook}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Twiter</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="twitter" value="{{$social->twitter}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Google +</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="google" value="{{$social->google}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Pintrest</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="pintrest" value="{{$social->pintrest}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Flickr</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="flicker" value="{{$social->flicker}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Instagram</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="instagram" value="{{$social->instagram}}">
    </div>
    <div class="form-group ">
        <label for="client-address"><h3 class="h3 text-danger">Youtube</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="youtube" value="{{$social->youtube}}">
    </div>
    
    
     </div>
    <div class="col-sm-12">
        <hr>
        {{--<button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>--}}
        <div class="pull-right">

            <a href="{{url('admin/social')}}" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="button" onclick="updates()" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
</div></div></div>

<script>
    function updates(){






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
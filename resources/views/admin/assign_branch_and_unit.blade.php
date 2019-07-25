@extends('includes.admin')
@section('content')

<h1>Assign Staff Roles</h1>

 <div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
@if($admins)
<form action="" method="post" class="row">



    <div class="form-group">
        <small class="text-danger">* </small>
        <label for="client-email"><h3 class="h3 text-danger">Choose Branch</h3></label>
            <select class="form-control input-lg" id="branch" name="branch">
                <option value="" >---Choose Branch---</option>
                @foreach( $branchs as $branch)
                    <option value="{{$branch->id}}" >{{$branch->name}}</option>
                @endforeach
                
               
            </select>
        </div>



    <div class="form-group">
        <small class="text-danger">* <?php echo isset($underError) ? $underError : ''; ?></small>
        <label for="client-email"><h3 class="h3 text-danger">Choose Unit</h3></label>
            <select class="form-control input-lg" id="staff_unit" name="staff_unit">

                <option value="" >---Choose Unit---</option>
                @foreach( $unit as $units)
                    <option value="{{$units->staff_unit}}" >{{$units->staff_unit}}</option>
                @endforeach

            </select>
        </div>

   
   
   



     
     
    <div class="col-sm-12">
        <hr>
        <div class="pull-right">

            <a href="madmin" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" onclick="assign()" class="btn btn-lg btn-success" name="ass">Assign Branch/Unit </button>
        </div>
    </div>
</form>
    @endif
    @if(!$admins)
        <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/madmin/errore')}}">Back</a></h3>
    @endif

</div></div></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script>


    function assign(){
        var id = '{{$id}}';
        var branch = $('#branch').val();
        var staff_unit = $('#staff_unit').val();



        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Assign Branch and Unit to the Staff',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/assign_staff')}}",
                        data: {
                            id:id,
                            branch:branch,
                            staff_unit:staff_unit,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/madmin/errorass')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/madmin/assign')}}";

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
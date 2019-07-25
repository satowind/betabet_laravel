@extends('includes.beta')
@section('content')


<h3>Change Bank Details </h3>
@if($bank)
      <form id="update" name="update" class="nobottommargin" action="#" method="post">
		  <div class="form-group">
        <small class="text-danger">* </small>
		    <label for="email">Full Name</label>
		    <input type="text" class="form-control" id="fname" name="fname" value="{{$bank->account_name}}" disabled>
		  </div>

		  <div class="form-group">
			  <small class="text-danger">* </small>
			  <label for="email">Account Number</label>
			  <input type="text" class="form-control" id="fname" name="fname" value="{{$bank->account_number}}" disabled>
		  </div>

		  <div class="form-group">
			  <small class="text-danger">* </small>
			  <label for="email">Bank </label>
			  <input type="text" class="form-control" id="fname" name="fname" value="{{$bank->bank_name}}" disabled>
		  </div>

		  <div class="form-group">
			  <small class="text-danger">* </small>
			  <label for="email">Account Type</label>
			  <input type="text" class="form-control" id="fname" name="fname" value="{{$bank->account_type}}" disabled>
		  </div>

		
		  {{--<button type="submit" class="btn btn-primary" name="update">Update Account Details</button>--}}
		<button type="button" onclick="deletes()" class="btn btn-danger pull-right" name="delete">Delete Account Details</button>
		</form>
@endif
@if(!$bank)
	<h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/betabet/index/errore')}}">Back</a></h3>
@endif
		<br><br>
		<br><br>

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
                        url: "{{url('/betabet/delete_bank_details')}}",
                        data: {
                            id:id ,"_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/betabet/index/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/betabet/index/deleted')}}";

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


@extends('includes.beta')
@section('content')
<form class="well" id="fund" name="funding" action="" method="post">
  <div class="form-group">

		  <div class="form-group">
		  	<small class="text-danger">* </small>
		    <label for="email">Amount To Fund</label>
		    <input type="Number" class="form-control" id="amount" name="amount">
		  </div>

		  <div class="form-group">
		  	<small class="text-danger">* </small>
		    <label for="pwd">Which Account</label>
		    <select class="form-control" id="bank" name="bank">
               

              <option value=''>Select Bank</option>
				@foreach($bank as $bank)

					<option value='{{$bank->id}}'>{{$bank->bank_name}}</option>
				@endforeach


            </select>


		  </div>

		  <button type="button" onclick="funds()"  class="btn btn-danger" name="fund">Fund</button>
</form>

 <br><br>
   </div>
          </div>
     
       </section>

<script>
    function funds(){

        var amount = $('#amount').val();
        var bank = $('#bank').val();
        var user_id = '{{$name->user_id}}' ;


        if (amount==''|| bank=='' ){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input!',
            });
        } else{
            if (amount <= 100) {

                $.alert({
                    title: 'Alert!',
                    content: 'Amount must be greater than 100!',
                });
            } else{


                $.confirm({
                    title: 'Confirm!',
                    content: 'Are You Sure You Want To Fund',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/betabet/fund')}}",
                                data: {

                                    amount:amount,
                                    bank:bank,
                                    user_id:user_id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('/betabet/index/errorfund')}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('/betabet/index/fund')}}";

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
    }
</script>

@endsection

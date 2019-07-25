@extends('includes.beta')
@section('content')



<h3>Change Bank Details </h3>

@if(Session::has('error'))
	<div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
@endif

@if(Session::has('success'))
	<div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
@endif

      <form id="update" name="update" class="nobottommargin" action="#" method="post">
		  
        <div class="form-group">
        <small class="text-danger">*  </small>
		    <label for="email">Account Name</label><small class="text-danger">* (Account Name Should Match Your Account Name) </small>
		    <input type="text" class="form-control" id="account_name" name="account_name">
		</div>

		  <div class="form-group">
        <small class="text-danger">* </small>
		    <label for="pwd">Bank Name:</label>
		    <select class="form-control" name="bank_name">
			   <option value="">Select Bank</option>
		        <option value="Access Bank">Access Bank</option>
		        <option value="Fidelity Bank">Fidelity Bank</option>
		        <option value="StanbicIBTC">StanbicIBTC</option>
		        <option value="Afribank">Afribank</option>
		        <option value="Finbank">Finbank</option>
		        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
		        <option value="Citibank">Citibank</option>
		        <option value="Guarnatee Trust Bank">Guarnatee Trust Bank</option>
		        <option value="Sterling Bank">Sterling Bank</option>
		        <option value="Diamond Bank">Diamond Bank</option>
		        <option value="UBA">UBA</option>
		        <option value="Ecobank Bank">Ecobank Bank</option>
		        <option value="Union Bank">Union Bank</option>
		        <option value="Keystone Bank">Keystone Bank</option>
		        <option value="Wema Bank">Wema Bank</option>
		        <option value="First Bank">First Bank</option>
		        <option value="Skye Bank">Skye Bank</option>
		        <option value="Zenith Bank">Zenith Bank</option>
		        <option value="FCMB">FCMB</option>
		        <option value="SpringBank">SpringBank</option>
		        <option value="Unity Bank">Unity Bank</option>
		      </select>
		  </div>

		   <div class="form-group">
        <small class="text-danger">* </small>
		    <label for="pwd">Account Type</label>
		    <select class="form-control" name="account_type">
			  <option>Savings Account</option>
			  <option>Current Account</option>
			  
			</select>
		  </div>

		  <div class="form-group">
        <small class="text-danger" id="demo">* </small>
		    <label for="email">Account Number</label>
		    <input type="number" class="form-control" id="lname" name="account_number" onKeyUp="if(this.value>9999999999){ document.getElementById('demo').innerHTML = 'Cant be more than 10 digits<br>'; this.setStyle('background','red');}"  onblur="if(this.value<=9999999999){ document.getElementById('demo').innerHTML = ''; this.setStyle('background','white')}"  onkeydown ="if(this.value<=9999999999){ document.getElementById('demo').innerHTML = '';  this.setStyle('background','white')}">
		  </div>

		
		  <button type="submit" class="btn btn-danger" name="ChangeAccount">Add Account Details</button>

		</form>
		<br><br>
		<br><br>

</div></div></div>

@endsection

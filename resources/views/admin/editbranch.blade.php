@extends('includes.admin')
@section('content')

<h1>Edit Branch</h1>


<div class="container ">
    <div class="row well">
        <div class="col-sm-6 col-sm-offset-3 ">
            
     
<form action="" method="post" class="row ">
    
    <div class="form-group ">
        <label for="client-address"><h3 style="outline: blue" class="h3 text-danger">Phone</h3></label>
        <input type="text" class="form-control input-lg" id="client-address" name="phone" value="">
    </div>
    <div class="form-group ">
        <label for="client-company"><h3 class="h3 text-danger">Email</h3></label>
        <input type="text" class="form-control input-lg" id="client-company" name="email" value="">
    </div>

    <div class="form-group ">
        <label for="client-company"><h3 class="h3 text-danger">Address</h3></label>
        <input type="text" class="form-control input-lg" id="client-company" name="address" value="">
    </div>
    
    <div class="col-sm-12">
        <hr>
        <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">

            <a href="FAQ" type="button" class="btn btn-lg btn-primary">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>
   </div>
    </div>
</div>
@endsection
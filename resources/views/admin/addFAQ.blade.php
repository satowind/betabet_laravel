@extends('includes.admin')
@section('content')



<h1>Add FAQ</h1>
<div class="container">
        <div class="row well">
            <div class="col-sm-6 col-sm-offset-3">
<form action="{{url('/admin/addFAQ')}}" method="post" class="row" id="myForm">
  <div class="col-sm-12">
  	
  <div class="form-group">
      

        <label for="client-name"><h3 class="h3 text-danger">Question</h3></label>
        <input type="text" class="form-control input-lg"  name="question" id="question" value="">
      </div>
      <div class="form-group">
        <label for="client-email"><h3 class="h3 text-danger">Answer</h3></label>
        <Textarea class="form-control input-lg" id="reply" name="answer" value="">
        </Textarea>
    </div>
    </div>
   
    <div class="col-sm-12">
    	<br><br>
            <a href="{{url('admin/FAQ')}}" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="button" onclick="add()" class="btn btn-lg btn-success pull-right" name="addFAQ">Add</button>
    </div>
</form>
</div></div></div>

<script>
    function add(){


        var title = $('#question').val();

        var contents = $('#reply').val();



        if (title=='' || contents=='' ){
            $.alert({
                title: 'Alert!',
                content: 'Question or Answer cant be empty',
            });
        } else{

            $.confirm({

                title: 'Confirm!',
                theme: 'supervan',
                type: 'blue',
                typeAnimated: true,
                icon: 'fa fa-question',
                content: 'Are You Sure You Want To Add FAQ',
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
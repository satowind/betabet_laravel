
@extends('includes.beta')
@section('content')
<style type="text/css" media="screen">
  h4{
    color: #228b22;
  }
  h5{
    color: #ed663b;
  }
</style>

    @if(Session::has('error'))
        <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif

@if($id=='error_update_profile')
    <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
@endif
@if($id=='update_profile')
    <div class="alert alert-success"> Profile have been Updated Successfully we will notify you when it is approved <a class='close' data-dismiss='alert'>&times;</a></div>
@endif

    @if($id=='errore')
        <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='update')
        <div class="alert alert-success"> Bank Details have been Updated Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='with')
        <div class="alert alert-success"> Withdrawal have been initiated Successfully. We will get back to you through email <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='fund')
        <div class="alert alert-success"> Funding have been initiated Successfully. We will get back to you through email <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='erroru')
        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='errorwith')
        <div class="alert alert-danger"> Unable to Withdraw try Again later <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='errorfund')
        <div class="alert alert-danger"> Unable to Fund try Again later <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='errora')
        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='add')
        <div class="alert alert-success"> Bank Details have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='deleted')
        <div class="alert alert-success"> Bank Details Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif
    @if($id=='errord')
        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
    @endif

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
    <li><a data-toggle="tab" href="#menu1"><span class="glyphicon glyphicon-euro"></span> View Account History </a></li>
    <li><a data-toggle="tab" href="#menu2"><span class="glyphicon glyphicon-usd"></span> View Bank Details </a></li>
    <li><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-sort"></span> View Pending Transaction </a></li>
  </ul>








  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
      <h3>My Account</h3>       
  <table class="table table-hover table-bordered">
    
    <tbody>
    <!-- <tr>
        <td> <h4>Customer id</h4></td>
        <td><h5>{{$name->id}}</h5></td>

    </tr> -->
    <tr>
        <td> <h4>Name </h4></td>
        <td><h5>  {{$name->surname}}
                {{$name->firstname}} </h5></td>

    </tr>
    <tr>
        <td> <h4>Email Address </h4></td>
        <td><h5> {{$name->email}}</h5></td>

    </tr>
    <tr>
        <td> <h4>Phone Number </h4></td>
        <td><h5> {{$name->phone}}</h5></td>

    </tr>



    <tr>
        <td> <h4>Branch</h4></td>
        <td><h5> {{$name->name}}</h5></td>

    </tr>
    <tr>
        <td> <h4>Address</h4></td>
        <td><h5> {{$name->address}}</h5></td>

    </tr>
    <tr>
        <td> <h4>State and LGA</h4></td>
        <td><h5>{{$name->state}}, {{$name->lga }} Local Government Area</h5></td>

    </tr>
    </tbody>
  </table>

    </div>



      <!-- Modal -->
      <div class="modal fade" id="edit" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit My Profile</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">

                              <div class="form-group">
                                  <label for="phone">
                                        Phone No.
                                  </label>
                                  <input type="text" class="form-control" id="phone" placeholder="" value='{{$name->phone}}'>

                              </div>

                              <div class="form-group">
                                  <label for="email">
                                      Email Address
                                  </label>
                                  <input type="text" class="form-control" id="email" placeholder="" value='{{$name->email}}'>

                              </div>

                          </div>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button  data-id='' class="btn btn-info approve">Update Profile Information</button>
                  </div>
              </div>

          </div>
      </div>













    <div id="menu1" class="tab-pane fade"><br>
      <h3>Account History</h3>
    <div style="border: 2px solid rgba(0,0,0,0.1); padding: 30px; border-radius: 5px">
    
 
  <script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
      var $table1 = jQuery( '#table-1' );
      
      // Initialize DataTable
      $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true
      });
      
      // Initalize Select Dropdown after DataTables is created
      $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
      });
    } );
    </script>
    
    <table class="table table-striped table-bordered datatable" id="table-1">
    <thead >
      <tr>
          <th style="border-bottom: none"><h5>Transaction Id</h5></th>
          <th style="border-bottom: none"><h5>Date</h5></th>
          <th style="border-bottom: none"><h5>Amount</h5></th>
          <th style="border-bottom: none"> <h5>Type Of Activity</h5></th>
          <th style="border-bottom: none"><h5>Report</h5></th>
      </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>

            <td>{{$transaction->transaction_id}}</td>

            <td>{{$transaction->date}}</td>

            <td>{{$transaction->amount}}</td>

            <td>{{($transaction->report!=1)?'funding': 'withdrawal' }}</td>

            <td>

                @if($transaction->status==1)
                   <p class="text-primary">pending</p>
                @elseif($transaction->status==2)
                   <p class="text-success">Completed</p>
                @else
                    <p class="text-danger">Rejected</p>
                @endif

            </td>

        </tr>
    @endforeach

    </tbody>
  </table>
    </div></div>















      <div id="menu2" class="tab-pane fade"><br>
          <h3>Account Details</h3>
          <div style="border: 2px solid rgba(0,0,0,0.1); padding: 30px; border-radius: 5px">


              <script type="text/javascript">
                  jQuery( document ).ready( function( $ ) {
                      var $table1 = jQuery( '#table_2' );

                      // Initialize DataTable
                      $table1.DataTable( {
                          "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                          "bStateSave": true
                      });

                      // Initalize Select Dropdown after DataTables is created
                      $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                          minimumResultsForSearch: -1
                      });
                  } );
              </script>
    
    <table class="table table-striped table-bordered datatable" id="table_2">
    <thead >
      <tr>
        <th style="border-bottom: none"><h5>Account Name</h5></th>
         <th style="border-bottom: none"><h5>Bank</h5></th>
        <th style="border-bottom: none"> <h5>Account Number</h5></th>
        <th style="border-bottom: none"><h5>Account Type</h5></th>
        <th style="border-bottom: none"><h5>Edit</h5></th>
      </tr>
    </thead>
    <tbody>
    @foreach($bank as $banks)
        <tr>
            <td>{{$banks->account_name}}</td>
            <td>{{$banks->bank_name}}</td>
            <td>{{$banks->account_number}}</td>
            <td>{{$banks->account_type}}</td>

            <td>
                <h5>
                    <a  href="{{url('/betabet/editbank')}}{{'/'.$banks->id}}" type="button" class="btn btn-primary btn-sm done">
                        Edit
                    </a>
                </h5>
        </td>
        </tr>
    @endforeach


    </tbody>
  </table>
   <div>
             <td colspan="4"><div class="text-center"><a href="{{url('betabet/addbank')}}" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Bank Account</a></div></td>
        </div>
</div>
    </div>















      <script type="text/javascript">
          jQuery( document ).ready( function( $ ) {
              var $table1 = jQuery( '#table_3' );

              // Initialize DataTable
              $table1.DataTable( {
                  "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                  "bStateSave": true
              });

              // Initalize Select Dropdown after DataTables is created
              $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                  minimumResultsForSearch: -1
              });
          } );
      </script>

    <div id="menu3" class="tab-pane fade"><br>
      <h3>Pending Transactions</h3>
      <div style="border: 2px solid rgba(0,0,0,0.1); padding: 30px; border-radius: 5px">
      <table class="table table-striped table-bordered datatable" id="table_3">
    <thead>
      <tr>
          <th style="border-bottom: none"><h5>Transaction Id</h5></th>
          <th style="border-bottom: none"><h5>Date</h5></th>
          <th style="border-bottom: none"><h5>Amount</h5></th>
          <th style="border-bottom: none"> <h5>Type Of Activity</h5></th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($pendings as $pending)
        <tr>

            <td>{{$pending->transaction_id}}</td>

            <td>{{$pending->date}}</td>

            <td>{{$pending->amount}}</td>

            <td>{{($pending->report!=1)?'funding': 'withdrawal' }}</td>



        </tr>
    @endforeach

    
    </tbody>
  </table>
    </div></div>
  </div>
</div>


			</div>
       		</div>
     
       </section>
<br> <br>


<script>

    $('.approve').on('click', function() {

        let phone = $('#phone').val();
        let email =  $('#email').val();

        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Edit Value loan',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/betabet/edit_profile')}}",
                        data: {
                            phone:phone,
                            email:email,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/betabet/index/error_update_profile')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/betabet/index/update_profile')}}";
                        },

                    });


                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });
    })

</script>

@endsection
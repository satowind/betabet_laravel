@extends('includes.admin')
@section('content')
        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Customers Database</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Unverified Customers</h2>
        
        <br />
        
        <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table1 = jQuery( '#table-1' );
            
            // Initialize DataTable
            $table1.DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true,
                "scrollX": true,

            });
            
            // Initalize Select Dropdown after DataTables is created
            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
        </script>

                    @if($id=='errore')
                        <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='edit')
                        <div class="alert alert-success"> Customers Profile Edited Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deny')
                        <div class="alert alert-success"> Customer  have been Rejected <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Approve try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> Branch Office have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='done')
                        <div class="alert alert-success"> Customer  Succesfully  Approved<a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to deny try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif


                    <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr> 
                        <th>Bet9ja Id</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Branch</th>
                        <th>state</th>
                        <th>Edit Customer</th>
                        <th>Approve</th>
rotected time
                    </tr>
    
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->bet9ja_id}}</td>
                    <td>{{$customer->surname}}</td>
                    <td>{{$customer->firstname}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->username}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->dob}}</td>
                    <td>{{$customer->address}}{{$customer->lga}}{{$customer->state}}</td>
                    <td>{{$customer->name}}</td>
                    <td>
                       @if($customer->status==0)
                           <h3 class="text-danger"> Rejected</h3>
                       @else
                            <h3 class="text-primary"> Unattended</h3>
                       @endif
                    </td>
                    <td>
                        <a  href="{{url('admin/editusers2')}}/{{$customer->ids}}" type="button" class="btn btn-primary btn-sm done">
                            Edit Customer
                        </a>
                    </td>
                    <td>
                        <button data-id="{{$customer->ides}}"  name="set" type="button" class="btn btn-success btn-sm pull-right done">
                            Approve Account
                        </button>
                        @if(!$customer->status==0)
                        <br><br>
                        <button data-id="{{$customer->ides}}"  name="set" type="button" class="btn btn-danger btn-sm pull-right del">
                            Deny Account
                        </button>
                        @endif
                    </td>

                    </td>
                </tr>
            @endforeach
  
            
   
            </tbody>
            
        </table>

        
        <br />
       
<script >
    //get the elements
    $('.done').click(function(e){
        var me = $(this);
        //get user id
        var id = me.data('id');


        $.confirm({

            title: 'Confirm!',
            theme: 'supervan',
            type: 'blue',
            typeAnimated: true,
            icon: 'fa fa-question',
            content: 'Are You Sure You Want To Approve Customer',
            buttons: {
                confirm: function () {
                    if(id){


                        //send ajax request to the server using the id

                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/approve_account')}}",
                            data: {
                                id:id ,"_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/approvereg/errora')}}";
                            },
                            dataType: 'JSON',
                            success: function(res) {

                                if(res.message) {
                                    $.alert({
                                        title: 'Alert!',
                                        content: 'Cant approve until necessary Edits are made!',
                                    });
                                }else{

                                    window.location = "{{url('/admin/approvereg/done')}}";

                                }


                            },

                        });
                    }
                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });

        //check if the id is defined



    });


    $('.del').click(function(e){
        var me = $(this);
        //get user id
        var id = me.data('id');


        $.confirm({

            title: 'Confirm!',
            theme: 'supervan',
            type: 'blue',
            typeAnimated: true,
            icon: 'fa fa-question',
            content: 'Are You Sure You Want To Deny Customer Profile',
            buttons: {
                confirm: function () {
                    if(id){


                        //send ajax request to the server using the id

                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/deny_account')}}",
                            data: {
                                id:id ,"_token": "{{ csrf_token() }}"
                            },
                            error: function() {

                                window.location = "{{url('/admin/approvereg/errord')}}";

                            },
                            dataType: 'JSON',
                            success: function() {

                                    window.location = "{{url('/admin/approvereg/deny')}}";

                            },

                        });
                    }
                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });

        //check if the id is defined



    });



</script>
        
@endsection
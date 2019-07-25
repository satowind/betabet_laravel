@extends('includes.admin')
@section('content')
        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>New Account Number</strong>
                            </li>
                        
                            </ol>
                    
        <h2>New Account Number</h2>
        
        <br />
        
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

                    @if($id=='errora')
                        <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='approve')
                        <div class="alert alert-success"> Bank Account Approved <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if($id=='errord')
                        <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='decline')
                        <div class="alert alert-success"> Bank Account Rejected <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
        
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>

                        <th>Customers Name</th>
                        <th>Account Name</th>
                        <th>Bank</th>
                        <th>Account Number</th>
                        <th>Account Type</th>
                        <th>Action Taken</th>
                    </tr>
    
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{$account->surname}}  {{$account->firstname}}</td>
                    <td>{{$account->account_name}}</td>

                    <td>{{$account->bank_name}}</td>

                    <td>{{$account-> account_number}}</td>
                    <td>{{$account-> account_type}}</td>
                    <td>
                        <button data-id="{{$account->ids}}" class="btn btn-success approve">Approve</button>
                        <button data-id="{{$account->ids}}" class="btn btn-danger reject">Reject</button>
                    </td>




                </tr>
            @endforeach
  
            
   
            </tbody>
            
        </table>

        <h2>Rejected Account Number</h2>

        <br />

        <script type="text/javascript">
            jQuery( document ).ready( function( $ ) {
                var $table1 = jQuery( '#table-2' );

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

        <table class="table table-striped table-bordered" id="table-2">
            <thead>

            <tr>

                <th>Customers Name</th>
                <th>Account Name</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Account Type</th>
                <th>Status</th>
                <th>Action Taken</th>
            </tr>

            </thead>
            <tbody>
            @foreach($accountss as $account)
                <tr>
                    <td>{{$account->surname}}  {{$account->firstname}}</td>
                    <td>{{$account->account_name}}</td>

                    <td>{{$account->bank_name}}</td>

                    <td>{{$account-> account_number}}</td>
                    <td>{{$account-> account_type}}</td>
                    <td><h4 class="text-danger">Rejected</h4></td>
                    <td>
                        <button data-id="{{$account->ids}}" class="btn btn-success approve">Approve</button>

                    </td>




                </tr>
            @endforeach

            </tbody>

        </table>

        
        <br />
<script >

    $('.approve').click(function(e){
        var me = $(this);

        var id =me.data('id');

        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Approve Account Details',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/account_number')}}",
                        data: {

                            id:id,

                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('admin/account_number/errora')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('admin/account_number/approve')}}";

                        },

                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                }

            }
        });

    })

    $('.reject').click(function(e){
        var me = $(this);

        var id =me.data('id');

        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Reject Account Details',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/account_numbers')}}",
                        data: {

                            id:id,

                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('admin/account_number/errord')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('admin/account_number/decline')}}";

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
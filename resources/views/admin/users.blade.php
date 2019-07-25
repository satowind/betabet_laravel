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
                    
        <h2>Virtual Customers</h2>
        
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

                    @if($id=='errore')
                        <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if($id=='edit')
                        <div class="alert alert-success"> Customers Profile Edited Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif


                    @if($id=='update')
                        <div class="alert alert-success"> User have been Updated Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> User have been Added Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> User Deleted Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
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
                        <th>Edit</th>
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
                            <a  href="{{url('admin/editusers')}}/{{$customer->id}}" type="button" class="btn btn-primary btn-sm done">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
    
            
   
            </tbody>
            
        </table>

        
        <br />
@endsection
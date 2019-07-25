@extends('includes.admin')
@section('content')

        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Admins Database</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Admins</h2>
        
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
                        <div class="alert alert-danger"> An Error Occurred Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='update')
                        <div class="alert alert-success"> Staff have been Updated Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='register')
                        <div class="alert alert-danger"> Staff have been Added Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> Staff Deleted Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='assign')
                        <div class="alert alert-success"> Staff Successfully Assigned Unit  and Branch  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errorass')
                        <div class="alert alert-danger"> Unable to Assign Unit and Branch to Staff try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif


     
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                        <th>Staff Id</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Branch</th>
                        <th>Staff Unit</th>
                        <th>Edit</th>
                        <th>Assign Roles</th>
                    </tr>
    
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                <td>
                    {{ $admin->staff_id}}
                </td>
                <td>
                    {{ $admin->name}}
                </td>
                <td>
                    {{ $admin->email}}
                </td>

                <td>
                    {{ $admin->phone}}
                </td>
                <td style="color:{{ ($admin->branch_name=='Assign Branch'? 'Red':'') }}">
                    {{ $admin->branch_name}}
                </td>
                <td>
                    {{ $admin->staff_unit}}
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{url('/admin/editmadmin')}}{{'/'.$admin->id}}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="{{url('/admin/assign_branch_and_unit')}}{{'/'.$admin->id}}">Assign Role and Unit</a>
                </td>
                </tr>
            @endforeach
            
   
            </tbody>
            
        </table>
 <div>
             <td colspan="4"><div class="text-center"><a href="{{url('admin/register')}}" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Admin</a></div></td>
        </div>

        
        <br />
       
        
        
@endsection
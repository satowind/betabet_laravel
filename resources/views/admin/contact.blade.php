@extends('includes.admin')
@section('content')
        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Contact</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Contacts</h2>
        
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
                    @if($id=='update')
                        <div class="alert alert-success"> Contact have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> Contact have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> Contact Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
       
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                        <th>Header</th>
                        <th>Sub Header</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Head Phone</th>
                        <th>Head Email</th>
                        <th>Head Address</th>
                        <th>edit</th>
                    </tr>
    
            </thead>
            <tbody>

            <tr>
                <td>{{$contact->header}}</td>
                <td>{{$contact->sub_header}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->address}}</td>
                <td>{{$contact->ho_phone}}</td>
                <td>{{$contact->ho_email}}</td>
                <td>{{$contact->ho_address}}</td>
                <td>
                    <a href="{{url('admin/editcontact')}}/{{$contact->id}}" type="button" class="btn btn-primary btn-sm done">
                        Edit
                    </a>
                </td>
            </tr>
                
   
            
   
            </tbody>
            
        </table>

        
        <br />
       
@endsection    
        
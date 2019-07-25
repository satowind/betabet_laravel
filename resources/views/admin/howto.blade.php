@extends('includes.admin')
@section('content')
 
        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Social</strong>
                            </li>
                        
                            </ol>
                    
        <h2>How To</h2>
        
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

                    @if($id=='update')
                        <div class="alert alert-success"> How to Updated  Successfully  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='error')
                        <div class="alert alert-danger"> Unable to update try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
       
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                        <th>How to Text</th>
                       
                        <th>Edit</th>
                    </tr>
    
            </thead>
            <tbody>

            <tr>
                <td>{{$how->how_to}}</td>
                <td><a href="{{url('admin/edithowto')}}/{{$how->id}}" type="button" class="btn btn-primary btn-sm done">
                        Edit
                    </a></td>
            </tr>
   
            
   
            </tbody>
            
        </table>

        
        <br />
       
        
@endsection
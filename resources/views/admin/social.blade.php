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
                    
        <h2>Social</h2>
        
        <br />
        
        <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table1 = jQuery( '#table-1' );
            
            // Initialize DataTable
            $table1.DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true,
                "scrollX": "200px",


            });
            
            // Initalize Select Dropdown after DataTables is created
            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
        </script>

                    @if($id=='update')
                        <div class="alert alert-success"> Social Links Updated  Successfully  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='error')
                        <div class="alert alert-danger"> Unable to update try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif


                    <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Pintrest</th>
                        <th>Google plus</th>
                        <th>Youtube</th>
                        <th>Instagram</th>
                        <th>Flicker</th>
                        <th>Edit</th>
                    </tr>
    
            </thead>
            <tbody>
            <tr>
                <td>{{$social->facebook}}</td>
                <td>{{$social->twitter}}</td>
                <td>{{$social->pintrest}}</td>
                <td>{{$social->google}}</td>
                <td>{{$social->youtube}}</td>
                <td>{{$social->instagram}}</td>
                <td>{{$social->flicker}}</td>
                <td>
                    <a href="{{url('admin/editsocial')}}" type="button" class="btn btn-primary btn-sm done">
                        Edit
                    </a>
                </td>
            </tr>
  
            
   
            </tbody>
            
        </table>

        
        <br />
       
        
        
      @endsection
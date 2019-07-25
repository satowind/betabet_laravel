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
                    
        <h2>Messages From the Web</h2>
        
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
         
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                        <th>Phone</th>
                       <th>Email</th>
                        <th>Full Name</th>
                        <th>Message</th>
                    </tr>
    
            </thead>
            <tbody>
                
 
            
   
            </tbody>
            
        </table>

        
        <br />
       
@endsection   
        
 
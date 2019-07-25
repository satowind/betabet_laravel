@extends('includes.admin')
@section('content')
        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Branch</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Hub 2 Offices</h2>
        
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
                        <div class="alert alert-success"> Hub2 Office have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> Hub2 Office have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> Hub2 Office Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
       
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr> 
                        <th>Name</th>
                        <th>Regional Office Incharge</th>                     
                        <th>Address</th>
                        <th>state</th>
                        <th>L.G.A</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
            </thead>
            <tbody>

            @foreach($branch as $branches)
                <tr>
                    <td>{{$branches->name}}</td>
                    <td>{{$branches->under}}</td>
                    <td>{{$branches->address}}</td>
                    <td>{{$branches->state}}</td>
                    <td>{{$branches->lga}}</td>
                    <td>{{$branches->city}}</td>
                    <td>{{$branches->phone}}</td>
                    <td>{{$branches->email}}</td>
                    <td>
                        <a href="{{url('/admin/edithub2office')}}{{'/'.$branches->id}}" class="btn btn-primary btn-sm done"> Update<span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
            @endforeach
   
            </tbody>
            
        </table>

        <div>
             <td colspan="4"><div class="text-center"><a href="{{url('admin/add_hub2office')}}" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Post</a></div></td>
        </div>
        
        <br />
        
        
 @endsection
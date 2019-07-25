@extends('includes.admin')
@section('content')
    
 
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Ticket Category</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Tickets</h2>
        
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

                    {{--@if($id=='errore')--}}
                        {{--<div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='update')--}}
                        {{--<div class="alert alert-success"> New Message have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='erroru')--}}
                        {{--<div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='errora')--}}
                        {{--<div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='add')--}}
                        {{--<div class="alert alert-success"> New Ticket Category have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='delete')--}}
                        {{--<div class="alert alert-success"> Ticket Category Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='errord')--}}
                        {{--<div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}

        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr> 

                        <th>tickets</th>
                        <th>Customers Name</th>
                        <th>Date</th>
                        <th>Edit</th>
                    </tr>
            </thead>
            <tbody>

            @foreach($ticket_title as $ticket_titles)
                <tr>
                    <td> {{$ticket_titles->title}}</td>

                    <td> {{$ticket_titles->surname.'  '.$ticket_titles->firstname }}</td>

                    <td> {{date('d-m-Y', strtotime($ticket_titles->date))}}</td>

                    <td>
                        <a   href="{{url('admin/tickets_single')}}/{{$ticket_titles->id}}" class="btn btn-primary btn-sm dones"> Reply /Close Ticket <span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
            
        </table>


        
        <br />
@endsection





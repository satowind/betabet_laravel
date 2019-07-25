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
                    
        <h2>Ticket Category</h2>
        
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
                        <div class="alert alert-success"> New Message have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> New Ticket Category have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='delete')
                        <div class="alert alert-success"> Ticket Category Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr> 

                        <th>tickets</th>

                        <th>Edit</th>
                    </tr>
            </thead>
            <tbody>

            @foreach($ticket as $message)
                <tr>
                    <td>{{$message->title}}</td>

                    <td>
                        <a   data-id="{{$message->id}}" class="btn btn-primary btn-sm dones"> Delete <span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
            
        </table>

        <div>
             <td colspan="4">
                 <div class="text-center">
                     <button  type="button" data-toggle="modal" data-target='#modal1' class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> New Ticket Category </button>
                 </div>
             </td>
        </div>
        
        <br />


                    <div id="modal1" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add new Ticket Category </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <h3 class='container'>Ticket Category</h3>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Category</label>

                                                <input type="text" class="form-control" id="category" placeholder="" value='' >
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input onclick="add_category()" type="button" value="Add Category"   class="btn btn-info approve">

                                </div>
                            </div>

                        </div>
                    </div>

<script>

    function add_category(){

        var cat = $('#category').val();



        if ( cat == '' ){
            $.alert({
                title: 'Alert!',
                content: 'Please Add a ticket description',
            });
        } else{


            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To add ticket',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/add_ticket_category')}}",
                            data: {


                                cat:cat,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/ticket_category/errora')}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('/admin/ticket_category/add')}}";

                            },

                        });


                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }

                }
            });
        }
    }

    $('.dones').click(function(e){

        var id = $(this).data('id');

            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To Delete ticket',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/admin/delete_ticket_category')}}",
                            data: {


                                id:id,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('/admin/ticket_category/errord')}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('/admin/ticket_category/delete')}}";

                            },

                        });


                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }

                }
            });

    });

</script>
@endsection





@extends('includes.admin')
@section('content')
 
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Activate Know Your Customers</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Activate Know Your Customers</h2>
        
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
                    @if($id=='updated')
                        <div class="alert alert-success"> Option Value have been Updated Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> Head Office have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> Head Office Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr> 
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>

                    </tr>
            </thead>
            <tbody>

            @foreach($options as $option)
                <tr>
                    <td>{{$option->option_name}}</td>
                    <td>{{$option->option_value}}</td>

                    <td>
                        <button  class="btn btn-primary btn-sm done" data-toggle="modal" data-target='#modal_{{$option->id}}'>
                            Update Value
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="modal_{{$option->id}}" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update {{$option->option_name}}</h4>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <select class="form-control input-lg" id="under" name="under">
                                            <option value="Yes" >Yes</option>
                                            <option value="No" >No</option>
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  data-id='{{$option->id}}' class="btn btn-info approve">Update</button>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
                
   
            
   
            </tbody>
            
        </table>

<script>
    $('.approve').on('click', function() {

        let id = $(this).data('id');
        let value = $(this).parent().prev().find('select').val();

        console.log( value);

        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure You Want To Edit Value loan',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/edit_option2')}}",
                        data: {
                            value:value,
                            id:id,
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            window.location = "{{url('/admin/options2/erroru')}}";
                        },
                        dataType: 'text',
                        success: function() {
                            window.location = "{{url('/admin/options2/updated')}}";
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
        
   
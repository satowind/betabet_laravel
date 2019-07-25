@extends('includes.admin')
@section('content')

        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>FAQ</strong>
                            </li>
                        
                            </ol>
                    
        <h2>FAQ</h2>
        
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
                        <div class="alert alert-success"> FAQ have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> FAQ have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> FAQ Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
       
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                     
                        <th>Question</th>
                        <th>Reply</th>
                        <th>Edit</th>
                    </tr>
    
            </thead>
            <tbody>

            @foreach($faqs as $faq)

                <tr>
                    <td>{{$faq->question}}</td>
                    <td>{{$faq->reply}}</td>
                    <td>
                        <a  href="{{url('admin/editFAQ')}}/{{$faq->id}}" type="button" class="btn btn-primary btn-sm done">
                            Update
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                </tr>

            @endforeach
                
    
            
   
            </tbody>
            
        </table>

        <div>
             <td colspan="4"><div class="text-center"><a href="{{url('admin/addFAQ')}}" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Post</a></div></td>
        </div>
        
        <br />
        
        
@endsection
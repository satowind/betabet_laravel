@extends('includes.admin')
@section('content')
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Blog</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Blog Posts</h2>
        
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
                        <div class="alert alert-success"> Blog have been Updated Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='erroru')
                        <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errora')
                        <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='add')
                        <div class="alert alert-success"> Blog have been Added Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='deleted')
                        <div class="alert alert-success"> Blog Deleted Successfully <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif
                    @if($id=='errord')
                        <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
                    @endif



                    <table class="table table-striped table-bordered" id="table-1">
            <thead>

                    <tr>
                        <th>Time</th>
                        <th>Title</th>
                        <th>Posts</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
    
            </thead>
            <tbody>

            @foreach($posts as $post)

                <tr>
                    <td>{{date('d-m-Y', strtotime($post->time))}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td><img width="100px" src="{{asset('admins/images/posts')}}/{{$post->images}}" alt="{{$post->title}}"></td>
                    <td>{{$post->post_category}}</td>
                    <td>{{$post->tag}}</td>
                    <td>{{($post->status==1)? 'public':'private' }}</td>
                    <td><a href="{{url('admin/editblog')}}/{{$post->id}}" type="button" class="btn btn-primary btn-sm pull-right">Update
                            <span class="glyphicon glyphicon-edit"></span>
                        </a></td>
                </tr>

            @endforeach
   
            </tbody>
            
        </table>

        <div>
             <td colspan="4"><div class="text-center"><a href="addblog" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Post</a></div></td>
        </div>
        
        <br />
        
        
@endsection
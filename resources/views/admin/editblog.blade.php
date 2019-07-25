@extends('includes.admin')
@section('content')


		
		<h1 class="margin-bottom">Edit Blog Post</h1>
					<ol class="breadcrumb 2" >
								<li>
						<a href="index"><i class="fa-home"></i>Home</a>
					</li>
							
						<li class="active">
		
									<strong>Edit Blog</strong>
							</li>
							</ol>
					
		<br />
		
		<style>
		.ms-container .ms-list {
			width: 135px;
			height: 205px;
		}
		
		.post-save-changes {
			float: right;
		}
		
		@media screen and (max-width: 789px)
		{
			.post-save-changes {
				float: none;
				margin-bottom: 20px;
			}
		}
		</style>

		@if(Session::has('error'))
			<div class="alert alert-danger"> {{Session::get('error')}} <a class='close' data-dismiss='alert'>&times;</a></div>
		@endif

		@if(Session::has('success'))
			<div class="alert alert-success"> {{Session::get('success')}} <a class='close' data-dismiss='alert'>&times;</a></div>
		@endif

		@if($posts)
		
		<form enctype="multipart/form-data" name="register-form" class="nobottommargin" action="{{url('/admin/update_blog')}}" method="post" id="myForm" role="form">
			
			<!-- Title and Publish Buttons -->
			<div class="row">
				<div class="col-sm-2 post-save-changes">
					<button type="button" onclick="updates()" class="btn btn-green btn-lg btn-block btn-icon" name="update">
						Update
						<i class="entypo-check"></i>
					</button>
				</div>
				<div class="col-sm-2 post-save-changes">
					<a href="{{url('admin/blog')}}" type="submit" class="btn btn-default btn-lg btn-block btn-icon" name="publish">
						Cancel
						<i class="entypo-check"></i>
					</a>
				</div>
				<div class="col-sm-2 post-save-changes">
					<button type="button" onclick="deletes()" class="btn btn-danger btn-lg btn-block btn-icon" name="delete">
						Delete
						<i class="entypo-check"></i>
					</button>
				</div>
				
				<div class="col-sm-10">
					<small class="text-danger">* </small>
					<input type="text" class="form-control input-lg" id="title" name="title" placeholder="Post title" value="{{$posts->title}}" />

				</div>
			</div>
			<input type="hidden" class="form-control input-lg" id="ids" name="ids" placeholder="Post title" value="{{$id}}" />
			<br />
			
			<!-- WYSIWYG - Content Editor -->
			<div class="row">
				<div class="col-sm-12">
					<small class="text-danger">* </small>
					<textarea class="form-control wysihtml5" rows="18" data-stylesheet-url="assets/css/wysihtml5-color.css" name="contents" id="contents" value="">{{$posts->content}}</textarea>
				</div>
			</div>
			
			<br />
			
			<!-- Metaboxes -->
			<div class="row">
				
				<!-- Metabox :: Publish Settings -->
				<div class="col-sm-4">
					
					<div class="panel panel-primary" data-collapsed="0">
				
						<div class="panel-heading">
							<div class="panel-title">
								Publish Settings
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							
						
							<div class="checkbox checkbox-replace">
								<input type="checkbox"  checked name="facebook">
								<label><span style="color: blue; font-size: 30px" class="fa fa-facebook">  </span>Post In Facebook</label>
							</div>
							
							<br />

							<div class="checkbox checkbox-replace">
								<input type="checkbox"  checked name="twitter">
								<label><span style="color: blue; font-size: 30px;" class="fa fa-twitter">  </span>Post In Twitter</label>
							</div>
							
							<br />

							<div class="checkbox checkbox-replace">
								<input type="checkbox"  checked name="instagram">
								<label><span style="color: blue; font-size: 30px" class="fa fa-instagram">  </span>Post In Instagram</label>
							</div>
							
							<br />

							<div class="checkbox checkbox-replace">
								<input type="checkbox"  checked name="youtube">
								<label><span style="color: blue; font-size: 30px" class="fa fa-youtube">  </span>Post In Youtube</label>
							</div>
							
							<br />
							
							<div class="checkbox checkbox-replace">
								<input type="checkbox" id="chk-2" checked>
								<label>Stick this post</label>
							</div>
							
							<br />
					
							
							
							<p>Post Status</p>
							<small class="text-danger">* </small>
						
							<select style="visibility: inherit;" name="status" id="status" class="selectboxit">
								<optgroup label="Post Status">
									<option {{($posts->status==1)?'selected':''}} value="1" >Public</option>
									<option {{($posts->status==2)?'selected':''}} value="2" >Private</option>
								</optgroup>
							</select>
							
						</div>
					
					</div>
					
				</div>
				
				
				<!-- Metabox :: Featured Image -->
				<div class="col-sm-4">
					
					<div class="panel panel-primary" data-collapsed="0">
				
						<div class="panel-heading">
							<div class="panel-title">
								Featured Image
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="
									@if($posts->images)
									{{asset('admins/images/posts')}}/{{$posts->images}}
									@else
											http://placehold.it/320x160
									@endif" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input name="input_img" type="file" name="..." accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							
						</div>
					
					</div>
					
				</div>
				
				
				<!-- Metabox :: Categories -->
				<div class="col-sm-4">

					<div class="panel panel-primary" data-collapsed="0">

						<div class="panel-heading">
							<div class="panel-title">
								Categories
							</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>

						<div class="panel-body">

							<select name="categories[]" multiple="multiple"  class="form-control multi-select">
								<option value="art">Art</option>
								<option value="entertainment" >Entertainment</option>
								<option value="sports">Sports</option>
								<option value="gaming">Gaming</option>
								<option value="abstraction">Abstraction</option>
								<option value="nature">Nature</option>
								<option value="summer">Summer</option>
								<option value="adventure">Adventures</option>
								<option value="movie">Movies</option>
								<option value="music">Music</option>
								<option value="technology">Technology</option>
							</select>

						</div>

					</div>

				</div>
				<div class="col-sm-12">

					<div class="panel panel-primary" data-collapsed="0">

						<div class="panel-heading">
							<div class="panel-title">
								Tags
							</div>

							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>

						<div class="panel-body">

							<p>Add Post Tags</p>
							<input name="tag" id="tag" type="text" value="{{$posts->tag}}" class="form-control tagsinput" />

						</div>

					</div>

				</div>

				<div class="clear"></div>
				
				<!-- Metabox :: Tags -->


			</div>

		</form>

		@else
			<h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/blog/errore')}}">Back</a></h3>
		@endif


		<script>


            function deletes(){
                var id = '{{$id}}';

                $.confirm({
                    title: 'Confirm!',
                    theme: 'supervan',
                    type: 'red',
                    typeAnimated: true,
                    icon: 'fa fa-question',
                    content: 'Are You Sure You Want To Delete',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/admin/remove_blog')}}",
                                data: {
                                    id:id ,"_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('/admin/blog/errord')}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('/admin/blog/deleted')}}";

                                },

                            });


                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        }

                    }
                });
            }

            function updates(){

                var id = '{{$id}}';
                var title = $('#title').val();
                var tag = $('#tag').val();
                var status = $('#status').val();
                var contents = $('#contents').val();
                var image = $('#image').val();


                if (title=='' || contents=='' ){
                    $.alert({
                        title: 'Alert!',
                        content: 'Content or Title cant be empty',
                    });
                } else{

                     $.confirm({

                        title: 'Confirm!',
                        theme: 'supervan',
                        type: 'blue',
                        typeAnimated: true,
                        icon: 'fa fa-question',
                        content: 'Are You Sure You Want To Update blog Details',
                        buttons: {
                            confirm: function () {
                                $('#myForm').submit();
                            },
                            cancel: function () {
                                $.alert('Canceled!');
                            }

                        }
                    });
                }
            }



		</script>


@endsection
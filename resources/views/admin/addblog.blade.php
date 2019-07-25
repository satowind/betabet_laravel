@extends('includes.admin')
@section('content')


		
		<h1 class="margin-bottom">Add New Post</h1>
					<ol class="breadcrumb 2" >
								<li>
						<a href="index"><i class="fa-home"></i>Home</a>
					</li>
							
						<li class="active">
		
									<strong>Add Blog</strong>
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

		<form enctype="multipart/form-data" name="register-form" class="nobottommargin" action="{{url('/admin/addblog')}}" method="post" id="myForm" role="form">

			<!-- Title and Publish Buttons -->
			<div class="row">
				<div class="col-sm-2 post-save-changes">
					<button type="button" onclick="add()" class="btn btn-green btn-lg btn-block btn-icon" name="update">
						Publish
						<i class="entypo-check"></i>
					</button>
				</div>



				<div class="col-sm-10">
					<small class="text-danger">* </small>
					<input type="text" class="form-control input-lg" id="title" name="title" placeholder="Post title" value="" />

				</div>
			</div>

			<br />

			<!-- WYSIWYG - Content Editor -->
			<div class="row">
				<div class="col-sm-12">
					<small class="text-danger">* </small>
					<textarea class="form-control wysihtml5" rows="18" data-stylesheet-url="assets/css/wysihtml5-color.css" name="contents" id="contents" value=""></textarea>
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
									<option  value="1" >Public</option>
									<option  value="2" >Private</option>
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
									<img src="http://placehold.it/320x160" alt="...">
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
							<input name="tag" id="tag" type="text" value="" class="form-control tagsinput" />

						</div>

					</div>

				</div>

				<div class="clear"></div>

				<!-- Metabox :: Tags -->


			</div>

		</form>


		<script>
            function add(){


                var title = $('#title').val();

                var contents = $('#contents').val();



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
                        content: 'Are You Sure You Want To Add Blog',
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
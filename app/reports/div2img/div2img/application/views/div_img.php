<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News of Technology</title>
    
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.plugin.html2canvas.js"></script>

</head>
<body>

<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/welcome/succ" id="myForm">
	<input type="hidden" name="img_val" id="img_val" value="" />
</form>

<input type="submit" value="Take Screenshot Of Div Below" onclick="capture();" />

<div id="target" style="width:450px">
<img class="img-rounded img-responsive" width="200" height="180"src="<?php echo base_url(); ?>assets/img/img2.jpg" alt="First Picture" >
<img class="img-rounded img-responsive" width="200" height="180" src="<?php echo base_url(); ?>assets/img/img1.jpg" alt="First Picture" >
<p><span style="color: red:">Mijanur's First photo</span>
</div>    

<script type="text/javascript">
	function capture() {
		$('#target').html2canvas({
			onrendered: function (canvas) {
                //Set hidden field's value to image data (base-64 string)
				$('#img_val').val(canvas.toDataURL("image/png"));
                //Submit the form manually
				document.getElementById("myForm").submit();
			}
		});
	}
</script>
<style type="text/css">
	#target {
		border: 1px solid #CCC;
		padding: 5px;
		margin: 5px;
	}
	h2, h3 {
		color: #003d5d;
	}
	p {
		color:#AA00BB;
	}
	#more {
		font-family: Verdana;
		color: purple;
		background-color: #d8da3d;
	}
</style>
	
</body>
</html>
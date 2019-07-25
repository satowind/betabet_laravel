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

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	
	 <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	 <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
	 
			 <!-- Include jQuery and bootstrap JS plugins -->
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	 
	
	
</head>
<body>


<!-- Mobile !-->
        <div class="container">
		  <h3>  #ProgrammingTips</h3>
        <?php 
            
            //Get the base-64 string from data
            $filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);
            
            //Decode the string
            $unencodedData=base64_decode($filteredData);
            
            //Save the image
            file_put_contents('img.png', $unencodedData);
            
            
            
            ?>
            
            
		</div>
		<div class="container" >
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
            <span class="glyphicon glyphicon-align-justify"></span>
        </button>
        <nav class="navbar-collapse collapse" role="navigation">
            <ul class="navbar-nav nav">
                <li><a href="http://webprogrammingtips.com/it" >Home</a></li>
                <li><a href="https://www.facebook.com/mijanur.payel" target="_blank">Facebook</a></li>
                <li><a href="https://www.youtube.com/channel/UCJFgpEeixBQ7nn0VYCZZgrg" target="_blank">Youtube</a></li>
                <li><a href="https://plus.google.com/u/0/+MijanurRahmanPayel" target="_blank">Google Plus</a></li>
                
            </ul>
        </nav>
    </div>

	
	<!-- Middle content section -->
<div class="middle">
    <div class="container">
        <div class="col-md-9 content">
            <a href="<?php echo base_url(); ?>img.png" target="blank">
            	Click Here to See The Image Saved to Server</a>
            
            
                        <!-- 
            <div class="to-tutorial">
                <p><strong>Visit the tutorial now to learn more:</strong></p>
                <a href="http://www.revillweb.com/tutorials/bootstrap-tutorial/" class="btn btn-success">TO THE TUTORIAL</a>
            </div>
             -->
        </div>
        <div class="col-md-3">
            <h2>Resources</h2>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="http://www.dsebd.org/" target="_blank">Dhaka Stock exchange</a></li>
                <li><a href="prothom-alo.com" target="_blank">Prothom-Alo</a></li>
                <li><a href="http://mzamin.com" target="_blank">Manab Zamin</a></li>
                <li><a href="http://bdnews24.com/bn" target="_blank">BD News24</a></li>
                <li><a href="http://webprogrammingtips.com" target="_blank">#WebProgrammingTips</a></li>
                
            </ul>
        </div>
    </div>
</div>

<!-- Site footer!--> 
<div class="bottom">
    <div class="container">
        <div class="col-md-11">
            <h2></h2>
            	
            <p>Copy Right to webprogrammingtips.com</p>
        </div>
        <!-- 
        <div class="col-md-4">
            <h3><span class="glyphicon glyphicon-star"></span> Footer section 2</h3>
            <p>Content for the second footer section.</p>
        </div>
        <div class="col-md-4">
            <h3><span class="glyphicon glyphicon-music"></span> Footer section 3</h3>
            <p>Content for the third footer section.</p>
        </div>
         -->
    </div>
</div>

</body>
</html>



<head>
	<meta charset="utf-8">
<meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your first uploaded picture on Facebook</title>
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
	

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// Get Profile Name

/*
$access_token='CAACEdEose0cBAInkaHyMSuoIZCZAZAOJ7ipd1MkXiLWBEJ3d1cAdMm5Mw0bFebiqUL84XvFrhRMFH7esKwc1syzK98gxzDYJS0OVYjqK1RN0n2yhi8zpaD7RRaxwHZBZClFqLjCG3n6OSFMCYhlnInJFOb2EGKFyrsz3WsQS1tmMvMJStDQncZCH9FvWeEgihXXDX9HAKcy8gPxaKlm2AhdC6CrdzoTdUZD';
*/


//$access_token="'".$_GET["v"]."'";

$access_token="CAACEdEose0cBAPoqZAgKIpz6AHuvkIezX1aKTRjdjarNgDf2t7K1PZCgZBygo8FiqUGeKLTL53MBBIrZCzZBTZBiUZC3yTarcO9I4ZBsRZBBxkTPEuq7YdOP1wamrQw6TxBnLWLKg1BwWB9kKYrnuLaKPM0YUZBsBvTSDmVmkPWruYb9k3bOYnnlOZChtpQ6wHXpGZA3wtD0GdPvENGSrYtBroZC6l82KZBTsLwDkZD";

		
$profile = file_get_contents('https://graph.facebook.com/v2.5/me?fields=first_name,id,gender&access_token='.$access_token, true);

$json=json_decode($profile, true);


foreach($json as $key => $x_value) {
	if($key=='id'){
	  $uid=$x_value;
	
	}
	if($key=='first_name'){
		$name=$x_value;
		
	}
	
}

//echo "Welcome, ".$name."<br>";
// Get Profile Pic
$profile_phot = file_get_contents('https://graph.facebook.com/v2.5/'.$uid.'/picture?height=200&width=200&redirect=false&access_token='.$access_token, true);
$json=json_decode($profile_phot, true);

foreach($json as $x_value) {
	$pr_pic_url=$x_value['url'];
}

//$pic_url='https://z-1-scontent.xx.fbcdn.net/hprofile-xpa1/v/t1.0-1/c33.0.200.200/p200x200/12247110_10207532708291973_4482726556337476721_n.jpg?oh=c2f1b4e5364f54f0e263a20717e6fd64&oe=570D2FBA';
?>




<?php 


//First Album
$url='https://graph.facebook.com/v2.5/'.$uid.'/albums?limit=20000&access_token='.$access_token;
$pic=file_get_contents($url, true);
$json=json_decode($pic, true);
//var_dump($json);
$ctime=NULL;
$pid=NULL;
$i=0;
foreach($json as $key => $x_value) {
	foreach($x_value as $k=>$value) {
	    if( $key=='data'){

	    	foreach($value as $a=>$val) {
	   

	    		if($a=='created_time'){
	    			 //$ctime=$ctime.','.$val;
	    			$ctime=$val;
	    			//echo "<br>";
	    		}
	    		if($a=='id'){
				 //$pid=$pid.','.$val;
				 $pid=$val;
				//echo "<br>";
	    		}
	   
	    	}
	    	$final_str=$final_str.','.$ctime.'^'.$pid;

	   }
	  
		if($k=='previous'){
			$prev=$value;
		
		}
			if($k=='next'){

				$next=$value;

			}else{
				$next=NULL;
			}
	}
}
		while($next!=NULL) {
			echo $next;
			
			$pic=file_get_contents($next, true);
			$json=json_decode($pic, true);
			//var_dump($json);
			
			foreach($json as $key => $x_value) {
				foreach($x_value as $k=>$value) {
					if( $key=='data'){

						foreach($value as $a=>$val) {

							//echo "<br>";
							if($a=='created_time'){
								$ctime=$ctime.','.$val;
								//echo "<br>";
							}
							if($a=='id'){
								$pid=$pid.','.$val;
								//echo "<br>";
							}

						}

					}

						
						
						
					if($k=='previous'){
						$prev=$value;
							
					}
					if($k=='next'){
						//echo '1111'.$next;
						$next=$value;

					}else{
						//echo '3333'.$next;
						$next=NULL;
					}
				}
			}
			if($next!=NULL){
				//echo '2222'.$next;
				$pos=strpos($next, 'http');
				if($pos!='0'){
					
					$next=null;
						
						
				}
			}

		}
		echo "<br";
		$strArr=explode (",",$final_str);
		//var_dump($strArr);
		
$m=0;

foreach ($strArr as $f=>$fv){
	$m=$m+1;
	
	
	$sep_pos=strpos($fv,'^');
	$cdate=substr($fv,0,$sep_pos);
	$picid=substr($fv,$sep_pos+1);
	$d = strtotime($cdate);
	
	
	
	
	if($m==2){
		$lowest_id=$picid;
		$lowest_date=$d;
		
		
	}elseif($m>2){
		if($d>$lowest_date){
			$lowest_date=$lowest_date;
			$lowest_id=$lowest_id;
			
		}else{
			$lowest_date=$d;
			$lowest_id=$picid;
			
		}
		
	}

	
	
}
$lowest_date=date('d/M/Y', $lowest_date);


echo  "<strong>Congratulation ! ".$name."</strong>";
echo "<br>";




$first_phot = file_get_contents('https://graph.facebook.com/v2.5/'.$lowest_id.'/picture?height=200&width=200&redirect=false&access_token='.$access_token, true);
$json=json_decode($first_phot, true);

foreach($json as $x_value) {
	$pic_url=$x_value['url'];
}

?>
<img class="img-circle" style="width: 250;height:200"src="<?php echo $pr_pic_url?>  " alt="Profile Picture" >
<img class="img-circle" style="width: 250;height:200"src="<?php echo $pic_url; ?>" alt="First Picture" >
<?
echo "<br>";
echo  "<strong>".$name."'s </strong>first photo on Facebook - ".$lowest_date;
?>
</body>
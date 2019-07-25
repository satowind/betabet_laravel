<?php 
session_start();
include('includes/connection.php');
$id=$_GET['id'];
$username = $_SESSION['loggedInAdmin'];

$date=  date("h:i:sa M, d l Y", time());
      
 

        
 
$user=$_GET['user'];


// $print =" on ". $date."  ".$username." confirmed  of ".$user." the sum of \n\r";
// query & result
$query = " UPDATE usertable SET `status`=1 WHERE id='$id' ";
header("Content-Type:application/json");
 if( mysqli_query( $conn, $query ) ) {
            echo json_encode(['success'=>true]);
            
	// $repo=fopen("activity_log/fundWith.txt", 'a+');

	// fwrite($repo,$print);
	// fclose($repo);
	

        } else {
           echo json_encode(['success'=>false]);
        }

 ?>
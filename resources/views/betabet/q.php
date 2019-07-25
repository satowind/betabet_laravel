<?php 
if(!isset($_POST['city']))
	die("please choose a city");
$city = $_POST['city'];
require 'includes/connection.php';
    $query = "SELECT name FROM branch WHERE hierachy = 'branch office' AND city = '$city' ";
    $result = mysqli_query( $conn, $query );
$abc=array();
            if( mysqli_num_rows($result) > 0 ) {
            // we have data!
            // output the data       
    while( $row = mysqli_fetch_assoc($result) ) {
       $abc[]=$row;
    }
}

echo json_encode($abc);
?>
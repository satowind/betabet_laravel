<?php 

if (isset($_POST['Submit'])) {
    
    require 'includes/connection.php';
    global $conn;
    require 'includes/functions.php';

    $email='';


    if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";
    } else {
        $emails = mysqli_real_escape_string($conn,$_POST["email"] );
        $querys = "SELECT `email` FROM `newsletter` WHERE `email`= '$emails' LIMIT 1";
       
        $result = mysqli_query($conn,$querys);
        
        if( mysqli_num_rows($result) > 0 ) {
             $emailError = "Email Already Exist<br>";
        }else{
            $email = $emails;
        }
    }
     
    if ($email) {
        $query = "INSERT INTO `newsLetter` (`email`) VALUES ('$email')";
  

    if( mysqli_query( $conn, $query ) ) {
            $satowind="<div class='alert alert-success'>Thanks for Subscribing to Our News Letter<a class='close' data-dismiss='alert'>&times;</a></div>";
           

        } else {
            $satowind= "Error: ". $query . "<br>" . mysqli_error($conn);
        }
} 
header("Location: {$_SERVER["HTTP_REFERER"]}");
 }

 ?>
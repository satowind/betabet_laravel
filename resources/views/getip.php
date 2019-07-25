

<?php
/* getip.php */
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
  $ip=$_SERVER['REMOTE_ADDR'];
}
print json_encode(array('ip' => $ip));




include('includes/connection.php');
global $conn;
// check connection
if( !$conn ) {
    die( "Connection failed: " . mysqli_connect_error() );
}

$date = date("Y-m-d");
$querry = "INSERT INTO counter (`ipadress`,`date`) VALUES ('$ip', '$date') ";

$query = "SELECT `ipadress`, `day` FROM `counter` WHERE ipadress= '$ip'  ORDER BY id Desc";
       
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc( $result);
        
        if( mysqli_num_rows($result) > 0 ) {

            $lastDate = strtotime($row['day']);

            $dateOnly = date("y-m-d",$lastDate);

            $day=   date("y-m-d");
           
            if ($day == $dateOnly){
                 echo "sato";
            }else {
                mysqli_query( $conn, $querry );
            }
        }else{
            
            mysqli_query( $conn, $querry );
        }
        
print_r($row);
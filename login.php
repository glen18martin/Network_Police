<?php

require 'config.php';

session_start();
	
//if ($_POST['form']==0) 


//else  {


 $checkid = $_POST['u'];
 $checkpass = $_POST['p'];

$checkpass = md5($checkpass);

$result = mysql_query("SELECT user_id FROM user WHERE username = '$checkid' AND password = '$checkpass'");

if(mysql_num_rows($result) == 0) {
     echo "Check username or password";

//changes

     header("Location:index.php");

     //changesend

} else {
   echo "Found user Successfully";
  
header("Location:http://localhost/Network_Police/main.php");




$row = mysql_fetch_array($result);
$id = $row['user_id'];
$_SESSION["login"]="$id";
$checklog = $id;

}

//}


$_SESSION["checklog"]="$checklog";



?>
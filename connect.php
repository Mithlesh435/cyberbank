<?php

$server = "localhost" ;
$username = "root" ;
$password = "" ;
$db = "cyber_bank"  ;

//Database Connection
$conn = mysqli_connect($server, $username, $password, $db);
if(!$conn){
    echo "Fail";
}


?>




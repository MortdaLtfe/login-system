<?php 
  $host = '0.0.0.0';
  $user = 'root';
  $pass = 'root';
  $DB = 'login';
  // $conn = new PDO("mysql:host=$host;dbName=$DB",$user,$pass); 
 $conn = mysqli_connect( $host, $user, $pass, $DB) or die('Error Connecting');
?>
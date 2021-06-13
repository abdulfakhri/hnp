<?php

$username = 'u979436226_hnsp';
$password = '!@#123qweasdZXC';
$connection = new PDO( 'mysql:host=localhost;dbname=u979436226_hnsp', $username, $password );

$connect = new PDO( 'mysql:host=localhost;dbname=u979436226_hnsp', $username, $password );

$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}

?>
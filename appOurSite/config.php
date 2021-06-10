<?php
define('DB_SERVER','localhost');
define('DB_USER','u979436226_hnsp');
define('DB_PASS' ,'!@#123qweasdZXC');
define('DB_NAME', 'u979436226_hnsp');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
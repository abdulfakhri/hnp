<?php

$host = "localhost"; /* Host name */
$user = "u979436226_hnsp"; /* User */
$password = "!@#123qweasdZXC"; /* Password */
$dbname = "u979436226_hnsp"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
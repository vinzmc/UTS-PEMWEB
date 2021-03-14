<?php
//$db = mysqli_connect("localhost","root","","restoran", 3325);
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', '');
define('DB_NAME', 'restoran');


$db = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>